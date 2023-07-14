<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../site/css-2/detail.css">
    <title>Liên hệ</title>
</head>
<?php require "layout/header.php" ?>

<body>
    <header>

        <!-- use for ajax -->
        <input type="hidden" id="reference" value="">
        <!-- Top Navbar -->
        <div class="top-navbar container-fluid">
            <div class="row">
                <div class="col-md-6 hidden-sm hidden-xs">
                    <ul class="list-inline">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-10 col-xs-11">
                    <ul class="list-inline pull-right top-right">
                        <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 0)) {
                            echo "<font color='white'>Xin chào " . $_SESSION['name'] . "</font>"; ?>
                            <li class="account-login">
                                <a class="btn-register" href="site-admin/data-account/logout-data.php">Logout</a>
                            </li>
                        <?php } else { ?>
                            <li class="account-login">
                                <a href="javascript:void(0)" class="btn-register">Đăng Ký</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="btn-login">Đăng Nhập</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End header -->
    </header>

    <!-- NAVBAR DESKTOP-->
    <nav class="navbar navbar-default desktop-menu">
        <div class="container">
            <ul class="nav navbar-nav navbar-left hidden-sm hidden-xs">
                <li>
                    <a href="index.php">Trang chủ</a>
                </li>
                <li><a href="returnPolicy.php">Chính sách đổi trả</a></li>
                <li><a href="paymentPolicy.php">Chính sách thanh toán</a></li>
                <li><a href="deliveryPolicy.php">Chính sách giao hàng</a></li>
                <li class="active"><a href="contact.php">Liên hệ</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="cart"><a href="javascript:void(0)" class="btn-cart-detail" title="Giỏ Hàng"><i class="fa fa-shopping-cart"></i></a>
                </li>
            </ul>
        </div>
    </nav>

    <br>
    <?php require 'connect.php'; ?>

    <main id="maincontent" class="page-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="/" target="_self">Trang chủ</a></li>
                        <li><span>/</span></li>
                        <li class="active"><span>Liên hệ</span></li>
                    </ol>
                </div>
            </div>
            <div class="row contact">
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.158056026163!2d105.99537137498075!3d21.026360880622317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a6466a3e8c35%3A0x6da4184b804238e7!2zSOG7jWMgVmnhu4duIFTDsmEgw6Fu!5e0!3m2!1svi!2s!4v1681191283476!5m2!1svi!2s" width="100%" height="400px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div class="col-md-6">
                    <h4>Thông tin liên hệ</h4>
                    <form class="form-contact" action="site-user/lien-he.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="fullname" placeholder="Họ và tên" required oninvalid="this.setCustomValidity('Vui lòng nhập tên của bạn')" oninput="this.setCustomValidity('')">
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="email" class="form-control" name="email" placeholder="Email" required oninvalid="this.setCustomValidity('Vui lòng nhập email')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="tel" class="form-control" name="mobile" placeholder="Số điện thoại" required pattern="[0][0-9]{9,}" oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại bắt đầu bằng số 0 và ít nhất 9 con số theo sau')" oninput="this.setCustomValidity('')">
                            </div>

                            <div class="form-group col-sm-12">

                                <textarea class="form-control" placeholder="Nội dung" name="content" rows="10" required></textarea>
                            </div>
                            <div class="form-group col-sm-12">
                                <button type="submit" class="btn btn-sm btn-primary pull-right">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </main>
    <?php require "layout/footer.php" ?>
    <?php require "after-footer.php" ?>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</body>

</html>