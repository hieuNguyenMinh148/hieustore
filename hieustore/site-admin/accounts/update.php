<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../site/css-2/style.css">
    <title>Cập nhật thông tin tài khoản</title>
</head>

<body>
    <?php
    $id = $_GET['id'];
    require '../../connect.php';

    $query = "SELECT * FROM account WHERE id=$id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch();
    ?>

    <form action="../action/update-save-account.php" method="POST">
        <fieldset>
            <legend>Update</legend>
            <div class="form-control">
                <input type="text" name="id" value="<?= $result['id'] ?>" hidden>
            </div>

            <div class=" form-control">
                <label>Tên người dùng</label>
                <input type="text" name="name" value="<?= $result['name'] ?>" hidden>
                <input type="text" value="<?= $result['name'] ?>" disabled>
            </div>

            <div class="form-control">
                <label>Số điện thoại</label>
                <input type="text" name="phone" value="<?= $result['phone'] ?>" require>
            </div>

            <div class="form-control">
                <label>Tên đăng nhập</label>
                <input type="text" name="username" value="<?= $result['username'] ?>" require>
            </div>

            <div class="form-control">
                <label>Mật khẩu</label>
                <input type="text" name="pass" value="<?= $result['password'] ?>" require>
            </div>

            <div class="form-control">
                <label>Vai trò</label>
                <br>
                <?php
                $role = $result['role'];
                if ($role == 1) {
                    $role = "Admin";
                } else {
                    $role = "User";
                }
                // var_dump($role);
                ?>

                <input type="radio" name="role" style="width: 50px;" value="<?= "Admin" ?>" <?php if ($role == "Admin") echo "checked" ?>>Admin
                <input type="radio" name="role" style="width: 50px;" value="<?= "User" ?>" <?php if ($role == "User") echo "checked" ?>>User
            </div>

            <input type="submit" value="Update" class="submit-btn" />
        </fieldset>
    </form>
</body>

</html>