<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../site/css-2/style.css">
    <title>Cập nhật thông tin sản phẩm</title>
</head>

<body>
    <?php
    $id = $_GET['id'];
    require '../../connect.php';

    $query = "SELECT * FROM product WHERE id=$id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch();
    ?>

    <form action="../action/update-save-product.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Update</legend>
            <div class=" form-control">
                <input type="text" name="id" value="<?= $result['id'] ?>" hidden>
            </div>
            <div class=" form-control">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" value="<?= $result['name'] ?>" require>
            </div>

            <div class="form-control">
                <label>Giá sản phẩm</label>
                <input type="number" name="price" min="1" value="<?= $result['price'] ?>" require>
            </div>

            <div class="form-control">
                <label>Ảnh sản phẩm</label>
                <input type="file" name="featured_image">
                <br>
                <img src="../../upload/<?= $result['featured_image'] ?>" alt="" style="width: 250px; height: 250px; margin-left: 50px;">
            </div>

            <input type="submit" value="Update" class="submit-btn" />
        </fieldset>
    </form>
</body>

</html>