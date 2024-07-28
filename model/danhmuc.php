<?php
function loadall_danhmuc(){
    $sql="SELECT * FROM danhmuc where trangthai = 0 order by id_dm desc";
    $listdanhmuc=pdo_query($sql);
    return  $listdanhmuc;
}

function load_ten_dm($id_dm){
    if($id_dm>0){
        $sql="select * from sanpham where id_dm=".$id_dm;
        $dm=pdo_query_one($sql);
        extract($dm);
        return $ten_sp;
    }else{
        return "";
    }
}

function loadone_danhmuc($id_dm){
    $sql = "select * from danhmuc where id_dm = ".$id_dm;
    $result = pdo_query_one($sql);
    return $result;
}

function update_danhmuc($id_dm,$name_dm,$anh_dm){
    if($anh_dm!=""){
        // $sql="update sanpham set iddm='".$iddm."',name='".$tensp."',price='".$giasp."',mota='".$mota."',img='".$hinh."' where id=".$id;
        $sql=  "UPDATE `danhmuc` SET `name_dm` = '{$name_dm}',`anh_dm` = '{$anh_dm}' WHERE `danhmuc`.`id_dm` = $id_dm";
    }else{
        //  $sql="update sanpham set iddm='".$iddm."',name='".$tensp."',price='".$giasp."',mota='".$mota."' where id=".$id;
        $sql=  "UPDATE `danhmuc` SET `name_dm` = '{$name_dm}'  WHERE `danhmuc`.`id_dm` = $id_dm";
    }
    pdo_execute($sql);
}
function delete_dm($id_dm){
    $sql = "UPDATE `danhmuc` SET `trangthai` = 1 WHERE `danhmuc`.`id_dm` = $id_dm";
    pdo_execute($sql);
}

