<?php require "../layout/header-admin.php" ?>


<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Tài khoản</a>
            </li>
            <li class="breadcrumb-item active">Thông tin tải khoản</li>
        </ol>
        <!-- Icon Cards-->

        <?php
        require '../connect.php';
        $query = "SELECT * FROM account";
        // var_dump($product);
        ?>
        <div class="container">
            <hr>
            <?php $search = $_GET['search'] ?? null ?>
            <form action="./account.php" method="GET">
                <label class="form-inline justify-content-end">Tìm kiếm: <input type="search" name="search" class="form-control" value="<?= $search ?>">
                    <button class="btn btn-danger">Tìm</button>
                </label>
            </form>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên người dùng</th>
                        <th>Số điện thoại</th>
                        <th>Tên đăng nhập</th>
                        <th>Mật khẩu</th>
                        <th>Vai trò</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($search) {
                        $query .= " WHERE name LIKE '%$search%'";
                    }
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $account = $stmt->fetchAll();
                    $stt = 1;
                    foreach ($account as $accounts) : ?>
                        <tr>
                            <td><?= $stt ?></td>
                            <td><?= $accounts['name'] ?></td>
                            <td><?= $accounts['phone'] ?></td>
                            <td><?= $accounts['username'] ?></td>
                            <td><?= $accounts['password'] ?></td>
                            <?php
                            $role = $accounts['role'];
                            if ($role == 1) {
                                $role = "Admin";
                            } else {
                                $role = "User";
                            }
                            ?>
                            <td><?= $role ?></td>

                            <td><a class="btn btn-warning btn-sm" href="../site-admin/accounts/update.php?id=<?= $accounts['id'] ?>">Sửa</a></td>
                            <td><button class="btn btn-danger btn-sm delete" data-url="" type="button" data-toggle="modal" data-target="#exampleModal">Xóa</button></td>
                        </tr>
                    <?php
                        $stt++;
                    endforeach
                    ?>
                </tbody>
            </table>
            <br>
            <button class="btn btn-primary"><a href="accounts/insert.php" style="color: #fff">Thêm tài
                    khoản</a></button>
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
                        <a href="../site-admin/accounts/delete.php?id=<?= $accounts['id'] ?>" class="btn btn-primary">Xác nhận</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>


</body>

<?php require "../layout/footer-admin.php" ?>