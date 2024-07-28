<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span> Danh mục</span>
                    </div>
                    
                    <ul>
                        <?php
                        $i = 0;
                        foreach ($dsdm as $dm) {
                            extract($dm);
                            $hinh = $img_path . $anh_dm;
                            $linkdm="index.php?act=sanpham&id_dm=".$id_dm;
                            echo '                                    
                                        <li>                               
                                            <a href="'.$linkdm.'"><img src="' . $hinh . '" alt="anh">' . $name_dm . '</a>
                                        </li>        
                                ';
                            $i += 1;
                        }
                        ?>
                    </ul>
                    <!-- <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span> Danh mục</span>
                        </div>
                        <ul>
                            <li>                               
                                <a href="#"><img src="./img/cart/cart-1.jpg" alt="anh">Fresh Meat</a>
                            </li>
                            <li><a href="#"><img src="./img/cart/cart-1.jpg" alt="anh">Vegetables</a></li>
                            <li><a href="#"><img src="./img/cart/cart-2.jpg" alt="anh">Fruit &amp; Nut Gifts</a></li>
                            <li><a href="#"><img src="./img/cart/cart-1.jpg" alt="anh">Fresh Berries</a></li>
                            <li><a href="#"><img src="./img/cart/cart-3.jpg" alt="anh">Ocean Foods</a></li>
                            <li><a href="#"><img src="./img/cart/cart-1.jpg" alt="anh">Butter &amp; Eggs</a></li>
                            <li><a href="#"><img src="./img/cart/cart-2.jpg" alt="anh">Fastfood</a></li>
                            <li><a href="#"><img src="./img/cart/cart-3.jpg" alt="anh">Fresh Onion</a></li>
                            <li><a href="#"><img src="./img/cart/cart-1.jpg" alt="anh">Papayaya &amp; Crisps</a></li>
                        </ul> -->
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="index.php?act=sanpham" method="post">
                            <input type="text" name="keyw" placeholder="Tim món?" >
                            <button type="submit" name="timkiem" class="site-btn">Tìm kiếm</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <img src="img/banner.jpg" alt="" class="col-lg-12" style="height: 500px;">
</section>
<section class="product spad">
    <div class="container">
        <div class="row">
            <?php
            include "boxleft.php";
            ?>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel owl-loaded owl-drag">
                            <div class="owl-stage-outer">
                                <div class="owl-stage">
                                    <?php
                                    foreach ($spsale as $sale) {
                                            extract($sale);
                                        $hinh = $img_path . $sale['img_sp'];
                                        $linksp = "index.php?act=sanphamct&id_sp=" . $sale['id_sp'];
                                        
                                    ?>
                                        <div class="owl-item cloned" style="width: 210px;">
                                            <div class="col-lg-4">
                                                <div class="product__discount__item">
                                                    <div class="product__discount__item__pic set-bg">
                                                        <img src="<?php echo $hinh?>" alt="">
                                                        <div class="product__discount__percent">Sale% </div>
                                                        <ul class="product__item__pic__hover">
                                                            <a href="#" class="blog__btn" data-id="<?= $id_sp ?>"
                                                            onclick="addtocart(<?= $id_sp ?>,'<?= $ten_sp ?>',<?= $gia_sp?>)">Thêm giỏ hàng<span></span></a>
                                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="product__discount__item__text">
                                                        <span>Bánh kẹo tiện lợi</span>
                                                        <h5><a href="<?= $linksp?>"><?php echo $ten_sp?></a></h5>
                                                        <div class="product__item__price">$<?php echo number_format($gia_sp)?><u>.đ</u><span>$<?php echo number_format($gia_sale)?><u>.đ</u></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="filter__item">
                    <div class="section-title product__discount__title">
                        <h2>Sản Phẩm mới</h2>
                    </div>
                    <div class="row">

                        <?php
                        $i = 0;
                        foreach ($spnew as $sp):
                            extract($sp);
                            $hinh = $img_path . $img_sp;
                            $linksp = "index.php?act=sanphamct&id_sp=" . $id_sp;

                            if (($i == 2) || ($i == 5) || ($i == 8)) {
                                $mr = "";
                            } else {
                                $mr = "set";
                            }
                            ?>
                            
                            <div class="col-lg-4 col-md-6 col-sm-3">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg">
                                        <img src="<?php echo $hinh?>" alt="">
                                        <ul class="product__item__pic__hover">
                                            <a href="#" class="blog__btn" data-id="<?= $id_sp ?>"
                                                onclick="addtocart(<?= $id_sp ?>,'<?= $ten_sp ?>',<?= $gia_sp?>)">Thêm Giỏ Hàng
                                                <span></span></a>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="<?= $linksp?>">
                                                <h4><?php echo $ten_sp?></h4>
                                            </a></h6>
                                        <div class="mua">
                                            <h6>$<?php echo number_format($gia_sp)?><u>.đ</u></h6>
                                            <input type="submit"  data-id="<?= $id_sp ?>"
                                                onclick="addtocart(<?= $id_sp ?>,'<?= $ten_sp ?>',<?= $gia_sp?>)" value="Thêm giỏ hàng">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $i += 1;
                        endforeach;
                        ?>

                    </div>

                </div>

            </div>


        </div>
    </div>

</section>
<section class="breadcrumb-section set-bg" data-setbg="img/banner-bai.png"
    style="background-image: url(&quot;img/banner-bai.png&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Cửa hàng OGANI</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ</a>
                        <span>Cửa hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    let totalproduct=document.getElementById('totalproduct');
    function addtocart(productid_sp,productten_sp,productgia_sp) {
            // console.log(productid_sp,productten_sp,productgia_sp);
        $.ajax({
            type: 'POST',
            url: "./view/addtocart.php",
            data:{
                id_sp: productid_sp,
                ten_sp: productten_sp,
                gia_sp: productgia_sp
            },
            success: function(response){
                totalproduct.innerText=response;
                alert('bạn đã thêm vào giỏ hàng thành công');
            },
            error:function(error){
                console.log(error);
            }
        });    
    }
</script>