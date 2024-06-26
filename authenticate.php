<!DOCTYPE html>
<?php
session_start();
$DB_HOST = 'sql101.infinityfree.com';
$DB_USER = 'if0_35491010';
$DB_PASS = '2OQ9vFRU4Ne';
$DB_NAME = 'if0_35491010_db_music';
// // $host = "sql101.infinityfree.com";
// // $user = "if0_35491010";
// // $password = "2OQ9vFRU4Ne";
// // $db = "if0_35491010_db_music";
$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: '. mysqli_connect_error());
}
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if (!isset($_POST['username'], $_POST['password']) ) {
    // Could not get the data that should have been sent.
    exit('Please fill both the username and password fields!');
}
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username =?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if ($_POST['password'] == $password) {
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location: data_interface.php');
        } else {
            // Incorrect password
            echo 'Wachtwoord klopt niet!';
        }
    } else {
        // Incorrect username
        echo 'Gebruikersnaam is incorrect!';
    }
}
$stmt->close();
?>
