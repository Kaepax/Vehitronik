<?php

include("../cart.php");

if(isset($_SESSION['username'])) {
    header("location:../index.php");


    include_once("userdb.php");

    if (isset($_SESSION['cart'])) {
        $product_id = array_column($_SESSION['cart'], 'product_id');
        $result = $db->getData();
        while ($row = mysqli_fetch_assoc($result)) {
            $product_idn[] = $row["product_id"];
        }
    }
    if (isset($_SESSION['username'])) {
        $customer_uid = $_SESSION['id'];
    }

    for ($i = 0; $i < count($product_id); $i++) {

        $sql = "INSERT INTO orderstb (customer_id,product_id) VALUES ('$customer_uid','" . $product_idn[$i] . "')";
        mysqli_query($con, $sql);
    }
}