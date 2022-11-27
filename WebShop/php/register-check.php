<?php

require('userdb.php');

if(isset($_REQUEST['username'])){

    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con,$username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    $name = stripslashes($_REQUEST['name']);
    $name= mysqli_real_escape_string($con,$name);

    $key = "aswkjfrh23ubnakfahiwof";
    $plaintext = $password;
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
//    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    $ciphertext = base64_encode( $hmac.$ciphertext_raw );

    $sql = "INSERT INTO users (role, username, password, name) VALUES ('user', '$username','$ciphertext','$name')";
    $result = mysqli_query($con, $sql);

    if($result){
        header("Location: ../login.php");
    }else{
        echo "<script>alert('Cannot create account!')</script>";
    }
}else{
    header("Location: ../register.php");
}

