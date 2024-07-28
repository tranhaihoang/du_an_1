<?php
function tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['cart'] as $cart) {
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien;
    }
    return $tong;
}

function insert_bill($id_kh,$name, $email, $diachi, $phone, $ngay_dat, $tong_dh, $ghi_chu, $pttt)
{
    $sql = "INSERT INTO `donhang`(`id_kh`,`ho_ten`, `email`, `dia_chi`,`phone`,`ngay_dat`,`tong_dh`,`ghi_chu`, `pttt`) VALUES ('$id_kh','$name','$email','$diachi','$phone','$ngay_dat','$tong_dh','$ghi_chu','$pttt');";
    return pdo_execute_return_lastInsertId($sql);
}


function loadone_bill($id_dh)
{
    $sql = "SELECT * from donhang where id_dh=" . $id_dh;
    $bill = pdo_query_one($sql);
    return $bill;
}

function loadall_donhang()
{
    $sql = "SELECT * FROM donhang order by id_dh desc";
    $listdonhang = pdo_query($sql);
    return $listdonhang;
}

function loadall_bill($id_kh)
{
    $sql = "SELECT * FROM donhang where id_kh=".$id_kh;
    $listbill = pdo_query($sql);
    return $listbill;
}
function insert_ct_bill($id_dh, $id_sp, $giamua, $soluong, $thanhtien){
    $sql="INSERT INTO chitietdonhang (id_dh, id_sp, giamua, soluong, thanhtien) VALUES ($id_dh, $id_sp, $giamua, $soluong, $thanhtien );";
    pdo_execute($sql);
}

function update_trangthai($id_dh,$trangthai){  
    //  $sql="update sanpham set iddm='".$iddm."',name='".$tensp."',price='".$giasp."',mota='".$mota."' where id=".$id;
    $sql=  "UPDATE `donhang` SET `trangthai` = '{$trangthai}'WHERE `donhang`.`id_dh` = $id_dh";
    pdo_execute($sql);
}
