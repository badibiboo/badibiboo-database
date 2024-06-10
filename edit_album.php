<?php
require_once 'connect.php';

// Fetch album details
if(isset($_GET['id'])) {
    $album_id = $_GET['id'];
    $album_query = "SELECT * FROM Albums WHERE AlbumID = $album_id";
    $album_result = mysqli_query($con, $album_query);
    $album = mysqli_fetch_assoc($album_result);
}

// Update album details
if(isset($_POST['update_album'])) {
    $album_id = $_POST['album_id'];
    $album_title = $_POST['album_title'];
    // Update other fields similarly

    $update_query = "UPDATE Albums SET AlbumTitle = '$album_title' WHERE AlbumID = $album_id";
    mysqli_query($con, $update_query);
    // Redirect back to the main page
    header("Location: data_interface.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Album</title>
</head>
<body>

<h2>Edit Album</h2>
<form method="post">
    <input type="hidden" name="album_id" value="<?php echo $album['AlbumID']; ?>">
    Album Title: <input type="text" name="album_title" value="<?php echo $album['AlbumTitle']; ?>"><br><br>
    <!-- Add other fields similarly -->
    <input type="submit" name="update_album" value="Update">
</form>

</body>
</html>
