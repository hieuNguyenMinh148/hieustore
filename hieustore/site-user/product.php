<div class="product-container">
    <div class="image">
        <img class="img-responsive" src="../upload/<?= $products['featured_image'] ?>" alt="">
    </div>
    <div class="product-meta">
        <h5 class="name">
            <a class="product-name" href="" title=""><?= $products['name'] ?></a>
        </h5>
        <div>
            <div class="product-item-price">
                <span class="product-item-red"><?= number_format($products['price'], 0, ",", ".") ?>₫</span>
            </div>
        </div>
    </div>
    <div class="button-product-action clearfix">
        <div class="cart icon">
            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 0)) { ?>
            <a class="btn btn-outline-inverse buy" product-id="" href="site-user/cart.php?id=<?= $products['id']; ?>"
                title="Thêm vào giỏ">
                Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
            </a>
            <?php } ?>
        </div>
        <div class="quickview icon">
            <a class="btn btn-outline-inverse" href="detail.php?id=<?= $products['id']?>" title="Xem nhanh">
                Xem chi tiết <i class="fa fa-eye"></i>
            </a>
        </div>
    </div>
</div>