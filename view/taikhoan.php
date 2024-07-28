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
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="product__item">

                                                <table class="col-lg-12" border="1px" style="text-align: center;">
                                                    <tr>
                                                        <th>Mã đơn hàng</th>
                                                        <th>Tên người nhận</th>
                                                        <th>Địa chỉ</th>
                                                        <th>Ngày đặt</th>
                                                        <th>Trạng thái</th>
                                                        <th>tổng Thanh toán</th>
                                                        <th>Ghi chú</th>
                                                    </tr>
                                                    <tbody id="order">
                                                        <?php

                                                        if ($_SESSION['ten']['id_kh']) {
                                                            // extract($_SESSION['cart']);
                                                            foreach ($loadbill as $bill) {
                                                                // var_dump($loadbill);
                                                                extract($bill);

                                                        ?>
                                                                <tr>
                                                                    <td><?= $id_dh ?></td>
                                                                    <td><?= $ho_ten ?></td>
                                                                    <td><?= $dia_chi ?></td>
                                                                    <td><?= $ngay_dat ?></td>
                                                                    <td><?php
                                                                        if ($trangthai == 0) {
                                                                            echo 'Đang xác nhận';
                                                                        } else if ($trangthai == 1) {
                                                                            echo 'Đã xác nhận';
                                                                        } else {
                                                                            echo 'Đã hoàn thành';
                                                                        }

                                                                        ?></td>
                                                                    <td><?= number_format((int)$tong_dh, 0, ",", ".") ?><u>.đ</u></td>

                                                                    <td><?= $ghi_chu ?></td>
                                                                </tr>
                                                        <?php
                                                            }
                                                            // echo '<pre>';
                                                            // var_dump($loadbill);
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } else { ?>
                <h4>Đăng Nhập</h4>

                <p><a href="index.php?act=dangnhap">Đăng nhập </a>để xem !</p>
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