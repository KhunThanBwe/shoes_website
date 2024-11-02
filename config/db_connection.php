<?php
    $connect = mysqli_connect(
        "127.0.0.1",
        "root",
        "",
        "shoes_website"
    );

    if(!$connect) {
        die("ERROR: ". $_SERVER['SERVER_NAME']);
    }

?>