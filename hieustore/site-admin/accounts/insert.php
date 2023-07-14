<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../site/css-2/style.css">
    <title>Thêm tài khoản</title>
</head>

<body>

    <form action="../action/insert-save-account.php" method="POST">
        <fieldset>
            <legend>Add</legend>
            <div class=" form-control">
                <label>Tên người dùng</label>
                <input type="text" name="name" placeholder="Nhập tên người dùng" require>
            </div>

            <div class="form-control">
                <label>Số điện thoại</label>
                <input type="text" name="phone" placeholder="Nhập số điện thoại" require>
            </div>

            <div class="form-control">
                <label>Tên đăng nhập</label>
                <input type="text" name="username" placeholder="Tên đăng nhập">
            </div>

            <div class="form-control">
                <label>Mật khẩu</label>
                <input type="text" name="pass" placeholder="Mật khẩu">
            </div>

            <div class="form-control">
                <label>Vai trò</label>
                <br>
                <input type="radio" name="role" value="Admin" style="width: 50px;">Admin
                <input type="radio" name="role" value="User" style="width: 50px;">User
            </div>

            <input type="submit" value="Add" class="submit-btn" />
        </fieldset>
    </form>
</body>

</html>