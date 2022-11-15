<?php

require('userdb.php');

if(isset($_REQUEST['username'])){

    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con,$username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    $name = stripslashes($_REQUEST['name']);
    $name= mysqli_real_escape_string($con,$name);

    $sql = "INSERT INTO users (role, username, password, name) VALUES ('user', '$username','".md5($password)."','$name')";
    $result = mysqli_query($con, $sql);

    if($result){
        echo 'Success';
        header("Location: ../login.php");
    }else{
        echo 'error';
    }
}
