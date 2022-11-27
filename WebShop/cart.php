<?php
session_start();

require_once ("php/CreateDb.php");
require_once ("php/component.php");

$db = new CreateDb("sql7581230", "producttb");

if (isset($_POST['remove'])) {
    if($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if($value["product_id"] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been removed!')</script>";
                echo "<script>window.location = 'cart.php' </script>";
            }
        }
    }

}

?>

<!DOCTYPE html>

<!-- Breadcrumb-->
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Cart</title>
    <!-- Vendors styles-->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icons/logo2.svg">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/icons/logo2.svg">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/icons/logo2.svg">
    <link rel="stylesheet" href="vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <link href="vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php

require_once('php/header.php');

?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>
                <?php

                $total = 0;
                if (isset($_SESSION['cart'])) {
                    $product_id=array_column($_SESSION['cart'], 'product_id');
                    $result = $db->getData();
                    while($row = mysqli_fetch_assoc($result)){
                        foreach($product_id as $id) {
                            if($row['id'] == $id) {
                                cartElement($row['product_image'], $row['product_name'], $row['product_price'], $row['id']);
                                $total = $total + (int)$row['product_price'];
                            }
                        }
                    }
                } else {
                    echo "<h5>Cart is empty.</h5>";
                }


                ?>

            </div>
        </div>
        <div class="col-md-5 offset-md-1 border rounded mt-5 bg-white h-25">
            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            } else {
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>$<?php echo $total; ?></h6>
                    </div>
                    <div class="m-1"><button class="m-2 btn-primary btn float-end" type="submit" form="">Purchase</button></div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>


<!-- CoreUI and necessary plugins-->
<script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<script src="vendors/simplebar/js/simplebar.min.js"></script>
<!-- Plugins and scripts required by this view-->
<script src="vendors/chart.js/js/chart.min.js"></script>
<script src="vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
<script src="vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="js/main.js"></script>
<script>
</script>
</body>
</html>

