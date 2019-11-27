<?php
    include('index.php');
    $Song_name = $_POST['Song_name'];
    $Artist = $_POST['Artist'];
    $Album = $_POST['Album'];
    $Year = $_POST['Year'];

    $query = "INSERT INTO `music`(`Song_name`, `Artist`, `Album`, `Year`) 
    VALUES ('$Song_name','$Artist','$Album','$Year')";

    $result = mysqli_query($conn, $query);
    if($result)
    {
        $target_dir = "music/";
        $album_dir = "img/albumcover/";
        $musicFile = $target_dir . basename($_FILES['songUpload']['name']); // Access uploaded .mp3 file
        $albumFile = $album_dir . basename($_FILES['albumUpload']['name']); // Access uploaded .jpg file

        // Get amount of songs in table
        $rowCountResult = mysqli_query($conn, "SELECT * FROM music");
        $numSongs = mysqli_num_rows($rowCountResult);

        // Put song in 'music' directory with correct name
        $newSongFilename = (strval($numSongs) . ".mp3");
        move_uploaded_file($_FILES["songUpload"]["tmp_name"], $target_dir . $newSongFilename);

        // Put album cover in 'img/albumcover' directory with correct name
        $newAlbumFilename = (strval($numSongs) . ".jpg");
        move_uploaded_file($_FILES['albumUpload']['tmp_name'], $album_dir . $newAlbumFilename);


        header("Location: http://localhost/isp-project"); // Redirect back
        exit(); // Stops any code below from executing
    }
?>