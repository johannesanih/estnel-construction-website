<?php

    const DB_HOST = "localhost";
    const DB_USER = "Ebube";
    const DB_KEY = "ebube";
    const DB_NAME = "estnel";

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $dbcon = new mysqli(DB_HOST, DB_USER, DB_KEY, DB_NAME);
    if($dbcon->connect_error) die($dbcon->connect_error);

?>