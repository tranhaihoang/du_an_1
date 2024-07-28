<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/thongke.php";
include "../model/donhang.php";
include "../model/binhluan.php";

include "home.php";
include "header.php";
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "tongquan":
            include "tongquan.php";
            break;
        case "listsp":
            if (isset($_POST['timkiem']) && ($_POST['timkiem'])) {
                $keyw = $_POST['keyw'];
                $id_dm = $_POST['id_dm'];
            } else {
                $keyw = "";
                $id_dm = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($keyw, $id_dm);
            include "sanpham/list.php";
            break;
        case "addsp":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $error = [];
                if (empty($_POST['id_dm'])) {
                    $error['id_dm'] = "chưa nhập thông tin";
                } else {
                    $id_dm = $_POST['id_dm'];
                }
                if (empty($_POST['gia_sp'])) {
                    $error['gia_sp'] = "chưa nhập thông tin";
                } else {
                    $gia_sp = $_POST['gia_sp'];
                }
                if (empty($_POST['ten_sp'])) {
                    $error['ten_sp'] = "chưa nhập thông tin";
                } else {
                    $ten_sp = $_POST['ten_sp'];
                }

                if (empty($_POST['soluong'])) {
                    $error['soluong'] = "chưa nhập thông tin";
                } else {
                    $soluong = $_POST['soluong'];
                }
                if (empty($_POST['gia_sale'])) {
                    $error['gia_sale'] = "chưa nhập thông tin";
                } else {
                    $gia_sale = $_POST['gia_sale'];
                }

                if (empty($_POST['trangthai'])) {
                    $error['trangthai'] = "chưa nhập thông tin";
                } else {
                    $trangthai = $_POST['trangthai'];
                }
                if (empty($_FILES['hinh']['name'])) {
                    $error['hinh'] = "chưa nhập thông tin";
                } else {
                    $img_sp = $_POST['hinh'];
                }

                if (empty($_POST['mota_sp'])) {
                    $error['mota_sp'] = "chưa nhập thông tin";
                } else {
                    $mota_sp = $_POST['mota_sp'];
                }
                if (empty($_POST['mota_ct'])) {
                    $error['mota_ct'] = "chưa nhập thông tin";
                } else {
                    $mota_ct = $_POST['mota_ct'];
                }

                // $hinh_mota = $_FILES['hinh_mota']['name'];

                //                    echo $hinh;
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                //                    echo $target_file;
                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                    //                        echo "Bạn đã upload ảnh thành công";
                } else {
                    //                        echo "Upload ảnh không thành công";
                }
                //              echo $iddm;
                if (empty($error)) {
                    insert_sanpham($ten_sp, $gia_sp, $gia_sale, $img_sp, $mota_sp, $mota_ct, $trangthai, $soluong, $id_dm);
                    $thanhcong = "Thêm thành công";
                }
            }

            $listdanhmuc = loadall_danhmuc();
            include "sanpham/addsp.php";

            break;

        case "suasp":
            if (isset($_GET['id_sp']) && ($_GET['id_sp'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id_sp']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/update.php";
            break;
        case "updatesp":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id_dm = $_POST['id_dm'];
                $id_sp = $_POST['id_sp'];
                $gia_sp = $_POST['gia_sp'];
                $ten_sp = $_POST['ten_sp'];
                $soluong = $_POST['soluong'];
                $gia_sale = $_POST['gia_sale'];
                $trangthai = $_POST['trangthai'];
                $img_sp = $_FILES['hinh']['name'];
                // $hinh_mota = $_FILES['hinh_mota']['name'];
                $mota_sp = $_POST['mota_sp'];
                $mota_ct = $_POST['mota_ct'];

                //                    echo $hinh;
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                //                    echo $target_file;
                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                    //                        echo "Bạn đã upload ảnh thành công";
                } else {
                    //                        echo "Upload ảnh không thành công";
                }
                update_sanpham($id_sp, $ten_sp, $gia_sp, $gia_sale, $img_sp, $mota_sp, $mota_ct, $trangthai, $soluong, $id_dm);
                $thongbao = "cập nhật thành công!";
            }
            $listsanpham = loadall_sanpham($keyw, $id_dm);
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/list.php";
            break;

        case "xoasp":
            if (isset($_GET['id_sp'])) {
                soft_delete($_GET['id_sp']);
            }
            $listsanpham = loadall_sanpham($keyw, $id_dm);
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/list.php";
            break;
        case "listdm":
            if (isset($_POST['timkiem']) && ($_POST['timkiem'])) {
                $keyw = $_POST['keyw'];
                $id_dm = $_POST['id_dm'];
            } else {
                $keyw = "";
                $id_dm = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($keyw, $id_dm);
            include "danhmuc/list.php";
            break;

        case "adddm":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                if (empty($_POST['id_dm'])) {
                    $error['id_dm'] = "chưa nhập thông tin";
                }
                if (empty($_POST['ten_dm'])) {
                    $error['ten_dm'] = "chưa nhập thông tin";
                }
                if (empty($_POST['hinh'])) {
                    $error['hinh'] = "chưa nhập thông tin";
                }

                if (empty($error)){
                    $id_dm = $_POST['id_dm'];
                    $ten_dm = $_POST['ten_dm'];
                    $anh_dm = $_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES['hinh']['name']);
                    //                    echo $target_file;
                    if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                        //                        echo "Bạn đã upload ảnh thành công";
                    } else {
                        //                        echo "Upload ảnh không thành công";
                    }
                    //                    echo $iddm;
                    $sql = "INSERT INTO danhmuc(name_dm,id_dm,anh_dm) value('$ten_dm','$id_dm','$anh_dm')";
                    pdo_execute($sql);
                    $thongbao = "thêm thành công";
                }
            }
            include "danhmuc/adddm.php";
            break;
        case "suadm":
            if (isset($_GET['id_dm']) && ($_GET['id_dm'] > 0)) {
                $danhmuc = loadone_danhmuc($_GET['id_dm']);
            }
            include "danhmuc/update.php";
            break;
        case "updatedm":
            if (isset($_POST["capnhat"]) && isset($_POST["capnhat"])) {

                $ten_dm = $_POST['ten_dm'];
                $id_dm = $_POST['id_dm'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                //                    echo $target_file;
                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                    //                        echo "Bạn đã upload ảnh thành công";
                } else {
                    //                        echo "Upload ảnh không thành công";
                }
                update_danhmuc($id_dm, $ten_dm, $hinh);

                $thongbao = "thêm thành công";
            }
            $sql = "SELECT * FROM danhmuc order by name_dm";
            $listdanhmuc = pdo_query($sql);
            include "danhmuc/list.php";
            break;
        case "xoadm":
            if (isset($_GET['id_dm'])) {
                delete_dm($_GET['id_dm']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case "taikhoan":
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case "addtk":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $error = [];
                if (empty($_POST['id_tk'])) {
                    $error['id_tk'] = "chưa nhập thông tin";
                }
                if (empty($_POST['ten_tk'])) {
                    $error['ten_tk'] = "chưa nhập thông tin";
                }
                if (empty($_POST['pass_tk'])) {
                    $error['pass_tk'] = "chưa nhập thông tin";
                } 
                if (empty($_POST['sdt'])) {
                    $error['sdt'] = "chưa nhập thông tin";
                }
                if (empty($_POST['vaitro'])) {
                    $error['vaitro'] = "chưa nhập thông tin";
                }
                if (empty($_POST['email'])) {
                    $error['email'] = "chưa nhập thông tin";
                }
                if (empty($_POST['diachi'])) {
                    $error['diachi'] = "chưa nhập thông tin";
                } 
                if (empty($error)){
                    $id_kh = $_POST['id_tk'];
                    $ten = $_POST['ten_tk'];
                    $pass = $_POST['pass_tk'];
                    $phone = $_POST['sdt'];
                    $vai_tro = $_POST['vaitro'];
                    $email = $_POST['email'];
                    $dia_chi = $_POST['diachi'];
                    insert_taikhoan($id_kh, $ten, $pass, $phone, $vai_tro, $email, $dia_chi);
                    $thongbao = "cập nhật thành công!";
                }
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/add.php";
            break;
        case "suatk":
            if (isset($_GET['id_kh']) && ($_GET['id_kh'] > 0)) {
                $taikhoan = loadone_taikhoan($_GET['id_kh']);
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/update.php";
            break;

        case "updatetk":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id_kh = $_POST['id_tk'];
                $ten = $_POST['ten_tk'];
                $pass = $_POST['pass_tk'];
                $phone = $_POST['sdt'];
                $vai_tro = $_POST['vaitro'];
                $email = $_POST['email'];
                update_taikhoan($id_kh, $ten, $email, $pass, $vai_tro, $phone);
                $thongbao = "cập nhật thành công!";
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case "xoatk":
            if (isset($_GET['id_kh'])) {
                xoatk($_GET['id_kh']);
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case "donhang":
            $listdonhang = loadall_donhang();
            include "donhang/list.php";
            break;



        case "suadh":
            if (isset($_GET['id_dh']) && ($_GET['id_dh'])) {
                $donhang = loadone_bill($_GET['id_dh']);
            }
            $listdonhang = loadall_donhang();
            include "donhang/sua.php";
            break;

        case "updatedh":
            if (isset($_POST["capnhat"]) && ($_POST["capnhat"])) {
                $id_dh = $_POST['id_dh'];
                $trangthai = $_POST['trangthai'];
                update_trangthai($id_dh, $trangthai);
                $thongbao = "Cập nhật thành công thành công";
            }
            $listdonhang = loadall_donhang();
            include "donhang/list.php";
            break;
        case "thongke":
            $listtk = load_thongke_sanpham_danhmuc();
            include "thongke/list.php";
            break;
        case "bieudo":
            $listtk = load_thongke_sanpham_danhmuc();
            include "thongke/bieudo.php";
            break;
        case "binhluan":
            $listbl = loadall_binhluan();
            include "binhluan/list.php";
            break;
        case "xoabl":
            if (isset($_GET['ma_bl'])) {
                delete_binhluan($_GET['ma_bl']);
            }
            $listbl = loadall_binhluan();
            include "binhluan/list.php";
            break;
    }
}


include "footer.php";
?>
<!-- https://www.youtube.com/watch?v=CQKSQEGCiz4 -->
<!-- https://www.youtube.com/watch?v=L-Q5J1_aeU8 -->