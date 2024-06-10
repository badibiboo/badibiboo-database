<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="index.css">
        <title>Music Database</title>
    </head>

    <body>
        <!-- Knop voor login waar je naar data_interface.php wordt gestuurd-->
        <div class="login-button">
            <a href="./login.php">Login</a>
        </div>

        <!-- Formulier voor de informatie die naar database.php wordt gestuurd -->
        <fieldset>
            <legend>Music Database</legend>

            <form name="Musicfrm" method="post" action="database.php">
                <p>
                    <label for="Artist">Artist Name:</label>
                    <input type="text" name="txtArtist" id="txtArtist" required >
                </p>

                <p>
                    <label for="Album">Album:</label>
                    <input type="text" name="txtAlbum" id="txtAlbum" required >
                </p>

                <p>
                    <label for="Song">Song:</label>
                    <input type="text" name="txtSong" id="txtSong" required>
                </p>

                <p>
                    <label for="Date">Release Date:</label>
                    <input type="date" name="txtDate" id="txtDate" >
                </p>

                <p>
                    <label for="Country">Country:</label>
                    <input type="text" name="txtCountry" id="txtCountry" required >
                </p>

                <p>
                    <label for="Duration">Duration:</label>
                    <input type="number" name="txtDuration" id="txtDuration" >
                </p>

                <p>
                    <label for="bpm">BPM:</label>
                    <input type="number" name="txtBPM" id="txtBPM" >
                </p>

                <!-- Submit knop alle informatie hier gaat naar database.php -->
                <p>&nbsp;</p>

                <p>
                    <input type="submit" name="Submit" id="Submit" value="Submit">
                </p>
            </form>
        </fieldset>
    </body>
</html>
