<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../site/css-2/detail.css">
    <title>Chính sách thanh toán</title>
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
                <li class="active"><a href="paymentPolicy.php">Chính sách thanh toán</a></li>
                <li><a href="deliveryPolicy.php">Chính sách giao hàng</a></li>
                <li><a href="contact.php">Liên hệ</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="cart"><a href="javascript:void(0)" class="btn-cart-detail" title="Giỏ Hàng"><i
                            class="fa fa-shopping-cart"></i></a>
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
                        <li class="active"><span>Chính sách thanh toán</span></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h4 id="giao-hang">Chính sách thanh toán</h4>
                    <div class="content-page border-page">

                        <p><span>Hiện tại cửa hàng chúng tôi hỗ trợ 02 hình thức thanh toán, giúp bạn chủ động và thuận
                                tiện hơn trong quá trình giao hàng: </span></p>

                        <p><b>Thanh toán trực tuyến trên website</b></p>
                        <p><span>Đối với hình thức này, sau khi bạn đã tạo đơn hàng &nbsp;thành công ở trên website bạn
                                vui lòng chuyển khoản tổng giá trị đơn hàng qua tài khoản sau đây:</span></p>

                        <p><span>Thông tin chuyển khoản:</span></p>
                        <p><span>Tên chủ tài khoản: Nguyễn Minh Hiếu</span><span><br></span> <span>Số tài khoản:
                                1903 7181 0410 15</span><span><br></span> <span>Ngân hàng:
                                Techcombank</span><span><br></span></p>
                        <p><span> Lưu ý: Khi bạn chuyển khoản, vui lòng nhập tên người mua hàng.</span></p>
                        <p><span>Sau khi bạn đã thanh toán và chuyển khoản xong, chúng tôi sẽ giao hàng đến cho bạn theo
                                thời gian quy định tại “Chính sách giao hàng” của chúng tôi.</span><span><br><br></span>
                        </p>
                        <p><b>Thanh toán khi nhận hàng (COD - Cash On Delivery)</b></p>
                        <p><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam totam voluptas aut
                                laborum, quis repellendus quos ut aperiam aspernatur accusantium, sequi, numquam
                                asperiores sed modi facilis eum natus obcaecati iste eos delectus aliquam nemo hic at
                                ullam! Porro, nostrum suscipit.</span></p>
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