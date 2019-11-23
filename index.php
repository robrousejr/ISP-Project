<?php

    // connect to database
    $host = 'localhost';
    $username = 'ispuser';
    $password = 'ispuserpassword';
    $table = 'isp';
    $conn = mysqli_connect($host, $username, $password, $table);

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

    <!-- Song Information Div -->
    <div id="songInfoDiv">
        <img src="img/generic cover.jpg">
        <h2>Song Title</h2>
        <h4>Artist</h4>
        <h4>Album</h4>
        <h4>Year</h4>
    </div>

    <!-- Vinyl Player -->
    <div id="vinylDiv">
        <img src="img/vinyl.png" id="vinylImg">
        <script src="js/vinyl.js"></script>
    </div>

    <!-- Disc images -->
    <div id="discDiv">
        <img src="img/disc.png" id="discImg">
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
                echo "<tr><th>" . $music[$x]['Song_name'] . "<span class='playButton'> &#9658; </span>". "</th><th>" . $music[$x]['Artist'] . "</th><th>" . $music[$x]['Album'] . "</th><th>" . $music[$x]['Year'] . "</th></tr>";
            }
        ?>
    </table>
    

</body>
</html>