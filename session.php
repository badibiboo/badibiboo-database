<?php
session_start();

// Database connection details
$servername = "sql101.infinityfree.com";
$username = "if0_35491010";
$password = "2OQ9vFRU4Ne";
$dbname = "if0_35491010_db_music";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set session function
function setSession($key, $value) {
    global $conn;

    $hashedValue = password_hash($value, PASSWORD_DEFAULT);

    // Prepare SQL statement
    $stmt = $conn->prepare("UPDATE users SET session_data=? WHERE user_id=1");

    // Bind parameters and execute
    $stmt->bind_param("s", $hashedValue);
    if ($stmt->execute()) {
        $_SESSION[$key] = $value;
        echo "Session value set successfully.";
    } else {
        echo "Error updating session: " . $stmt->error;
    }

    $stmt->close();
}

// Delete session data from the database
function deleteSession($key) {
    global $conn;

    // Prepare SQL statement
    $stmt = $conn->prepare("UPDATE users SET session_data=NULL WHERE user_id=1");

    // Execute
    if ($stmt->execute()) {
        unset($_SESSION[$key]);
        echo "Session value deleted successfully.";
    } else {
        echo "Error deleting session: " . $stmt->error;
    }

    $stmt->close();
}

// Example usage:
// setSession("username", "user1");
// deleteSession("gebruiker1");

$conn->close();
?>

