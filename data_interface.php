<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>

<html>
<head>
    <title>Music Database</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Albums</h2>
<table>
    <tr>
        <th>AlbumID</th>
        <th>ArtistID</th>
        <th>ReleaseDate</th>
        <th>AlbumTitle</th>
        <th>Action</th>
    </tr>
    <?php
    $albums_query = "SELECT * FROM Albums";
    $albums_result = mysqli_query($con, $albums_query);

    while ($album = mysqli_fetch_assoc($albums_result)) {
        echo "<tr>";
        echo "<td>".$album['AlbumID']."</td>";
        echo "<td>".$album['ArtistID']."</td>";
        echo "<td>".$album['ReleaseDate']."</td>";
        echo "<td>".$album['AlbumTitle']."</td>";
        echo "<td><a href='edit_album.php?id=".$album['AlbumID']."'>Edit</a></td>";
        echo "<td><form method='post'><input type='hidden' name='album_id' value='".$album['AlbumID']."'><input type='submit' name='delete_album' value='Delete'></form></td>";
        echo "</tr>";
    }

    // Handle delete request for Albums
    if(isset($_POST['delete_album'])) {
        $album_id = $_POST['album_id'];
        $delete_query = "DELETE FROM Albums WHERE AlbumID = $album_id";
        mysqli_query($con, $delete_query);
        // Refresh the page to reflect changes
        header("Refresh:0");
    }
    ?>
</table>

<h2>Artists</h2>
<table>
    <tr>
        <th>ArtistID</th>
        <th>ArtistName</th>
        <th>Country</th>
        <th>Action</th>
    </tr>
    <?php
    $artists_query = "SELECT * FROM Artist";
    $artists_result = mysqli_query($con, $artists_query);

    while ($artist = mysqli_fetch_assoc($artists_result)) {
        echo "<tr>";
        echo "<td>".$artist['ArtistID']."</td>";
        echo "<td>".$artist['ArtistName']."</td>";
        echo "<td>".$artist['Country']."</td>";
        echo "<td><a href='edit_artist.php?id=".$artist['ArtistID']."'>Edit</a></td>";
        echo "<td><form method='post'><input type='hidden' name='artist_id' value='".$artist['ArtistID']."'><input type='submit' name='delete_artist' value='Delete'></form></td>";
        echo "</tr>";
    }

    // Handle delete request for Artists
    if(isset($_POST['delete_artist'])) {
        $artist_id = $_POST['artist_id'];
        $delete_query = "DELETE FROM Artist WHERE ArtistID = $artist_id";
        mysqli_query($con, $delete_query);
        // Refresh the page to reflect changes
        header("Refresh:0");
    }
    ?>
</table>

<h2>Songs</h2>
<table>
    <tr>
        <th>SongID</th>
        <th>SongName</th>
        <th>Duration</th>
        <th>BPM</th>
        <th>ArtistID</th>
        <th>AlbumID</th>
        <th>Action</th>
    </tr>
    <?php
    $songs_query = "SELECT * FROM Songs";
    $songs_result = mysqli_query($con, $songs_query);

    while ($song = mysqli_fetch_assoc($songs_result)) {
        echo "<tr>";
        echo "<td>".$song['SongID']."</td>";
        echo "<td>".$song['SongName']."</td>";
        echo "<td>".$song['duration']."</td>";
        echo "<td>".$song['bpm']."</td>";
        echo "<td>".$song['ArtistID']."</td>";
        echo "<td>".$song['AlbumID']."</td>";
        echo "<td><a href='edit_song.php?id=".$song['SongID']."'>Edit</a></td>";
        echo "<td><form method='post'><input type='hidden' name='song_id' value='".$song['SongID']."'><input type='submit' name='delete_song' value='Delete'></form></td>";
        echo "</tr>";
    }

    // Handle delete request for Songs
    if(isset($_POST['delete_song'])) {
        $song_id = $_POST['song_id'];
        $delete_query = "DELETE FROM Songs WHERE SongID = $song_id";
        mysqli_query($con, $delete_query);
        // Refresh the page to reflect changes
        header("Refresh:0");
    }
    ?>
</table>

</body>
<a href="logout.php">Logout</a>
</body>
</html>
