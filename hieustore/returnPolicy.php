<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../site/css-2/detail.css">
    <title>Chính sách đổi trả</title>
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
                <li class="active"><a href="returnPolicy.php">Chính sách đổi trả</a></li>
                <li><a href="paymentPolicy.php">Chính sách thanh toán</a></li>
                <li><a href="deliveryPolicy.php">Chính sách giao hàng</a></li>
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
                        <li class="active"><span>Chính sách đổi trả</span></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h4 id="giao-hang">Chính sách đổi trả</h4>
                    <div class="content-page border-page">
                        <p><b>Điều kiện đổi trả:</b></p>

                        <p><span>Shop sẽ chấp nhận đổi trả cho các trường hợp sau đây:</span></p>
                        <ul>
                            <li><span>Sản phẩm bị hư hỏng do quá trình vận chuyển. Ví dụ: Lorem ipsum dolor sit amet
                                    consectetur adipisicing elit. Reprehenderit, facilis.</span></li>
                            <li><span>Sản phẩm bị hư hỏng trong quá trình sản xuất. Ví dụ: Lorem ipsum dolor, sit amet
                                    consectetur adipisicing elit. Debitis, non.</span></li>
                            <li><span>Sản phẩm không giống như những gì bạn được nghe, thấy và nhìn ở trên website hay
                                    từ nhân viên tư vấn.</span></li>
                        </ul>
                        <p><span>Nếu như sản phẩm của bạn không nằm trong những mục ở trên, chúng tôi có quyền được từ
                                chối yêu cầu đổi trả của quý khách.</span></p>
                        <p><b>Thời gian đổi trả:</b></p>

                        <p><span>Thời gian đổi trả cố định trong vòng 07 ngày. Thời gian bảo hành được kéo dài
                                đến 14 ngày kể từ ngày mua hàng với một số trường hợp đặc biệt. Ví dụ: Lorem ipsum dolor
                                sit amet consectetur adipisicing elit. Iure, neque?</span></p>
                        <p><b>Quy định đổi trả:</b></p>
                        <ul>
                            <li><span>Cùng mã sản phẩm (chỉ đổi size, đổi màu): Đổi miễn phí</span></li>
                            <li><span>Khác mã sản phẩm:</span></li>
                        </ul>
                        <ul>
                            <li><span>Nếu sản phẩm mới (sản phẩm muốn đổi) có giá trị &gt; giá trị sản phẩm cũ (dựa theo
                                    hóa đơn thanh toán): Khách hàng sẽ bù thêm chi phí để đổi lấy sản phẩm mới theo công
                                    thức sau (Giá trị sản phẩm mới) - (Giá trị sản phẩm cũ).</span></li>
                            <li><span>Nếu sản phẩm mới (sản phẩm muốn đổi) có giá trị &lt; giá trị sản phẩm cũ (dựa theo
                                    hóa đơn thanh toán): Khách hàng sẽ được nhận lại tiền thừa theo công thức (Giá trị
                                    sản phẩm cũ) - (Giá trị sản phẩm mới).<br><br></span></li>
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