<?php
function load_thongke_sanpham_danhmuc()
{
    $sql = " SELECT danhmuc.id_dm as madm, danhmuc.name_dm as tendm, 
       COUNT(sanpham.id_sp) as countsp, min(sanpham.gia_sp) as mingia, 
       max(sanpham.gia_sp ) as maxgia, avg(sanpham.gia_sp) as avggia 
       FROM danhmuc join sanpham on danhmuc.id_dm = sanpham.id_dm group by 
       danhmuc.id_dm order by danhmuc.id_dm desc";
    $listtk = pdo_query($sql);
    return $listtk;
}
?>