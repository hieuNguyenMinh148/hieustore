<?php require "../layout/header-admin.php" ?>

<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Sản phẩm</a>
            </li>
            <li class="breadcrumb-item active">Thông tin sản phẩm</li>
        </ol>
        <!-- Icon Cards-->

        <?php
        require '../connect.php';
        define("item_per_page", '5');
        $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * 5;
        $query = "SELECT * FROM product ORDER BY 'id' ASC LIMIT " . item_per_page . " OFFSET " . $offset . "";
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
        // var_dump($product);
        ?>
        <div class="container">
            <hr>
            <?php $search = $_GET['search'] ?? null ?>
            <form action="./product.php" method="GET">
                <label class="form-inline justify-content-end">Tìm kiếm: <input type="search" name="search"
                        class="form-control" value="<?= $search ?>">
                    <button class="btn btn-danger">Tìm</button>
                </label>
            </form>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá thành</th>
                        <th>Ảnh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($search) {
                        $query1 = "SELECT * FROM product WHERE name LIKE '%$search%' ORDER BY 'id' ASC LIMIT " . item_per_page . " OFFSET " . $offset . "";
                        $stmt = $conn->prepare($query1);
                        $stmt->execute();
                        $product = $stmt->fetchAll();
                    }
                    
                    $stt = 1;
                    foreach ($product as $products) : ?>
                    <tr>
                        <td><?= $stt  ?></td>
                        <td><?= $products['name']  ?></td>
                        <td><?= $products['price']  ?></td>
                        <td><img src="../upload/<?= $products['featured_image'] ?>" alt=""
                                style="width: 50px; height: 50px;">
                        </td>
                        <td><a class="btn btn-warning btn-sm"
                                href="../site-admin/products/update.php?id=<?= $products['id'] ?>">Sửa</a></td>
                        <td><button class="btn btn-danger btn-sm delete" data-url="" type="button" data-toggle="modal"
                                data-target="#exampleModal">Xóa</button></td>
                    </tr>
                    <?php
                        $stt++;
                    endforeach
                    ?>
                </tbody>
            </table>
            <br>
            <button class="btn btn-primary"><a href="products/insert.php" style="color: #fff">Thêm sản
                    phẩm</a></button>
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
            <hr>
        </div>

        <!-- Alert -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="display: flex;">
                        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 25px;">Bạn muốn xóa phải không?
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="font-size: 30px;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <a href="../site-admin/products/delete.php?id=<?= $products['id'] ?>"
                            class="btn btn-primary">Xác nhận</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>


</body>

<?php require "../layout/footer-admin.php" ?>