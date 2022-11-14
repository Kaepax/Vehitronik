<?php

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])){
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $role = test_input($_POST['role']);

    if(empty($username)) {
        header("Location: ../login.html?error=Username is required");
    }elseif (empty($password)) {
        header("Location: ../login.html?error=Password is required");
    }else {
        header("Location: ../index.php");
    }

}else{
    header("Location: ../login.html");
}
