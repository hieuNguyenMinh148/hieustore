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
                <input type="search" class="form-control search" placeholder="Nhập từ khóa tìm kiếm" name="search" autocomplete="off" value="<?= $search ?>">
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
                <li class="cart"><a href="javascript:void(0)" class="btn-cart-detail" title="Giỏ Hàng"><i class="fa fa-shopping-cart"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
    require 'connect.php';
    // var_dump($_GET);
    define("item_per_page", '8');
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * 8;
    $query = "SELECT * FROM product ORDER BY 'id' ASC LIMIT " . item_per_page . " OFFSET " . $offset . "";
    // $product = mysqli_query($conn, $query);
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $product = $stmt->fetchAll();
    $totalRecord =  $stmt->rowCount();

    $stmt = $conn->prepare("SELECT * FROM product");
    $stmt->execute();
    $producted = $stmt->fetchAll();
    $totalRecord =  $stmt->rowCount();
    // echo $totalRecord;
    $totalPage = ceil($totalRecord / item_per_page);
    // echo $totalPage;
    // $query1 = "ORDER BY 'id' ASC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
    // $totalRecord = mysqli_query($conn, "SELECT * FROM product");
    // $totalRecord = $totalRecord->num_rows;
    // $totalPage = ceil($totalRecord / item_per_page);
    //var_dump($product);
    ?>
    <main id="maincontent" class="page-main">
        <div class="container">
            <div class="row equal">
                <div class="col-xs-12">
                    <h4 class="home-title">Sản phẩm nổi bật</h4>
                </div>
                <?php
                if ($search) {
                    $query1 = "SELECT * FROM product WHERE name LIKE '%$search%' ORDER BY 'id' ASC LIMIT " . item_per_page . " OFFSET " . $offset . "";
                    $stmt = $conn->prepare($query1);
                    $stmt->execute();
                    $product = $stmt->fetchAll();
                }
                foreach ($product as $products) : ?>
                    <div class="col-xs-6 col-sm-3 products">
                        <?php require 'site-user/product.php' ?>
                    </div>
                <?php endforeach ?>
            </div>
            <!-- Paging -->
            <ul class="pagination pull-right">
                <?php
                if ($current_page > 3) {
                    $first_page = 1;
                ?>
                    <li><a href="?page=<?= $first_page ?>">First</a></li>
                <?php }
                if ($current_page > 1) {
                    $prev_page = $current_page - 1;
                ?>
                    <li><a href="?page=<?= $prev_page ?>">Previous</a></li>
                <?php } ?>

                <?php for ($num = 1; $num <= $totalPage; $num++) { ?>
                    <?php if ($num != $current_page) { ?>
                        <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
                            <li><a href="?page=<?= $num ?>"><?= $num ?></a></li>
                        <?php } ?>
                    <?php } else { ?>
                        <li class="active"><a href="?page=<?= $num ?>"><?= $num ?></a></li>
                    <?php } ?>
                <?php }
                if ($current_page < $totalPage - 1) {
                    $next_page = $current_page + 1;
                ?>
                    <li><a href="?page=<?= $next_page ?>">Next</a></li>
                <?php } ?>

                <?php
                if ($current_page < $totalPage - 3) {
                    $end_page = $totalPage;
                ?>
                    <li><a href="?page=<?= $end_page ?>">Last</a></li>
                <?php } ?>
            </ul>
            <!-- End paging -->
        </div>

    </main>

    <?php require "layout/footer.php" ?>
    <?php require "after-footer.php" ?>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</body>

</html>