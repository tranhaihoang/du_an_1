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



    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Đăng ký</h4>
                <?php
                    $loiuser = "";
                    $loipass = "";
                    $loiemail = "";
                    $loiconfirmpassword = "";
                    $thanhcong = "";
                    if (isset($_POST['dangky'])) {
                        $user = $_POST['ten'];
                        $email = $_POST['email'];
                        $pass = $_POST['pass'];
                        $cofirmpass = $_POST['pass2'];

                        if (strlen($user) < 8) {
                            $loiuser = "User bạn nhập quá ngắn";
                        }
                        if (preg_match('/\s/', $user)) {
                            $loiuser = "Username không được có khoảng trắng";
                        }
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $loiemail = "Email không đúng định dạng";
                        }
                        if (strlen($pass) < 8) {
                            $loipass = "Password bạn nhập quá ngắn";
                        }
                        if ($cofirmpass != $pass) {
                            $loiconfirmpassword = "Password không trùng khớp";
                        }
                        
                        
                    }
                    ?>
                <form action="index.php?act=dangky" method="post">
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
                                        echo $loiuser;
                                        ?>
                                    </div>

                                </div>


                                <div class="col-lg-12">

                                    <div class="checkout__input">
                                        <p>Email <span>*</span></p>
                                        <input type="email" name="email">
                                        <?php
                                            if (isset($error['email']) && ($error['email'] != ""))
                                            echo  '<span style="color:red;">' . $error['email'] . '</span>';
                                            echo $loiemail;
                                        ?>
                                    </div>

                                </div>

                                <div class="col-lg-12">
                                    <div class="checkout__input">

                                        <p>password tài khoản <span>*</span></p>
                                        <input type="password" name="pass">
                                        <?php
                                            if (isset($error['pass']) && ($error['pass'] != ""))
                                            echo  '<span style="color:red;">' . $error['pass'] . '</span>';
                                            echo $loipass;
                                        ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="checkout__input">

                                        <p>Nhập lại password <span>*</span></p>
                                        <input type="password" name="pass2">
                                        <?php
                                            if (isset($error['pass2']) && ($error['pass2'] != ""))
                                            echo  '<span style="color:red;">' . $error['pass2'] . '</span>';
                                            echo $loiconfirmpassword;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="checkout__input">
                                <input type="submit" value="Đăng Ký" name="dangky"
                                    style="background-color: rgb(15, 166, 32); color: aliceblue;">
                            </div>
                            <?php
                            if (isset($thongbao) && ($thongbao != "")) {
                                echo $thongbao;
                            }
                            ?>
                        </div>


                    </div>
                    <div class="col-lg-12"></div>
                    <div class="checkout__input__checkbox">
                        <label for="acc">Đồng ý các điều khoản?<input type="checkbox" id="acc">
                            <span class="checkmark"></span>
                        </label>
                        <p>Quay lại :<=<a href="index.php">Trang chủ</a></p>
                        <p>Bạn đã có tài khảo?.<a href="index.php?act=dangnhap">Đăng nhập</a></p>
                    </div>
            </div>


        </div>

        </div>

        </form>

        </div>

        </div>

    </section>
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