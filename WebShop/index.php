<?php

session_start();

require_once('php/CreateDb.php');
require_once('php/component.php');

$database = new CreateDb("sql7581230", "producttb");

if(isset($_POST['add'])) {
//    print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])) {

        $item_array_id = array_column($_SESSION['cart'],"product_id");
//        print_r($item_array_id);
//        print_r($_SESSION['cart']);
        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart!')</script>";
            echo "<script>window.location=\"index.php\"</script>";
        } else {
            $count = count($_SESSION['cart']);
            $item_array=array(
                'product_id' => $_POST['product_id']
            );
            $_SESSION['cart'][$count] = $item_array;
//            print_r($_SESSION['cart']);
        }
    } else {
        $item_array=array(
            'product_id' => $_POST['product_id']
        );
        $_SESSION['cart'][0] = $item_array;
//        print_r($_SESSION['cart']);
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
    <title>Vehitronik Shopping Website</title>
    <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icons/logo2.svg">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/icons/logo2.svg">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/icons/logo2.svg">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/icons/logo2.svg">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
    <link href="vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
</head>
<body>
<?php if ($_SESSION['role']=='admin') {?>
<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <h class="sidebar-brand-full" style="font-size:50px;">Vehitronik</h>
        <h class="sidebar-brand-narrow" style="font-size:1px;">
            <svg class="nav-icon" style="width: 10rem">
                <use xlink:href="assets/icons/logo2.svg"></use>
            </svg>
            VT
        </h>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <svg class="nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-home"></use>
                </svg> Home<span class="badge badge-sm bg-info ms-auto"></span></a></li>
        <li class="nav-title">Admin Options</li>
        <li class="nav-item">
            <a class="nav-link" href="500.html">
                <svg class="nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-car-alt"></use>
                </svg> Manage Products<span class="badge badge-sm bg-info ms-auto"></span></a></li>
        <li class="nav-item">
            <a class="nav-link" href="500.html">
                <svg class="nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                </svg> Manage Users<span class="badge badge-sm bg-info ms-auto"></span></a></li>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <header class="header header-sticky mb-4">
        <div class="container-fluid">
            <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                <svg class="icon icon-lg">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                </svg>
            </button><a class="header-brand d-md-none" href="#">
                <ul class="header-nav d-none d-md-flex">
                    <li class="nav-item"><a class="nav-link" href="500.html">Manage Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="500.html">Manage Users</a></li>
                </ul>
                <ul class="header-nav ms-auto">

                </ul>
                <ul class="header-nav ms-3">
                    <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md"><h>Admin&nbsp;</h><img class="avatar-img" src="assets/img/avatars/10.jpg" alt="user@email.com"></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="dropdown-header bg-light py-2">s
                                <div class="fw-semibold">Account</div>
                            </div>
                            <a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                                </svg> Messages<span class="badge badge-sm bg-success ms-2"></span></a>
                            <a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-credit-card"></use>
                                </svg> Payments<span class="badge badge-sm bg-secondary ms-2"></span></a>
                            <div class="dropdown-header bg-light py-2">
                                <div class="fw-semibold">Settings</div>
                            </div>
                            <a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                </svg> Profile</a><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                                </svg> Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                                </svg> Logout</a>
                        </div>
                    </li>
                </ul>
        </div>
        <div class="header-divider"></div>
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-0 ms-2">
                    <li class="breadcrumb-item">
                        <!-- if breadcrumb is single--><span>Home</span>
                    </li>
                </ol>
            </nav>
        </div>
    </header>
<!--    --><?php //require_once("php/header.php") ?>
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="card" style="width: 18rem;">
                    <?php
                    $result=$database->getData();
                    while($row=mysqli_fetch_assoc($result)){
                        component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                    }
                    ?>
                </div>
            </div>
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
    <?php }elseif ($_SESSION['role']=='user') {?>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            <h class="sidebar-brand-full" style="font-size:50px;">Vehitronik</h>
            <h class="sidebar-brand-narrow" style="font-size:20px;">VT</h>
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <svg class="nav-icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-home"></use>
                    </svg> Home<span class="badge badge-sm bg-info ms-auto"></span></a></li>
            <li class="nav-item">
                <a class="nav-link" href="cart.php">
                    <svg class="nav-icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-cart"></use>
                    </svg> View shopping cart<span class="badge badge-sm bg-info ms-auto"></span></a></li>
        </ul>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container-fluid">
                <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                    <svg class="icon icon-lg">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                    </svg>
                </button><a class="header-brand d-md-none" href="#">
                    <ul class="header-nav d-none d-md-flex">
                        <li class="nav-item"><a class="nav-link" href="index.php">Products</a></li>
                    </ul>
                    <ul class="header-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="cart.php">
                                <svg class="icon icon-lg">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-cart"></use>
                                </svg>
                                <?php
                                if (isset($_SESSION['cart'])){
                                    $count = count($_SESSION['cart']);
                                    echo "<span id=\"cart_count\" class=\"text\">$count</span>";
                                } else {
                                    echo "<span id=\"cart_count\" class=\"text\">0</span>";
                                }
                                ?></a></li>
                    </ul>
                    <ul class="header-nav ms-3">
                        <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar avatar-md">
                                        <?php
                                        if (isset($_SESSION['username'])){
                                            $username = $_SESSION['username'];
                                            echo "<span id=\"username\" class=\"text\">$username</span>";
                                        } else {
                                            echo "<span id=\"username\" class=\"text\">User</span>";
                                        }
                                        ?>
                                    <img class="avatar-img" src="assets/img/avatars/10.jpg" alt="user@email.com"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end pt-0">
                                <div class="dropdown-header bg-light py-2">
                                    <div class="fw-semibold">Account</div>
                                </div>
                                <a class="dropdown-item" href="#">
                                    <svg class="icon me-2">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                                    </svg> Messages<span class="badge badge-sm bg-success ms-2"></span></a>
                                <a class="dropdown-item" href="#">
                                    <svg class="icon me-2">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-credit-card"></use>
                                    </svg> Payments<span class="badge badge-sm bg-secondary ms-2"></span></a>
                                <div class="dropdown-header bg-light py-2">
                                    <div class="fw-semibold">Settings</div>
                                </div>
                                <a class="dropdown-item" href="#">
                                    <svg class="icon me-2">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                    </svg> Profile</a><a class="dropdown-item" href="#">
                                    <svg class="icon me-2">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                                    </svg> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <svg class="icon me-2">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                                    </svg> Logout</a>
                            </div>
                        </li>
                    </ul>
            </div>
            <div class="header-divider"></div>
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-0 ms-2">
                        <li class="breadcrumb-item">
                            <!-- if breadcrumb is single--><span>Home</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </header>
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                    <div class="d-flex justify-content-around">
                        <div style="flex-basis: 20rem">
                    <?php
                    $result=$database->getData();
                    while($row=mysqli_fetch_assoc($result)) {
                        component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                    }?>
                        </div>
                    </div>
                </div>
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
</body>
</html>
<?php }else{
    header("Location: login.php");
} ?>