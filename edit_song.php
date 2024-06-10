<?php
require_once 'connect.php';

// Fetch song details
if(isset($_GET['id'])) {
    $song_id = $_GET['id'];
    $song_query = "SELECT * FROM Songs WHERE SongID = $song_id";
    $song_result = mysqli_query($con, $song_query);
    $song = mysqli_fetch_assoc($song_result);
}

// Update song details
if(isset($_POST['update_song'])) {
    $song_id = $_POST['song_id'];
    $song_name = $_POST['song_name'];
    $duration = isset($_POST['duration']) ? $_POST['duration'] : null;
    $bpm = isset($_POST['bpm']) ? $_POST['bpm'] : null;
    $artist_id = $_POST['artist_id'];
    $album_id = $_POST['album_id'];

    $update_query = "UPDATE Songs SET SongName = '$song_name', duration = '$duration', bpm = $bpm, ArtistID = $artist_id, AlbumID = $album_id WHERE SongID = $song_id";
    mysqli_query($con, $update_query);
    // Redirect back to the main page
    header("Location: data_interface.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Song</title>
</head>
<body>

<h2>Edit Song</h2>
<form method="post">
    <input type="hidden" name="song_id" value="<?php echo $song['SongID']; ?>">
    Song Name: <input type="text" name="song_name" value="<?php echo $song['SongName']; ?>"><br><br>
    Duration: <input type="text" name="duration" value="<?php echo $song['duration']; ?>"><br><br>
    BPM: <input type="text" name="bpm" value="<?php echo $song['bpm']; ?>"><br><br>
    Artist ID: <input type="text" name="artist_id" value="<?php echo $song['ArtistID']; ?>"><br><br>
    Album ID: <input type="text" name="album_id" value="<?php echo $song['AlbumID']; ?>"><br><br>
    <input type="submit" name="update_song" value="Update">
</form>

</body>
</html>
