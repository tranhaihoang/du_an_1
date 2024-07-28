<?php 
    function loadall_binhluan(){
        $sql = "SELECT * FROM binhluan WHERE 1";
        $sql.= " order by ma_bl desc";
        $listbl=pdo_query($sql);
        return $listbl;
    }
    // DELETE FROM binhluan WHERE ma_bl= 5;
    function delete_binhluan($ma_bl){
        $sql="DELETE from binhluan where `ma_bl`=".$ma_bl ;
        pdo_execute($sql);
    }
    function loadall_binhluanid($id_sp){
        $sql ="
            SELECT binhluan.ma_bl, binhluan.noi_dung, user.ten, binhluan.ngay_bl FROM `binhluan` 
            LEFT JOIN user ON binhluan.id_kh = user.id_kh
            LEFT JOIN sanpham ON binhluan.id_sp = sanpham.id_sp
            WHERE sanpham.id_sp = $id_sp;
        ";
        $result =  pdo_query($sql);
        return $result;
    }
    function insert_binhluan($id_kh,$noidung,$id_sp,$date){
        $date = date('Y-m-d');
        $sql = "
            INSERT INTO `binhluan`(`id_kh`, `noi_dung`, `id_sp`, `ngay_bl`) 
            VALUES ('$id_kh','$noidung','$id_sp','$date');
        ";
        //echo $sql;
        //die;
        pdo_execute($sql);
    }

?>