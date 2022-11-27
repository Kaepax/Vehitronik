<?php

$servername="sql7.freesqldatabase.com";
$username="sql7581230";
$password="MQMSwHyUxe";

$dbname="sql7581230";
$tablename="users";

$con = mysqli_connect($servername, $username, $password, $dbname);

if(!$con) {
    echo"Connection Failed!";
    exit();
}