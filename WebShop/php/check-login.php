<?php
session_start();
include 'userdb.php';

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

    $key = "aswkjfrh23ubnakfahiwof";
    $plaintext = $password;
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
//    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    $ciphertext = base64_encode( $hmac.$ciphertext_raw );

    $sql = "SELECT * FROM users where username='$username' AND password='$ciphertext'";

    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)===1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['password'] === $ciphertext && $row['role']==$role) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['username'] = $row['username'];

            header("Location: ../index.php");
        }else{
            header("Location: ../login.php?error=Incorrect Username or password");
            }
    }else {
        header("Location: ../login.php?error=Incorrect Username or password");
    }
}else{
    header("Location: ../login.php");
}
