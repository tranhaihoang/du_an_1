<?php
function loadall_sanpham_home()
{
    $sql = "select * from sanpham where trangthai=0 order by id_sp desc limit 0,9";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}
function loadall_sanpham_top10(){
    $sql="select * from sanpham where 1 order by yeuthich desc limit 0,10";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}

function insert_yeuthich($yeuthich)
{
    $sql = "INSERT INTO `sanpham`(`yeuthich`) VALUES ('$yeuthich');";
    pdo_execute($sql);
}
function loadall_sanpham_sale()
{
    $sql = "SELECT * FROM sanpham WHERE gia_sale > 1 order by id_sp ASC LIMIT 0,9";
    $listsale = pdo_query($sql);
    return  $listsale;
}
// function loadall_sanpham_top10(){
//     $sql="select * from sanpham where 1 order by luotxem desc limit 0,10";
//     $listsanpham=pdo_query($sql);
//     return $listsanpham;
// }
// SELECT * from sanpham where 1 and ten_sp like '%gà%'
function loadall_sanpham($keyw="", $id_dm=0)
{
    $sql = "SELECT * from sanpham where trangthai = 0";
    // where 1 tức là nó đúng
    if($keyw!=""){
        $sql.=" and ten_sp like '%".$keyw."%'";
    }
    // if ($id_dm > 0) {
    //     $sql .= " and id_dm ='" . $id_dm . "'";
    // }
    if ($id_dm >0) {
        $sql.= " and id_dm='$id_dm' ";
    }
    $sql .= " order by id_sp desc";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function loadone_sanphamCart($idlist)
{
    $sql = 'SELECT * FROM sanpham WHERE id_sp IN (' . $idlist . ')';
    $sanpham = pdo_query($sql);
    return $sanpham;
}


// 
function loadone_sanpham($id_sp)
{
    $sql = "select * from sanpham where id_sp = " . $id_sp;
    $result = pdo_query_one($sql);
    return $result;
}
function load_sanpham_cungloai($id_sp, $id_dm)
{
    $sql = "SELECT * from sanpham where id_dm = " . $id_dm . " AND id_sp <> $id_sp";
    $sanphamcl = pdo_query($sql);
    return $sanphamcl;
}

function insert_sanpham($ten_sp, $gia_sp, $gia_sale, $img_sp, $mota_sp,$mota_ct, $trangthai, $soluong, $id_dm)
{
    $sql = "INSERT INTO `sanpham`(`ten_sp`, `gia_sp`, `gia_sale`,`img_sp`,`mota_sp`,`mota_ct`,`trangthai`,`soluong`, `id_dm`) VALUES ('$ten_sp','$gia_sp','$gia_sale', '$img_sp',' $mota_sp','$mota_ct','$trangthai','$soluong','$id_dm');";
    pdo_execute($sql);
}
function update_sanpham($id_sp, $ten_sp, $gia_sp, $gia_sale, $img_sp, $mota_sp,$mota_ct,$trangthai, $soluong, $id_dm)
{
    if ($img_sp != "") {
        // $sql="update sanpham set iddm='".$iddm."',name='".$tensp."',price='".$giasp."',mota='".$mota."',img='".$hinh."' where id=".$id;
        $sql =  "UPDATE `sanpham` SET `ten_sp` = '{$ten_sp}', `gia_sp` = '{$gia_sp}',`gia_sale` = '{$gia_sale}',`img_sp` = '{$img_sp}',`mota_sp` = '{$mota_sp}',`mota_ct` = '{$mota_ct}',`trangthai` = '{$trangthai}',`soluong` = '{$soluong}',`id_dm` = '{$id_dm}' WHERE `sanpham`.`id_sp` = $id_sp";
    } else {
        //  $sql="update sanpham set iddm='".$iddm."',name='".$tensp."',price='".$giasp."',mota='".$mota."' where id=".$id;
        $sql =  "UPDATE `sanpham` SET `ten_sp` = '{$ten_sp}', `gia_sp` = '{$gia_sp}',`gia_sale` = '{$gia_sale}',`mota_sp` = '{$mota_sp}',`mota_ct` = '{$mota_ct}',`trangthai` = '{$trangthai}',`soluong` = '{$soluong}',`id_dm` = '{$id_dm}' WHERE `sanpham`.`id_sp` = $id_sp";
    }
    pdo_execute($sql);
}

// Câu truy vấn xóa cứng
function hard_delete($id_sp)
{
    $sql = "DELETE FROM sanpham WHERE id_sp=" . $id_sp;
    pdo_execute($sql);
}

// cÂU TRUY VẤN XÓA MỀM
function soft_delete($id_sp)
{
    $sql = "UPDATE `sanpham` SET `trangthai` = 1 WHERE `sanpham`.`id_sp` = $id_sp";
    pdo_execute($sql);
}
