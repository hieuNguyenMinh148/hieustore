<?php require "../layout/header-admin.php" ?>
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Tổng quan</li>
        </ol>
        <div class="mb-3 my-3">

        </div>
        <br>
        <!-- Icon Cards-->
        <div class="row">
            <div class="col-xl-4 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-list"></i>
                        </div>
                        <div class="mr-5">Tài khoản</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="account.php">
                        <span class="float-left">Chi tiết</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-life-ring"></i>
                        </div>
                        <div class="mr-5">Đơn hàng</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="bill.php">
                        <span class="float-left">Chi tiết</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-shopping-cart"></i>
                        </div>
                        <div class="mr-5">Sản phẩm</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="product.php">
                        <span class="float-left">Chi tiết</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>

        </div>

    </div>
</div>
</div>
<?php require "../layout/footer-admin.php" ?>