<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../site/vendor/fontawesome-free-5.11.2-web/css/all.min.css">
    <link rel="stylesheet" href="../../site/vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../site/vendor/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../../site/vendor/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="../../site/vendor/star-rating/css/star-rating.min.css">
    <script src="../../site/vendor/jquery.min.js"></script>
    <script src="../../site/vendor/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../site/vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../../site/vendor/star-rating/js/star-rating.min.js"></script>
    <script src="../../site/vendor/format/number_format.js"></script>
    <script type="text/javascript" src="../../site/js/script.js"></script>
    <link rel="stylesheet" href="../../site/css/style.css">
    <link rel="stylesheet" href="../../site/css-2/style.css">
    <title>Thông tin đơn hàng</title>
</head>

<body>

    <div>
        <?php

        $customer_id = $_GET['customer_id'];
        require '../../connect.php';

        $query = "SELECT * FROM product, order_detail WHERE product.id = order_detail.product_id AND customer_id = $customer_id";
        $total = 0;
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $bill_detail = $stmt->fetchAll();
        ?>
        <fieldset>
            <legend>Bill</legend>
            <?php foreach ($bill_detail as $bill_details) :
            ?>
            <hr>
            <div class="clearfix text-left">
                <div class="row">
                    <div class="col-sm-6 col-md-2">
                        <div><img style="max-width: 100px;" src="../../upload/<?= $bill_details['featured_image'] ?>"
                                alt="">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-5"><a class="product-name"
                            href="javascript:void(0)"><?= $bill_details['name'] ?></a></div>
                    <div class="col-sm-6 col-md-3"><span
                            class="product-item-discount"><?= number_format($bill_details['price'], 0, ",", ".") ?>₫</span>
                    </div>
                </div>
            </div>
            <?php
                $total += $bill_details['price'];
            endforeach
            ?>

            <div class="modal-footer">
                <div class="clearfix">
                    <div class="col-xs-12 text-right">
                        <p>
                            <span>Tổng tiền</span>
                            <span class="price-total"><?= number_format($total, 0, ",", ".") ?>₫</span>
                        </p>
                    </div>
                </div>
            </div>
            <input type="submit" value="OK" class="btn-ok" />
        </fieldset>
    </div>
</body>

</html>