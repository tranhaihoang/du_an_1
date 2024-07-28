<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>
    <!-- Header Section End -->



    <div class="container">
        <div class="checkout__form">
            <?php
            if (isset($_SESSION['ten'])) {
                extract($_SESSION['ten']);
            ?>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-5">


                            <div class="sidebar">
                                <div class="sidebar__item">
                                    <div class="section-title product__discount__title">
                                        <h2>Tài khoản<p>xin chào:
                                                <?= $ten ?>
                                            </p>
                                        </h2>

                                    </div>
                                    <ul>


                                        <?php if ($vai_tro == 1) { ?>
                                            <div class="selling_products ">
                                                <li><a href="admin/index.php">Đăng nhập trang admin</a></li>
                                            </div>
                                        <?php } ?>




                                        <li>
                                            <div class="selling_products">
                                                <a href="">Chi tiết đơn hàng</a>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="selling_products">
                                                <a href="index.php?act=quenmk">Quên mật khẩu</a>
                                            </div>
                                        </li>


                                        <li>
                                            <div class="selling_products">
                                                <a href="index.php?act=giohang">Giỏ hàng</a>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="selling_products">
                                                <a href="index.php?act=dangxuat">Đăng xuất</a>
                                            </div>
                                        </li>


                                    </ul>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-9 col-md-7">
                            <div class="product__discount">
                                <div class="filter__item">
                                    <div class="section-title product__discount__title">
                                        <h5>Chi tiết đơn hàng !</h5>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } else { ?>
                <h4>Đăng Nhập</h4>
                <form action="index.php?act=dangnhap" method="post">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Tên Đăng Nhập<span>*</span></p>
                                        <input type="text" name="ten">
                                        <?php
                                        if (isset($error['ten']) && ($error['ten'] != ""))
                                            echo  '<span style="color:red;">' . $error['ten'] . '</span>';
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Mật khẩu tài khoản <span>*</span></p>
                                        <input type="password" name="pass">
                                        <?php
                                        if (isset($error['pass']) && ($error['pass'] != ""))
                                            echo  '<span style="color:red;">' . $error['pass'] . '</span>';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="checkout__input">
                                <input type="submit" value="Đăng Nhập" name="dangnhap" style="background-color: rgb(15, 166, 32); color: aliceblue;" />
                            </div>
                        </div>
                    </div>
                    <p><a href="index.php?act=quenmk">Quên mật khẩu </a>.</p>
                    <p>bạn chưa có tài khoản?<a href="index.php?act=dangky">Đăng Ký</a>.</p>

        </div>
        </form>
    <?php } ?>

    </div>


    </div>

    <!-- Js Plugins -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/mixitup.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>



    <!-- Code injected by live-server -->
</body>

</html>