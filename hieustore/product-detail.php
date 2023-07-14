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
                    <a href="#">Trang chủ</a>
                </li>
                <li><a href="javascript:void(0)">Chính sách đổi trả</a></li>
                <li><a href="javascript:void(0)">Chính sách thanh toán</a></li>
                <li><a href="javascript:void(0)">Chính sách giao hàng</a></li>
                <li><a href="javascript:void(0)">Liên hệ</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="cart"><a href="javascript:void(0)" class="btn-cart-detail" title="Giỏ Hàng"><i
                            class="fa fa-shopping-cart"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    <?php require 'connect.php'; ?>

    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container mt-4">
            <div class="card">
                <div class="container-fliud">
                    <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post"
                        action="/php/twig/frontend/giohang/themvaogiohang">
                        <input type="hidden" name="sp_ma" id="sp_ma" value="5">
                        <input type="hidden" name="sp_ten" id="sp_ten" value="Samsung Galaxy Tab 10.1 3G 16G">
                        <input type="hidden" name="sp_gia" id="sp_gia" value="10990000.00">
                        <input type="hidden" name="hinhdaidien" id="hinhdaidien" value="samsung-galaxy-tab-10.jpg">

                        <div class="wrapper row">
                            <div class="preview col-md-6">
                                <div class="preview-pic tab-content">
                                    <div class="tab-pane" id="pic-1">
                                        <img src="../assets/img/product/samsung-galaxy-tab-10.jpg">
                                    </div>
                                    <div class="tab-pane" id="pic-2">
                                        <img src="../assets/img/product/samsung-galaxy-tab.jpg">
                                    </div>
                                    <div class="tab-pane active" id="pic-3">
                                        <img src="../assets/img/product/samsung-galaxy-tab-4.jpg">
                                    </div>
                                </div>
                                <ul class="preview-thumbnail nav nav-tabs">
                                    <li class="active">
                                        <a data-target="#pic-1" data-toggle="tab" class="">
                                            <img src="../assets/img/product/samsung-galaxy-tab-10.jpg">
                                        </a>
                                    </li>
                                    <li class="">
                                        <a data-target="#pic-2" data-toggle="tab" class="">
                                            <img src="../assets/img/product/samsung-galaxy-tab.jpg">
                                        </a>
                                    </li>
                                    <li class="">
                                        <a data-target="#pic-3" data-toggle="tab" class="active">
                                            <img src="../assets/img/product/samsung-galaxy-tab-4.jpg">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="details col-md-6">
                                <h3 class="product-title"><b>Kem Chống Nắng - Minh Hiếu</b></h3>
                                <div class="rating">
                                    <div class="stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                    <span class="review-no">56 reviews</span>
                                </div>
                                <p class="product-description">Kem Chống Nắng cho da nhạy cảm, bảo vệ da tối đa, thích
                                    hợp với làn da nhạy cảm, hiệu quả chống nắng, chống các gốc tự do, bảo vệ tế bào.
                                </p>

                                <h4 class="price">Giá: <span><b>500.000 vnđ</b></span></h4>
                                <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo
                                    <strong>Uy
                                        tín</strong>!
                                </p>

                                <div class="form-group">
                                    <label for="soluong">Số lượng đặt mua:</label>
                                    <input type="number" class="form-control" id="soluong" name="soluong">
                                </div>
                                <div class="action">
                                    <a class="add-to-cart btn btn-default" id="btnThemVaoGioHang">Thêm vào giỏ hàng</a>
                                    <a class="add-to-cart btn btn-default" id="btnThemVaoGioHang">Mua ngay</a>
                                    <a class="like btn btn-default" href="#"><span class="fa fa-heart"></span></a>

                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="card1">
                <div class="container-fluid">
                    <h3>Thông tin chi tiết về Sản phẩm</h3>
                    <div class="row">
                        <div class="col">
                            🍀 <b>THÀNH PHẦN </b><br>
                            Ethylhexyl Triozone (UVB), Diethyl-amino Hydroxybenzoyl – DHHB (UVA), Ethylhexyl
                            Methoxycinnamate – EHMC (UVB). <br>
                            <br>
                            🍀 <b>ĐỐI TƯỢNG SỬ DỤNG </b><br>
                            Dùng cho da viêm do tác động ánh nắng mặt trời. <br>
                            <br>
                            🍀 <b>ƯU ĐIỂM </b><br>
                            Dạng kem nhẹ, dễ thẩm thấu, hương thơm dịu nhẹ. <br>
                            <br>
                            <b>QUÝ KHÁCH HÀNG VUI LÒNG CHAT HOẶC GỌI TỚI SỐ HOTLINE: <a
                                    style="cursor:pointer;font-size:20px">0359.621.309</a></b>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require "layout/footer.php" ?>
    <?php require "after-footer.php" ?>

    <!-- DETAIL PRODUCT -->
    <div class="modal fade" id="modal-product-detail" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-color">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title text-center">Chi tiết sản phẩm</h3>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="container-fliud">
                            <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post"
                                action="/php/twig/frontend/giohang/themvaogiohang">
                                <input type="hidden" name="sp_ma" id="sp_ma" value="5">
                                <input type="hidden" name="sp_ten" id="sp_ten" value="Samsung Galaxy Tab 10.1 3G 16G">
                                <input type="hidden" name="sp_gia" id="sp_gia" value="10990000.00">
                                <input type="hidden" name="hinhdaidien" id="hinhdaidien"
                                    value="samsung-galaxy-tab-10.jpg">

                                <div class="wrapper row">
                                    <div class="preview col-md-6">
                                        <div class="preview-pic tab-content">
                                            <div class="tab-pane" id="pic-1">
                                                <img src="../assets/img/product/samsung-galaxy-tab-10.jpg">
                                            </div>
                                            <div class="tab-pane" id="pic-2">
                                                <img src="../assets/img/product/samsung-galaxy-tab.jpg">
                                            </div>
                                            <div class="tab-pane active" id="pic-3">
                                                <img src="../assets/img/product/samsung-galaxy-tab-4.jpg">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="details col-md-6">
                                        <h3 class="product-title">Samsung Galaxy Tab 10.1 3G 16G</h3>
                                        <div class="rating">
                                            <div class="stars">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                            <span class="review-no">999 reviews</span>
                                        </div>
                                        <p class="product-description">Màn hình 10.1 inch cảm ứng đa điểm</p>
                                        <small class="text-muted">Giá cũ: <s><span>10,990,000.00
                                                    vnđ</span></s></small>
                                        <h4 class="price">Giá hiện tại: <span>10,990,000.00 vnđ</span></h4>
                                        <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm
                                            bảo
                                            <strong>Uy
                                                tín</strong>!
                                        </p>

                                        <div class="form-group">
                                            <label for="soluong">Số lượng đặt mua:</label>
                                            <input type="number" class="form-control" id="soluong" name="soluong">
                                        </div>
                                        <div class="action">
                                            <a class="add-to-cart btn btn-default" id="btnThemVaoGioHang">Thêm vào
                                                giỏ
                                                hàng</a>
                                            <a class="like btn btn-default" href="#"><span
                                                    class="fa fa-heart"></span></a>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="container-fluid">
                            <h3>Thông tin chi tiết về Sản phẩm</h3>
                            <div class="row">
                                <div class="col">
                                    Vi xử lý Dual-core 1 Cortex-A9 tốc độ 1GHz
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="clearfix">
                        <input type="button" name="checkout" class="btn btn-primary" value="Đặt hàng">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- END DETAIL PRODUCT -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</body>

</html>