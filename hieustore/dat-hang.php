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
        <?php $search = $_GET['search'] ?? null ?>
        <form class="header-form" action="./" method="GET">
            <div class="input-group">
                <input type="search" class="form-control search" placeholder="Nhập từ khóa tìm kiếm" name="search"
                    autocomplete="off" value="<?= $search ?>">
                <div class="input-group-btn">
                    <button class="btn bt-search bg-color" type="submit"><i class="fa fa-search" style="color:#fff"></i>
                    </button>
                </div>
            </div>
            <div class="search-result">
            </div>
        </form>
        </div>
        </div>
        </div>
        <!-- End header -->
    </header>

    <!-- NAVBAR DESKTOP-->
    <nav class="navbar navbar-default desktop-menu">
        <div class="container">
            <ul class="nav navbar-nav navbar-left hidden-sm hidden-xs">
                <li class="active">
                    <a href="index.php">Trang chủ</a>
                </li>
                <li><a href="returnPolicy.php">Chính sách đổi trả</a></li>
                <li><a href="paymentPolicy.php">Chính sách thanh toán</a></li>
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
    <?php require 'connect.php' ?>
    <main id="maincontent" class="page-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="/" target="_self">Giỏ hàng</a></li>
                        <li><span>/</span></li>
                        <li class="active"><span>Thông tin thanh toán</span></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <aside class="col-md-6 cart-checkout">
                    <?php
                    $custumer_id = $_SESSION['id'];
                    $query = "SELECT * FROM product, order_detail WHERE product.id = order_detail.product_id AND customer_id = $custumer_id";
                    // var_dump($order);
                    $total = 0;
                    if (isset($_SESSION['role']) && ($_SESSION['role'] == 0)) {
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                        $dathang = $stmt->fetchAll();
                        foreach ($dathang as $dathangs) :
                    ?>
                    <div class="row">
                        <div class="col-xs-2">
                            <img class="img-responsive" src="upload/<?= $dathangs['featured_image'] ?>" alt="">
                        </div>
                        <div class="col-xs-7">
                            <a class="product-name"
                                href="detail.php?id=<?= $dathangs['product_id'] ?>"><?= $dathangs['name'] ?></a>
                            <br>

                        </div>
                        <div class="col-xs-3 text-right">
                            <span><?= number_format($dathangs['price'], 0, ",", ".") ?>₫</span>
                        </div>
                    </div>
                    <hr>
                    <?php
                            $total += $dathangs['price'];
                        endforeach;
                    } ?>
                    <div class="row">
                        <div class="col-xs-6">
                            Tạm tính
                        </div>
                        <div class="col-xs-6 text-right">
                            <?= number_format($total, 0, ",", ".") ?>₫
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            Phí vận chuyển
                        </div>
                        <div class="col-xs-6 text-right">
                            <span class="shipping-fee" data="">0₫</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-6">
                            Tổng cộng
                        </div>
                        <div class="col-xs-6 text-right">
                            <span class="payment-total"><?= number_format($total, 0, ",", ".") ?>₫</span>
                        </div>
                    </div>
                </aside>
                <div class="ship-checkout col-md-6">
                    <h4>Thông tin giao hàng</h4>

                    <br>
                    <form action="site-user/thanh-toan.php" method="POST">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text" value="" class="form-control" name="fullname" placeholder="Họ và tên"
                                    required="" oninvalid="this.setCustomValidity('Vui lòng nhập tên của bạn')"
                                    oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="tel" value="" class="form-control" name="mobile"
                                    placeholder="Số điện thoại" required="" pattern="[0][0-9]{9,}"
                                    oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại bắt đầu bằng số 0 và ít nhất 9 con số theo sau')"
                                    oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group col-sm-4">
                                <select name="province" class="form-control province" required=""
                                    oninvalid="this.setCustomValidity('Vui lòng chọn Tỉnh / thành phố')"
                                    oninput="this.setCustomValidity('')">
                                    <option value="">Tỉnh / thành phố</option>
                                    <option value="Thành phố Hà Nội">Thành phố Hà Nội</option>
                                    <option value="Tỉnh Hà Giang">Tỉnh Hà Giang</option>
                                    <option value="Tỉnh Cao Bằng">Tỉnh Cao Bằng</option>
                                    <option value="Tỉnh Bắc Kạn">Tỉnh Bắc Kạn</option>
                                    <option value="Tỉnh Tuyên Quang">Tỉnh Tuyên Quang</option>
                                    <option value="Tỉnh Lào Cai">Tỉnh Lào Cai</option>
                                    <option value="Tỉnh Điện Biên">Tỉnh Điện Biên</option>
                                    <option value="Tỉnh Lai Châu">Tỉnh Lai Châu</option>
                                    <option value="Tỉnh Sơn La">Tỉnh Sơn La</option>
                                    <option value="Tỉnh Yên Bái">Tỉnh Yên Bái</option>
                                    <option value="Tỉnh Hoà Bình">Tỉnh Hoà Bình</option>
                                    <option value="Tỉnh Thái Nguyên">Tỉnh Thái Nguyên</option>
                                    <option value="Tỉnh Lạng Sơn">Tỉnh Lạng Sơn</option>
                                    <option value="Tỉnh Quảng Ninh">Tỉnh Quảng Ninh</option>
                                    <option value="Tỉnh Bắc Giang">Tỉnh Bắc Giang</option>
                                    <option value="Tỉnh Phú Thọ">Tỉnh Phú Thọ</option>
                                    <option value="Tỉnh Vĩnh Phúc">Tỉnh Vĩnh Phúc</option>
                                    <option value="Tỉnh Bắc Ninh">Tỉnh Bắc Ninh</option>
                                    <option value="Tỉnh Hải Dương">Tỉnh Hải Dương</option>
                                    <option value="Thành phố Hải Phòng">Thành phố Hải Phòng</option>
                                    <option value="Tỉnh Hưng Yên">Tỉnh Hưng Yên</option>
                                    <option value="Tỉnh Thái Bình">Tỉnh Thái Bình</option>
                                    <option value="Tỉnh Hà Nam">Tỉnh Hà Nam</option>
                                    <option value="Tỉnh Nam Định">Tỉnh Nam Định</option>
                                    <option value="Tỉnh Ninh Bình">Tỉnh Ninh Bình</option>
                                    <option value="Tỉnh Thanh Hóa">Tỉnh Thanh Hóa</option>
                                    <option value="Tỉnh Nghệ An">Tỉnh Nghệ An</option>
                                    <option value="Tỉnh Hà Tĩnh">Tỉnh Hà Tĩnh</option>
                                    <option value="Tỉnh Quảng Bình">Tỉnh Quảng Bình</option>
                                    <option value="Tỉnh Quảng Trị">Tỉnh Quảng Trị</option>
                                    <option value="Tỉnh Thừa Thiên Huế">Tỉnh Thừa Thiên Huế</option>
                                    <option value="Thành phố Đà Nẵng">Thành phố Đà Nẵng</option>
                                    <option value="Tỉnh Quảng Nam">Tỉnh Quảng Nam</option>
                                    <option value="Tỉnh Quảng Ngãi">Tỉnh Quảng Ngãi</option>
                                    <option value="Tỉnh Bình Định">Tỉnh Bình Định</option>
                                    <option value="Tỉnh Phú Yên">Tỉnh Phú Yên</option>
                                    <option value="Tỉnh Khánh Hòa">Tỉnh Khánh Hòa</option>
                                    <option value="Tỉnh Ninh Thuận">Tỉnh Ninh Thuận</option>
                                    <option value="Tỉnh Bình Thuận">Tỉnh Bình Thuận</option>
                                    <option value="Tỉnh Kon Tum">Tỉnh Kon Tum</option>
                                    <option value="Tỉnh Gia Lai">Tỉnh Gia Lai</option>
                                    <option value="Tỉnh Đắk Lắk">Tỉnh Đắk Lắk</option>
                                    <option value="Tỉnh Đắk Nông">Tỉnh Đắk Nông</option>
                                    <option value="Tỉnh Lâm Đồng">Tỉnh Lâm Đồng</option>
                                    <option value="Tỉnh Bình Phước">Tỉnh Bình Phước</option>
                                    <option value="Tỉnh Tây Ninh">Tỉnh Tây Ninh</option>
                                    <option value="Tỉnh Bình Dương">Tỉnh Bình Dương</option>
                                    <option value="Tỉnh Đồng Nai">Tỉnh Đồng Nai</option>
                                    <option value="Tỉnh Bà Rịa - Vũng Tàu">Tỉnh Bà Rịa - Vũng Tàu</option>
                                    <option value="Thành phố Hồ Chí Minh">Thành phố Hồ Chí Minh</option>
                                    <option value="Tỉnh Long An">Tỉnh Long An</option>
                                    <option value="Tỉnh Tiền Giang">Tỉnh Tiền Giang</option>
                                    <option value="Tỉnh Bến Tre">Tỉnh Bến Tre</option>
                                    <option value="Tỉnh Trà Vinh">Tỉnh Trà Vinh</option>
                                    <option value="Tỉnh Vĩnh Long">Tỉnh Vĩnh Long</option>
                                    <option value="Tỉnh Đồng Tháp">Tỉnh Đồng Tháp</option>
                                    <option value="Tỉnh An Giang">Tỉnh An Giang</option>
                                    <option value="Tỉnh Kiên Giang">Tỉnh Kiên Giang</option>
                                    <option value="Thành phố Cần Thơ">Thành phố Cần Thơ</option>
                                    <option value="Tỉnh Hậu Giang">Tỉnh Hậu Giang</option>
                                    <option value="Tỉnh Sóc Trăng">Tỉnh Sóc Trăng</option>
                                    <option value="Tỉnh Bạc Liêu">Tỉnh Bạc Liêu</option>
                                    <option value="Tỉnh Cà Mau">Tỉnh Cà Mau</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <select name="district" class="form-control district" required=""
                                    oninvalid="this.setCustomValidity('Vui lòng chọn Quận / huyện')"
                                    oninput="this.setCustomValidity('')">
                                    <option value="">Quận / huyện</option>
                                    <option value="Huyện Gia Lâm"> Huyện Gia Lâm</option>
                                    <option value="Huyện Long Biên"> Huyện Long Biên</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <select name="ward" class="form-control ward" required=""
                                    oninvalid="this.setCustomValidity('Vui lòng chọn Phường / xã')"
                                    oninput="this.setCustomValidity('')">
                                    <option value="">Phường / xã</option>
                                    <option value="Xã Lệ Chi"> Xã Lệ Chi</option>
                                    <option value="Xã Kim Sơn"> Xã Kim Sơn</option>
                                    <option value="Xã Kiêu Kỵ"> Xã Kiêu Kỵ</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12">
                                <input type="text" value="" class="form-control" placeholder="Địa chỉ" name="address"
                                    required=""
                                    oninvalid="this.setCustomValidity('Vui lòng nhập địa chỉ bao gồm số nhà, tên đường')"
                                    oninput="this.setCustomValidity('')">
                            </div>
                        </div>
                        <h4>Phương thức thanh toán</h4>
                        <div class="form-group">
                            <label> <input type="radio" name="payment_method" checked="" value="0"> Thanh toán khi giao
                                hàng (COD) </label>
                            <div></div>
                        </div>
                        <div class="form-group">
                            <label> <input type="radio" name="payment_method" value="1"> Chuyển khoản qua ngân hàng
                            </label>
                            <div class="bank-info">STK: 1903 7181 0410 15<br>Chủ TK: Nguyễn Minh Hiếu. Ngân hàng:
                                Techcombank
                                <br>

                            </div>
                        </div>
                        <div>
                            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 0)) { ?>
                            <button type="submit" class="btn btn-sm btn-primary pull-right">Hoàn tất đơn hàng</button>
                            <?php } else { ?>
                            <h4 style="color: red;">Mời bạn đăng nhập để thực hiện bước thanh toán</h4>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php require "layout/footer.php" ?>

    <?php require "after-footer.php" ?>


    <script src="https://apis.google.com/js/platform.js" async defer></script>
</body>

</html>