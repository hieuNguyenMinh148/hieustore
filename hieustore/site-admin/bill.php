<?php require "../layout/header-admin.php" ?>

<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Đơn hàng</a>
            </li>
            <li class="breadcrumb-item active">Thông tin đơn hàng</li>
        </ol>
        <!-- Icon Cards-->

        <?php
        require '../connect.php';

        $stmt = $conn->prepare("SELECT * FROM bill");
        $stmt->execute();
        $bill = $stmt->fetchAll();
        ?>
        <div class="container">
            <hr>
            <?php $search = $_GET['search'] ?? null ?>
            <form action="./bill.php" method="GET">
                <label class="form-inline justify-content-end">Tìm kiếm: <input type="search" name="search" class="form-control" value="<?= $search ?>">
                    <button class="btn btn-danger">Tìm</button>
                </label>
            </form>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Phương thức thanh toán</th>
                        <th>Đơn hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($search) {
                        $query1 = "SELECT * FROM bill WHERE fullname LIKE '%$search%' OR mobile LIKE '%$search%'";
                        $stmt = $conn->prepare($query1);
                        $stmt->execute();
                        $bill = $stmt->fetchAll();
                    }

                    $stt = 1;
                    foreach ($bill as $bills) : ?>
                        <tr>
                            <td><?= $stt ?></td>
                            <td><?= $bills['fullname'] ?></td>
                            <td><?= $bills['mobile'] ?></td>
                            <td><?= $bills['address'] ?></td>
                            <td><?php if ($bills['payment_method'] == 1) {
                                    echo "Chuyển khoản ngân hàng";
                                } else {
                                    echo "Thanh toán khi giao hàng";
                                } ?></td>
                            <td><button class="btn btn-warning"><a href="bills/bill-detail.php?customer_id=<?= $bills['customer_id'] ?>">Chi
                                        tiết đơn hàng</a></button></td>
                            <td><button class="btn btn-danger btn-sm delete" data-url="" type="button" data-toggle="modal" data-target="#exampleModal">Xóa</button></td>
                        </tr>
                    <?php
                        $stt++;
                    endforeach
                    ?>
                </tbody>
            </table>
            <br>
            <hr>
        </div>

        <!-- Alert -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <a href="../site-admin/bills/delete.php?id=<?= $bills['id'] ?>" class="btn btn-primary">Xác
                            nhận</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>


</body>

<?php require "../layout/footer-admin.php" ?>