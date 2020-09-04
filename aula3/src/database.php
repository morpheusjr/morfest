<?php

function dbConnect()
{
    $host = "localhost";
    $userName = "root";
    $password = "usbw";
    $dbName = "morfest";

    return mysqli_connect($host, $userName, $password, $dbName);
}
