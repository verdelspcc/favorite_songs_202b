<?php

include 'db_connection.php';

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $artist = mysqli_real_escape_string($conn, $_POST['artist']);
    $album = mysqli_real_escape_string($conn, $_POST['album']);
    $released_date = mysqli_real_escape_string($conn, $_POST['released_date']);
    $composer = mysqli_real_escape_string($conn, $_POST['composer']);

    $sql = "INSERT INTO songs (title, artist, album, released_date, composer)
        VALUES ('$title', '$artist', '$album', '$released_date', '$composer')";

    if (mysqli_query($conn, $sql)) {
        header('location: index.php');
    } else {
        echo "There's something wrong with your database or query.";
    }

    mysqli_close($conn);
}

?>