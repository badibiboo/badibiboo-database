<?php
require_once 'connect.php';

// Fetch artist details
if(isset($_GET['id'])) {
    $artist_id = $_GET['id'];
    $artist_query = "SELECT * FROM Artist WHERE ArtistID = $artist_id";
    $artist_result = mysqli_query($con, $artist_query);
    $artist = mysqli_fetch_assoc($artist_result);
}

// Update artist details
if(isset($_POST['update_artist'])) {
    $artist_id = $_POST['artist_id'];
    $artist_name = $_POST['artist_name'];
    $country = $_POST['country'];

    $update_query = "UPDATE Artist SET ArtistName = '$artist_name', Country = '$country' WHERE ArtistID = $artist_id";
    mysqli_query($con, $update_query);
    // Redirect back to the main page
    header("Location: data_interface.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Artist</title>
</head>
<body>

<h2>Edit Artist</h2>
<form method="post">
    <input type="hidden" name="artist_id" value="<?php echo $artist['ArtistID']; ?>">
    Artist Name: <input type="text" name="artist_name" value="<?php echo $artist['ArtistName']; ?>"><br><br>
    Country: <input type="text" name="country" value="<?php echo $artist['Country']; ?>"><br><br>
    <input type="submit" name="update_artist" value="Update">
</form>

</body>
</html>
