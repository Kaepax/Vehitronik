<?php

$servername="sql7.freesqldatabase.com";
$username="sql7567131";
$password="QWfMzWQq53";

$dbname="sql7567131";
$tablename="users";

$con = mysqli_connect($servername, $username, $password, $dbname);

if(!$con) {
    echo"Connection Failed!";
    exit();
}