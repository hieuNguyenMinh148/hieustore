<!-- BACK TO TOP -->
<div class="back-to-top" class="bg-color">▲</div>
<!-- END BACK TO TOP -->
<!-- REGISTER DIALOG -->

<div class="modal fade" id="modal-register" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-color">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title text-center">Đăng ký</h3>
            </div>
            <form action="site-admin/data-account/register-data.php" method="POST" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="fullname" placeholder="Name" required oninvalid="this.setCustomValidity('Vui lòng nhập tên của bạn')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" name="phone" placeholder="Phone Number" required pattern="[0][0-9]{9,}" oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại bắt đầu bằng số 0 và ít nhất 9 con số theo sau')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="user" placeholder="Username" required oninvalid="this.setCustomValidity('Vui lòng nhập email')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$" oninvalid="this.setCustomValidity('Vui lòng nhập ít nhất 8 ký tự: số, chữ hoa, chữ thường')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="re-password" placeholder="Re-Password" required autocomplete="off" autosave="off" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$" oninvalid="this.setCustomValidity('Vui lòng nhập ít nhất 8 ký tự: số, chữ hoa, chữ thường')" oninput="this.setCustomValidity('')">
                    </div>
                    <input type="hidden" name="reference" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END REGISTER DIALOG -->
<!-- LOGIN DIALOG -->
<div class="modal fade" id="modal-login" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-color">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title text-center">Đăng nhập</h3>
            </div>
            <form action="site-admin/data-account/login-data.php" method="POST" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="user" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <input type="hidden" name="reference" value="">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="log-submit" class="btn btn-primary">Submit</button><br>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END LOGIN DIALOG -->

<!-- CART DIALOG -->
<div class="modal fade" id="modal-cart-detail" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-color">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title text-center">Giỏ hàng</h3>
            </div>
            <div class="modal-body">
                <div class="page-content">
                    <div class="clearfix hidden-sm hidden-xs">
                        <div class="col-xs-2">
                        </div>
                        <div class="col-xs-5">
                            <div class="header">
                                Sản phẩm
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <div class="header">
                                Đơn giá
                            </div>
                        </div>
                        <div class="label_item col-xs-1">

                        </div>
                        <div class="lcol-xs-1">
                        </div>
                    </div>

                    <div class="cart-product">
                        <?php
                        $custumer_id = $_SESSION['id'];
                        $query = "SELECT * FROM product, order_detail WHERE product.id = order_detail.product_id AND customer_id = $custumer_id";
                        // var_dump($order);
                        $total = 0;
                        if (isset($_SESSION['role']) && ($_SESSION['role'] == 0)) {
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $order = $stmt->fetchAll();
                            foreach ($order as $order_detail) :
                        ?>
                                <hr>
                                <div class="clearfix text-left">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-2">
                                            <div><img class="img-responsive" src="upload/<?= $order_detail['featured_image'] ?>" alt=""></div>
                                        </div>
                                        <div class="col-sm-6 col-md-5"><a class="product-name" href="javascript:void(0)"><?= $order_detail['name'] ?></a></div>
                                        <div class="col-sm-6 col-md-3"><span class="product-item-discount"><?= number_format($order_detail['price'], 0, ",", ".") ?>₫</span>
                                        </div>

                                        <div class="col-sm-6 col-md-1"><a class="remove-product" href="site-user/delete-product.php?id=<?= $order_detail['id'] ?>"><span class="glyphicon glyphicon-trash"></span></a></div>
                                    </div>
                                </div>
                                <hr>
                            <?php
                                $total += $order_detail['price'];
                            endforeach
                            ?>
                    </div>
                <?php } ?>
                </div>
            </div>
            <div class="modal-footer">
                <div class="clearfix">
                    <div class="col-xs-12 text-right">
                        <p>
                            <span>Tổng tiền</span>
                            <span class="price-total"><?= number_format($total, 0, ",", ".") ?>₫</span>
                        </p>
                        <input type="button" name="checkout" class="btn btn-primary" value="Đặt hàng">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END CART DIALOG -->