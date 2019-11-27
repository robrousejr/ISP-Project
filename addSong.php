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
        header("Location: http://localhost/isp-project"); // Redirect back
        exit(); // Stops any code below from executing
    }
?>