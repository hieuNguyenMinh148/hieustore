<!DOCTYPE html>
<html lang="en">
<?php
session_start();
ob_start();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tổng quan</title>

    <!-- Custom fonts for this template-->
    <link href="deco/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="deco/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="deco/css/sb-admin.css" rel="stylesheet">
    <link href="deco/css/admin.css" rel="stylesheet">
</head>

<body id="page-top">
    <?php
    if ((isset($_SESSION['role'])) && ($_SESSION['role'] == 1)) {
    ?>
    <?php
    } else {
        // header('location: ../../../index.php');
    }
    ?>
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <a class="navbar-brand mr-1" href="index.php">Mỹ Phẩm</a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Navbar Search -->
        <!-- Navbar -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item no-arrow text-white">
                <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 1)) {
                    echo "<font color='white'>Xin chào " . $_SESSION['name'] . "</font>";
                } ?> |
                <a class="text-white nounderline" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </li>
        </ul>
    </nav>

    <body>
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="sidebar navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php"><i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Tổng quan</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id=""><i class="fas fa-user-alt"></i>
                        <span>Tài khoản</span></a>
                    <div class="dropdown-menu" aria-labelledby="">
                        <a class="dropdown-item" href="account.php">Danh sách</a>
                        <a class="dropdown-item" href="accounts/insert.php">Thêm</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id=""><i class="fas fa-shopping-cart"></i> <span>Đơn hàng</span></a>
                    <div class="dropdown-menu" aria-labelledby="">
                        <a class="dropdown-item" href="bill.php">Danh sách</a>

                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id=""><i class="fab fa-product-hunt"></i> <span>Sản phẩm</span></a>
                    <div class="dropdown-menu" aria-labelledby="">
                        <a class="dropdown-item" href="product.php">Danh sách</a>
                        <a class="dropdown-item" href="products/insert.php">Thêm</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id=""><i class="fas fa-file-alt"></i>
                        <span>News letter</span></a>
                    <div class="dropdown-menu" aria-labelledby="">
                        <a class="dropdown-item" href="letters.php">Danh sách</a>
                    </div>
                </li>
            </ul>