<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../site/css-2/style.css">
    <title>Thêm sản phẩm</title>
</head>

<body>

    <form action="../action/insert-save-product.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Add</legend>
            <div class=" form-control">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" placeholder="Nhập tên sản phẩm" require>
            </div>

            <div class="form-control">
                <label>Giá sản phẩm</label>
                <input type="number" name="price" min="1000" placeholder="Nhập giá sản phẩm" require>
            </div>

            <div class="form-control">
                <label>Ảnh sản phẩm</label>
                <input type="file" name="featured_image">
            </div>

            <input type="submit" value="Add" class="submit-btn" />
        </fieldset>
    </form>
</body>

</html>