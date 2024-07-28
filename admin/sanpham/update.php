<?php
if(is_array($sanpham)){
    extract($sanpham);
}
$hinhpath="../upload/".$img_sp;
if(is_file($hinhpath)){
    $hinh="<img src='".$hinhpath."' width='100px' height='100px'>";
}else{
    $hinh="No file img!";
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="tile-title"> Trang sửa hàng hóa </h3>
        </div>
    </div>

    <div class="row">
        <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
            <div class="container">
                <div class="form-group col-md-8">
                    <label class="control-label">Danh Mục</label>
                    <select class="form-control" name="id_dm">
                        <option value="0" selected>Tất cả</option>
                        <?php
                            foreach($listdanhmuc as $key=>$value){
                                if($id_dm==$value['id_dm']){
                                    echo '<option value="'.$value['id_dm'].'" selected>'.$value['name_dm'].'</option>' ;
                                }else{
                                    echo '<option value="'.$value['id_dm'].'">'.$value['name_dm'].'</option>' ;
                                }

                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-8 ">
                    <label class="control-label">Giá</label>
                    <input class="form-control" type="text" name="gia_sp"  value="<?=$gia_sp?>" />
                </div>
                <div class="form-group col-md-8 ">
                    <label class="control-label">Giá Sale(%)</label>
                    <input class="form-control" type="text" name="gia_sale"  value="<?=$gia_sale?>" />
                </div>
                <div class="form-group col-md-12 row">
                    <div class="form-group col-md-4">
                        <label class="control-label">Tên sản phẩm</label>
                        <input class="form-control" type="text" name="ten_sp"  value="<?=$ten_sp?>" />
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Số lượng</label>
                        <input class="form-control" type="number" name="soluong" value="<?=$soluong?>" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="status" class="control-label">Trạng thái</label>
                        <select class="form-control" name="trangthai" value="<?=$trangthai?>" >
                            <option>>-- Chọn trạng thái --< </option>    
                            <option value="0">0</option>
                            <option value ="1">1</option>  
                        </select>
                    </div>
                    
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label">Hình ảnh chính</label>
                    <div id="myfileupload">
                        <input type="file" id="uploadfile" name="hinh" />
                        
                    </div>
                    <div id="thumbbox">
                        <?php echo $hinh ?>
                        <a class="removeimg" href="javascript:"></a>
                    </div>
                </div>
                <!-- upload nhieu anh -->
                <!-- <div class="form-group col-md-12">
                    <label class="control-label"> ảnh mô tả</label>
                    <div id="myfileupload">
                        <input type="file" name="hinh_mota" multiple="multiple" />
                    </div>
                </div> -->
                <div class="form-group col-md-12">
                    <label class="control-label">Mô tả</label>
                    <div class="box-nd-blog">
                        <textarea name="mota_sp" value="<?=$mota_sp?>" id="nd-blog" cols="70" rows="50" ></textarea>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label">Mô tả chi tiết</label>
                    <div class="box-nd-blog">
                        <textarea name="mota_ct" value="<?=$mota_ct?>" id="nd-blog" cols="70" rows="50" ></textarea>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <input type="hidden" name="id_sp" value="<?=$id_sp?>">
                    <input class="btn btn-save" type="submit" name="capnhat" value="Sửa"></input>
                    <a class="btn btn-cancel" href="index.php?act=listsp">Hủy bỏ</a>
                </div>
            </div>
        </form>
    </div>



</div>