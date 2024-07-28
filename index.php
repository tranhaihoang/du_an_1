<?php
session_start();
include "model/pdo.php";
include "model/taikhoan.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/donhang.php";
include "model/binhluan.php";


ob_start();
include "view/header.php";
include "global.php";
$spnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$spsale = loadall_sanpham_sale();
$yeuthich = loadall_sanpham_top10();
// $dstop10 = loadall_sanpham_top10();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
   $act = $_GET['act'];
   switch ($act) {
      case 'sanpham':
         if ((isset($_POST['keyw']) && ($_POST['keyw'] != ""))) {
            $keyw = $_POST['keyw'];
         } else {
            $keyw = "";
         }
         if (isset($_GET['id_dm']) && ($_GET['id_dm'] > 0)) {
            $id_dm = $_GET['id_dm'];
         } else {
            $id_dm = 0;
         }
         $listsanpham = loadall_sanpham($keyw, $id_dm);
         $tendm = load_ten_dm($id_dm);

         include "view/sanpham.php";
         break;

      case 'sanphamct':
         if (isset($_POST['gui'])) {
            $id_kh = $_POST['id_kh'];
            $noidung = $_POST['noidung'];
            $id_sp = $_POST['id_sp'];
            $date = date('h:i:sa d/m/Y');
            // echo $id_kh ,
            // $noidung ,
            // $id_sp ,
            // $date ;
            insert_binhluan($id_kh, $noidung, $id_sp, $date);
         }

         if (isset($_GET['id_sp']) && $_GET['id_sp'] > 0) {
            $id_sp = $_GET['id_sp'];
            $sanpham = loadone_sanpham($id_sp);
            extract($sanpham);
            $sanphamcl = load_sanpham_cungloai($id_sp, $id_dm);
            $binhluan = loadall_binhluanid($id_sp);
            // $binhluan = loadall_binhluan($_GET['idsp']);
            include "view/chitietsanpham.php";
         } else {
            include "view/home.php";
         }
         break;
      case 'dangnhap':

         if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
            $error = [];
            if (empty($_POST['ten'])) {
               $error['ten'] = "chưa nhập thông tin";
            } else {
               $ten1 = $_POST['ten'];
            }
            if (empty($_POST['pass'])) {
               $error['pass'] = "chưa nhập thông tin";
            } else {
               $pass2 = $_POST['pass'];
            }
            if (empty($error)) {
               $loginMess = dangnhap($ten1, $pass2);
               if (is_array($loginMess)) {
                  $_SESSION['ten'] = $loginMess;
                  header('location: index.php');
               } else {
                  echo '<script>alert("tài khoản không tồn tài")</script>';
               }

               if (isset($_SESSION['ten'])) {
                  ob_clean();
                  include "view/header.php";
               }
            }
         }
         
         include "view/login/dangnhap.php";


         break;

      case 'dangky':
         if (isset($_POST['dangky']) && ($_POST['dangky'])) {
            $error = [];
            if (empty($_POST['ten'])) {
               $error['ten'] = "chưa nhập thông tin";
            }
            if (empty($_POST['email'])) {
               $error['email'] = "chưa nhập thông tin";
            }
            if (empty($_POST['pass'])) {
               $error['pass'] = "chưa nhập thông tin";
            }
            if (empty($_POST['pass2'])) {
               $error['pass2'] = "chưa nhập thông tin";
            }

            if (empty($error)) {

               $email = $_POST['email'];
               $ten = $_POST['ten'];
               $pass = $_POST['pass'];
               insert_user($email, $ten, $pass,);
               header('location: index.php?act=dangnhap');
            }
         }

         include "view/login/dangky.php";
         break;

      case "dangxuat":
         dangxuat();
         include "view/home.php";
         break;

      case 'lienhe':
         include "view/lienhe.php";
         break;

      case 'taikhoan':
         if (isset($_SESSION['ten'])) {
            $id = $_SESSION['ten']['id_kh'];
            $loadbill = loadall_bill($id);
            include "view/taikhoan.php";
         }else{
         include "view/taikhoan.php";
         
         }
         break;

      case 'tintuc':
         include "view/blog.php";
         break;

      case 'quenmk':
         include "view/login/quenmk.php";
         break;


      case 'giohang':
         if (!empty($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            // Tạo mảng chứa ID các sản phẩm trong giỏ hàng
            $productid_sp = array_column($cart, 'id_sp');

            // Chuyển đôi mảng id thành một cuỗi để thực hiện truy vấn
            $idlist = implode(',', $productid_sp);

            // Lấy sản phẩm trong bảng sản phẩm theo id
            $dataDb = loadone_sanphamCart($idlist);
            //  var_dump($dataDb );

         }
         // if (isset($cart)) {
         //    // var_dump($sum_total);
         //    ob_clean();
         //    include "view/giohang.php";
         // }

         include "view/giohang.php";
         break;

      case 'thanhtoan':
         if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            // print_r($cart);
            if (isset($_POST['dongydathang'])) {
               $id_kh = $_POST['id_kh'];
               $name = $_POST['ten'];
               $phone = $_POST['phone'];
               $email = $_POST['email'];
               $diachi = $_POST['dia_chi'];
               $ghi_chu = $_POST['ghi_chu'];
               // date_default_timezone_set('Asia/Ho_Chi_Minh');
               $ngay_dat = date('Y-m-d H:i:s');
               if (isset($_SESSION['ten'])) {
                  $id_ten = $_SESSION['ten']['id_dh'];
               } else {
                  $id_ten = 0;
               }
               $idBill = insert_bill($id_kh, $name, $email, $diachi, $phone, $ngay_dat, $_SESSION['resultTotal'], $ghi_chu, $pttt);
               foreach ($cart as $item) {
                  insert_ct_bill($idBill, $item['id_sp'], $item['gia_sp'], $item['quantity'], $item['gia_sp'] * $item['quantity']);
               }
               unset($_SESSION['cart']);
               $_SESSION['success'] = $idBill;
               header("Location: index.php?act=success");
            }
            include "view/thanhtoan.php";
         } else {
            header("Location: index.php?act=giohang");
         }
         break;
      case 'success':

         if (isset($_SESSION['success'])) {
            include 'view/success.php';
         } else {
            header("Location: index.php");
         }
         include "view/success.php";
         break;

         // case 'binhluan':
         //    if(isset($_POST['gui'])&&($_POST['gui'])){
         //       $id_tk=$_SESSION['ten']['id_tk'];
         //       $noidung=$_POST['noidung'];
         //       $idpro=$_POST['idpro'];
         //       $date=date('h:i:sa d/m/Y');
         //       insert_binhluan($id_tk,$noidung,$id_sp,$date);
         //       header("location: ".$_SERVER['HTTP_REFERER']);
         //   }
         //    include "view/binhluan/binhluan.php";
         // break;


         // $id_kh=$_GET['id'];
         //    $loadbill= loadall_bill($id_kh);



   }
} else {
   include "view/home.php";
}

include "view/footer.php";
