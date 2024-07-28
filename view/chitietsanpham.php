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


<section class="product-details spad">
    <div class="container">
        <?php extract($sanpham)

        ?>
        <?php $hinh = $img_path . $img_sp; ?>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="<?= $hinh ?>" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <img data-imgbigurl="img/product/details/product-details-2.jpg" src="<?= $hinh ?>" alt="">
                        <img data-imgbigurl="img/product/details/product-details-3.jpg" src="<?= $hinh ?>" alt="">
                        <img data-imgbigurl="img/product/details/product-details-5.jpg" src="<?= $hinh ?>" alt="">
                        <img data-imgbigurl="img/product/details/product-details-4.jpg" src="<?= $hinh ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3><?= $ten_sp ?></h3>
                    <p><?= $mota_sp ?>.</p>
                    <div class="product__details__price">
                        <h5>Giá :</h5><s><?php echo number_format($gia_sale) ?></s><u>.đ</u>
                    </div>
                    <div class="product__details__price">
                        <h5>Giá sale :</h5>$ <?php echo number_format($gia_sp) ?><u>.đ</u>
                    </div>
                    <a href="#" class="primary-btn" data-id="<?= $id_sp ?>" onclick="addtocart(<?= $id_sp ?>,'<?= $ten_sp ?>',<?= $gia_sp ?>)">Thêm vào giỏ hàng</a>
                    <a href="#" class="heart-icon" name="like"><span class="icon_heart_alt"></span></a>
                    <ul>
                        <li><b>Trạng Thái :</b> <span>Còn hàng</span></li>
                        <li><b>Kích thước :</b>

                            <div class="sidebar__item__size">
                                <label for="large">
                                    XL
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    L
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    M
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    S
                                    <input type="radio" id="tiny">
                                </label>
                            </div>







                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Mô tả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Bình Luận<span>(<?= $tong = count($binhluan) ?>)</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Mô tả chi tiết</h6>
                                <p><?= $mota_ct?></p>
                            </div>
                        </div>

                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="review-content-header">
                                <h3>Phần bình luận</h3>
                                <div class="review-info">
                                    <span class="review-caption">Hãy cho chúng tôi xin đánh giá về sản phẩm bên chúng tôi</span>
                                    <span class="review-write-btn">Viết Bình Luận</span>
                                </div>
                            </div>

                            <?php
                            if (isset($_SESSION['ten'])) {
                                extract($_SESSION['ten']);
                            ?>
                                <div class='reviews-form-area'>
                                    <div class='reviews-form-content'>

                                        <form action="index.php?act=sanphamct&id_sp=<?= $id_sp?>" method="post">
                                            <div class='row'>
                                                <div class='col-md-12' >
                                                    <div class='form-group'>
                                                        <input type='hidden' name='id_kh' value="<?= $id_kh ?>">
                                                        <input type='hidden' name='id_sp' value="<?= $id_sp ?>">
                                                        <textarea id='for_comment' name='noidung' class='form-control' placeholder='Bình luận sản phẩm....'></textarea>
                                                        <input type="submit" name='gui' value='Bình Luận'>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    

                                        
                                                <table>
                                                    <?php foreach ($binhluan as $value):  ?>
                                                        <div class="row">
                                                            <div class="col-md-12 ten">
                                                                <img src="img/anh1.jpg" alt="" style="border-radius: 50%; width: 30px; height: 30px; object-fit: cover;border: 1px rgb(181, 171, 171) solid;">
                                                                <h4><?php echo $value['ten'] ?></h4>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <p> Đã bình luận vào ngày:<?php echo ($value['ngay_bl']) ?></p>
                                                            </div>
                                                            <div class="col-md-12 noidung">
                                                                <p><?php echo $value['noi_dung'] ?></td></p>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </table>
                                          
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class='reviews-form-area'>
                                    <div class='reviews-form-content'>
                                        
                                                <table>
                                                    <?php foreach ($binhluan as $value):  ?>
                                                        <div class="row">
                                                            <div class="col-md-12 ten">
                                                                <img src="img/anh1.jpg" alt="" style="border-radius: 50%; width: 30px; height: 30px; object-fit: cover;border: 1px rgb(181, 171, 171) solid;">
                                                                <h4><?php echo $value['ten'] ?></h4>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <p> Đã bình luận vào ngày:<?php echo ($value['ngay_bl']) ?></p>
                                                            </div>
                                                            <div class="col-md-12 noidung">
                                                                <p><?php echo $value['noi_dung'] ?></td></p>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </table>
                                          
                                    </div>
                                </div>
                                <div class='reviews-form-area'>
                                    <h4 class='title'>Bạn Hãy Vui Lòng <a href='index.php?act=dangnhap'>Đăng Nhập</a> Để Bình Luận </h4>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Sản Phẩm Liên Quan</h2>
                </div>
            </div>
        </div>


        <div class="row">


            <?php
            $i = 0;
            foreach ($sanphamcl as $spcl) {
                extract($spcl);
                $hinh = $img_path . $img_sp;
                $linksp = "index.php?act=sanphamct&id_sp=" . $id_sp;
                if ($i == 2) {
                    $mr = "";
                } else {
                    $mr = "set-bg";
                }

            ?>
                <div class="col-lg-4 col-md-6 col-sm-3">
                    <div class="product__item">
                        <div class="product__item__pic set-bg">
                            <img src="<?= $hinh ?>" alt="">
                            <ul class="product__item__pic__hover">
                                <a href="#" class="blog__btn" data-id="<?= $id_sp ?>" onclick="addtocart(<?= $id_sp ?>,'<?= $ten_sp ?>',<?= $gia_sp ?>)">Thêm Giỏ Hàng
                                    <span></span></a>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="<?= $linksp ?>">
                                    <h4><?php echo $ten_sp ?></h4>
                                </a></h6>
                            <div class="mua">
                                <h6>$<?php echo number_format($gia_sp) ?><u>.đ</u></h6>
                                <input type="submit" value="Mua ngay">
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>


        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    let totalproduct = document.getElementById('totalproduct');

    function addtocart(productid_sp, productten_sp, productgia_sp) {
        // console.log(productid_sp,productten_sp,productgia_sp);
        $.ajax({
            type: 'POST',
            url: "./view/addtocart.php",
            data: {
                id_sp: productid_sp,
                ten_sp: productten_sp,
                gia_sp: productgia_sp
            },
            success: function(response) {
                totalproduct.innerText = response;
                alert('bạn đã thêm vào giỏ hàng thành công');
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>