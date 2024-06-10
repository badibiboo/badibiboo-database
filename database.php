<?php
include_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Data van index.html komt hier en wordt als het ware gesorteerd.
    $txtArtist = $_POST['txtArtist'];
    $txtAlbum = $_POST['txtAlbum'];
    $txtSong = $_POST['txtSong'];
    $txtDate = $_POST['txtDate'];
    $txtCountry = $_POST['txtCountry'];
    $txtDuration = $_POST['txtDuration'];
    $txtBPM = $_POST['txtBPM'];

    // Informatie gaat naar Artists
    $sqlArtist = "INSERT INTO Artist (ArtistName, Country) VALUES (?, ?)";
    $stmtArtist = mysqli_prepare($con, $sqlArtist);
    mysqli_stmt_bind_param($stmtArtist, "ss", $txtArtist, $txtCountry);
    mysqli_stmt_execute($stmtArtist);

    // Informatie gaat naar Albums 
    $sqlAlbum = "INSERT INTO Albums (ReleaseDate, AlbumTitle) VALUES (?, ?)";
    $stmtAlbum = mysqli_prepare($con, $sqlAlbum);
    mysqli_stmt_bind_param($stmtAlbum, "ss", $txtDate, $txtAlbum);
    mysqli_stmt_execute($stmtAlbum);

    // Informatie gaat naar Songs 
    $sqlSong = "INSERT INTO Songs (SongName, duration, bpm) VALUES (?, ?, ?)";
    $stmtSong = mysqli_prepare($con, $sqlSong);
    mysqli_stmt_bind_param($stmtSong, "sii", $txtSong, $txtDuration, $txtBPM);
    mysqli_stmt_execute($stmtSong);

    // Controleren op fouten
    if (mysqli_errno($con)) {
        echo "Error: " . mysqli_error($con);
    } else {
        echo "Records Inserted Successfully";
    }

    // mysql afsluiten
    mysqli_stmt_close($stmtArtist);
    mysqli_stmt_close($stmtAlbum);
    mysqli_stmt_close($stmtSong);

    header('Location: index.php');
}
?>
