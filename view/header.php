<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->


    <!-- Humberger Begin -->

    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>sđt:P0338629005</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">

                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>Tiếng Anh</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Việt nam</a></li>
                                    <li><a href="#">Tiếng Anh</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <nav class="header__top__right__language">
                                    
                                        <?php
                                            if (isset($_SESSION['ten'])){
                                                echo'<div><a href="index.php?act=dangxuat"><i class="fa fa-user"></i> Đăng Xuất</a></div>';
                                            }
                                            else{
                                                echo '
                                                <div><i class="fa fa-user"></i>Tài khoản</div>
                                                    <ul>

                                                        <li><a href="index.php?act=dangnhap">Đăng nhập</a></li>
                                                        <li><a href="index.php?act=dangky">Đăng ký</a></li>
                                                    </ul>
                                                ';
                                            }
                                        ?>
                                        
                                    
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="index.php"><img src="img/logo.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="./index.php">Trang chủ</a></li>
                            <li><a href="index.php?act=sanpham">Cửa hàng</a></li>
                            
                            <li class="active"><a href="index.php?act=tintuc">Blog</a></li>
                            <li><a href="index.php?act=lienhe">Liên hệ</a></li>
                            <li><a href="index.php?act=taikhoan">Tài khoản</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="index.php?act=giohang"><i class="fa fa-shopping-bag"></i><span id="totalproduct"><?=!empty($_SESSION['cart']) ? count($_SESSION['cart']) : 0?></span></a></li>
                            <li><a href="index.php?act=giohang">Giỏ hàng</a></li>
   
                        </ul>

                    </div>
                </div>
            </div>
            <div class=" humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
  