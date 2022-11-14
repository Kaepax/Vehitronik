<?php

$servername="sql7.freesqldatabase.com";
$username="sql7567131";
$password="QWfMzWQq53";

$dbname="sql7567131";
$tablename="users";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn) {
    echo"Connection Failed!";
    exit();
}