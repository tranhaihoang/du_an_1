<section class="breadcrumb-section set-bg" data-setbg="img/banner-bai.png" style="background-image: url(&quot;img/banner-bai.png&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Cửa hàng 365</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang chủ</a>
                            <span>Cửa hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Chi tiết thanh toán</h4>
                
                <form action="index.php?act=thanhtoan" method="post">
                    <?php 
                        if(isset($_SESSION['ten'])){
                            $id_kh=$_SESSION['ten']['id_kh'];
                            $ten=$_SESSION['ten']['ten'];
                            $sdt=$_SESSION['ten']['phone'];
                            $email=$_SESSION['ten']['email'];
                            $diachi=$_SESSION['ten']['dia_chi'];
                    ?>
                        <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Họ & Tên<span>*</span></p>
                                        <input type="text" name="ten" placeholder="Nhập họ & tên" value="<?= $ten?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" value="<?= $sdt ?> ">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" value="<?= $email?>">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input type="text" name="dia_chi" value="<?= $diachi?>" placeholder="Nhập địa chỉ" class="checkout__input__add">
                            </div>


                            
                            <div class="checkout__input">
                                <p>Ghi chú<span>*</span></p>
                                <input type="text" name="ghi_chu"
                                    placeholder="Ghi chú về đơn hàng của bạn." > 
                            </div>

                        </div>


                        
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Đơn hàng của bạn</h4>
                                <div class="checkout__order__products">Các sản phẩm<span>Tổng cộng</span></div>
                                <?php 
                                    $sum_total = 0;
                                    foreach($_SESSION['cart'] as $product){
                                        $quantityInCart = 0;
                                        foreach ($_SESSION['cart'] as $item) {
                                            if ($item['id_sp'] == $product['id_sp']) {
                                                $quantityInCart = $item['quantity'];
                                                break;
                                            }
                                        }
                                    
                                ?>
                                    <ul>
                                        <li><?= $product['ten_sp'] ?><span><?= number_format((int)$product['gia_sp'], 0, ",", ".")  ?> <u>đ</u></span></li>
                                    </ul>
                                    <?php
                                // Tính tổng giá đơn hàng
                                $sum_total += ((int)$product['gia_sp'] * (int)$quantityInCart);

                                // Lưu tổng giá trị vào sesion
                                $_SESSION['resultTotal'] = $sum_total;
                            }
                            ?>
                                <div class="checkout__order__subtotal">Tạm tính<span><?= number_format((int)$sum_total, 0, ",", ".")  ?> <u>đ</u></span></div>
                                <div class="checkout__order__total">Tổng cộng<span><?= number_format((int)$sum_total, 0, ",", ".")  ?> <u>đ</u></span></div>
                                <div class="checkout__order__products">Phương thức thanh toán:</div>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Ví Paypal
                                        <input type="checkbox" id="payment" value="1" name="pttt">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Thanh toán khi nhận hàng
                                        <input type="checkbox" id="paypal" value="1" name="pttt">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <input type="hidden" name="id_kh" value="<?=$id_kh?>">
                                <button type="submit" class="site-btn" name="dongydathang">Đặt Hàng</button>
                            </div>
                        </div>
                    </div>
                    <?php } else{
                            $id_kh="";
                            $ten="";
                            $sdt="";
                            $email="";
                            $diachi="";
                        ?>   
                            <p>Mời bạn <a href="index.php?act=dangnhap">Đăng nhập</a> để đặt hàng!</p>
                        <?php }?>
                    
                    
                </form>
            </div>
        </div>
    </section>
    
    <!-- Checkout Section End -->