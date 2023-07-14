<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../site/css-2/detail.css">
    <title>Thong tin chi tiet</title>
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
                <li><a href="index.php">Trang chủ</a></li>
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

    <br>
    <?php require 'connect.php';
    $id = $_GET['id'];
    $query = "SELECT * FROM product WHERE id=$id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $product = $stmt->fetchAll();
    // var_dump($product);
    foreach ($product as $products) :
    ?>

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
                                <div class="image">
                                    <img src="upload/<?= $products['featured_image'] ?>" alt="">
                                </div>

                            </div>
                            <div class="details col-md-6">
                                <h3 class="product-title"><b><?= $products['name'] ?></b></h3>
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
                                <p class="product-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Nostrum repellendus eum, dignissimos vero, accusamus aperiam, nobis hic modi
                                    incidunt provident facere adipisci culpa asperiores unde debitis? Eum praesentium
                                    nesciunt quam.
                                </p>

                                <br>
                                <p class="product-description">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Perspiciatis cum aut eos. Facilis voluptate aperiam rerum in, architecto laborum
                                    exercitationem doloribus incidunt iste ducimus repellat libero reprehenderit culpa
                                    soluta sapiente.
                                </p>
                                <h4 class="price">Giá:
                                    <span><b><?= number_format($products['price'], 0, ",", ".") ?>₫</b></span>
                                </h4>
                                <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo
                                    <strong>Uy
                                        tín</strong>!
                                </p>


                                <div class="action">
                                    <a class="add-to-cart btn btn-default" id="btnThemVaoGioHang"
                                        href="site-user/cart.php?id=<?= $products['id']; ?>">Thêm vào giỏ hàng</a>
                                    <a class="add-to-cart btn btn-default" id="btnThemVaoGioHang">Mua ngay</a>

                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <?php endforeach ?>
            <div class="card1">
                <div class="container-fluid">
                    <h3>Thông tin chi tiết về Sản phẩm</h3>
                    <div class="row">
                        <div class="col">
                            🍀 <b>THÀNH PHẦN </b><br>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati voluptatibus porro
                            officiis delectus, iste architecto, necessitatibus animi est quisquam iure corrupti
                            doloremque exercitationem dolore consequatur. <br>
                            <br>
                            🍀 <b>ĐỐI TƯỢNG SỬ DỤNG </b><br>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus inventore odit fuga
                            accusamus id mollitia magnam tempora iure? Tempora, fugit!<br>
                            <br>
                            🍀 <b>ƯU ĐIỂM </b><br>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis architecto excepturi esse
                            quasi, reprehenderit sapiente. <br>
                            <br>
                            <b>QUÝ KHÁCH HÀNG VUI LÒNG CHAT HOẶC GỌI TỚI SỐ HOTLINE: <a
                                    style="cursor:pointer;font-size:20px">0868179633</a></b>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <?php require "layout/footer.php" ?>
        <?php require "after-footer.php" ?>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
</body>

</html>