<?php

    // connect to database
    $host = 'localhost';
    $username = 'ispuser';
    $password = 'ispuserpassword';
    $database = 'isp';
    $conn = mysqli_connect($host, $username, $password, $database);

    // check connection
    if(!$conn)
    {
        echo "Connection error: " . mysqli_connect_error(); // output connection error
    }

    $sql = 'SELECT Song_name, Artist, Album, Year FROM music';
    $result = mysqli_query($conn, $sql); // Stores all table data in query
    $music = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // print_r($music); // prints out all music records in table 
    // print_r($music[0]['Song_name']); // Get song name for 0th element
?>

<!DOCTYPE html>
<html>
    <head>
        <title>ISP Project</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/helpmodal.css">
        <link rel="stylesheet" type="text/css" href="css/musiccontainer.css">
        <link rel="stylesheet" type="text/css" href="css/form.css">
        <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">
    </head>
<body>

    <!-- Help Button and Popup -->
    <button id="helpBtn">Help</button>
    <div id="helpModal">
        <div class="modalContent">
            <b><span class="close">&times;</span></b>
            <h1>Instructions</h1>
            <p>Step 1: Do this...</p>
            <p>Step 2: You can try that...</p>
        </div>
    </div><br>
    <script src="js/helpbutton.js"></script>

    <!-- Song Information Div (left) -->
    <div id="songInfoDiv">
        <img src="img/generic cover.jpg" id="songInfoAlbumPhoto">
        <h2 id="songInfoTitle">Song Title</h2>
        <h4 id="songInfoArtist">Artist</h4>
        <h4 id="songInfoAlbum">Album</h4>
        <h4 id="songInfoYear">Year</h4>
    </div>

    <!-- Vinyl Player (middle) -->
    <div id="discDiv">
        <img src="img/disc.png" id="discImg">
        <svg id="vinylArm" viewBox="0 0 800 800">
            <path style="fill:purple;" d="M354.5,761.6l11.9,6.2c0,0,37.1-91.5,42.4-123.7c2.7-16.4-1.1-103.9-1.1-103.9V307.5h-14.7l-0.1,232.7c0,0,3.7,87.5,1.1,103.9C389,674.6,354.5,761.6,354.5,761.6z"></path>
            <rect x="379.7" y="239.7" style="fill:#000;" width="40.7" height="67.8"></rect>
        </svg>
        <script src="js/vinyl.js"></script>
    </div>

    <!-- Add song (right) -->
    <div id="rightDiv">
        <form action="addSong.php" method="post" enctype="multipart/form-data">
            <input type="text" name="Song_name" placeholder="Song Name" class="formAlign">
            <input type="text" name="Artist" placeholder="Artist Name" class="formAlign">
            <input type="text" name="Album" placeholder="Album Name" class="formAlign">
            <input type="number" name="Year" placeholder="Year" class="formAlign">
            <span class="formAlign">Album Photo</span>
            <input type="file" name="albumPhoto" id="albumUpload" class="formAlign">
            <input type="file" name="songMP3" id="songUpload" class="formAlign">
            <input type="submit" value="Add Song" class="formAlign">
        </form>
    </div>
    <br style="clear:left;"/>

    
    <table id="musicTable">
        <tr style="border-bottom: 3px solid black;">
            <th>Song</th>
            <th>Artist</th>
            <th>Album</th>
            <th>Year</th>
        </tr>
        <?php
            $musicCount = count($music); // Holds amount of songs in table

            // Fill table with songs
            for ($x = 0; $x <= $musicCount - 1; $x++)
            {
                $songTitle = $music[$x]['Song_name']; // Holds name of song
                $artist = $music[$x]['Artist']; // Name of artist
                $album = $music[$x]['Album']; // Name of album
                $year = $music[$x]['Year']; // Year of song
                echo "<tr><th>" . $music[$x]['Song_name'] . "<span class='playButton' onclick='playSong($x, $year)'> &#9658; </span>". "</th><th>" . $music[$x]['Artist'] . "</th><th>" . $music[$x]['Album'] . "</th><th>" . $music[$x]['Year'] . "</th></tr>";
            }
        ?>
    </table>
    <button onclick="stopSong()">Stop</button>
    <script src="js/audio.js"></script>
    
</body>
</html>