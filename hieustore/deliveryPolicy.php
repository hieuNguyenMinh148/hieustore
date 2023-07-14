<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../site/css-2/detail.css">
    <title>Chính sách giao hàng</title>
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
                <li class="active"><a href="deliveryPolicy.php">Chính sách giao hàng</a></li>
                <li><a href="contact.php">Liên hệ</a></li>
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
                        <li class="active"><span>Chính sách giao hàng</span></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h4>Chính sách giao hàng</h4>
                    <div class="content-page border-page">
                        <p><b>Phạm vi giao hàng</b></p>
                        <p><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto mollitia tenetur,
                                hic, sunt sint id dicta accusamus aliquid vitae dolorem iure voluptatum. Labore totam
                                aliquid optio voluptas enim perspiciatis? Quos.</span>
                        </p>
                        <br>
                        <p><b>Thời gian giao hàng</b></p>
                        <ul>
                            <li><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam illum repellat
                                    iusto repudiandae enim nisi fuga recusandae necessitatibus corporis
                                    numquam?</span><span><br><br></span></li>
                            <li><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut magnam quas, dolorum
                                    totam possimus consequuntur ut laboriosam rem impedit voluptates. Esse magni iure
                                    quibusdam odit..</span></li>
                        </ul>
                        <p><span>Lưu ý: Thời gian giao hàng được bắt đầu tính sau khi đơn hàng của quý khách được xác
                                nhận thành công bằng cuộc gọi của nhân viên chăm sóc khách hàng của chúng tôi.</span>
                        </p>

                        <p><b>Phí giao hàng</b></p>
                        <ul>
                            <li><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum impedit
                                    blanditiis distinctio, similique neque officia.</span></li>
                            <li><span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum libero distinctio
                                    dolores accusamus, debitis laudantium?</span></li>
                        </ul>
                        <p>
                            <br>
                        </p>
                        <p><b>Hủy đơn hàng</b></p>
                        <ul>
                            <li><span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus minima
                                    assumenda dolores. Laborum, maiores at.</span></li>
                            <li><span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus cumque
                                    reiciendis molestias quas sit vero.</span>
                            </li>
                            <li><span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae quod qui
                                    facilis, dignissimos vero nam commodi nemo modi eligendi itaque.<br></span>
                            </li>
                        </ul>

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