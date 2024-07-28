<?php
if(is_array($listdonhang)){
    extract($donhang);
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="tile-title"> Sửa đơn hàng</h3>
        </div>
    </div>

    <div class="row">
        <form action="index.php?act=updatedh" method="POST" >
            <div class="container">


                <div class="form-group col-md-11 ">
                    <label class="control-label">Trạng Thái  *</label>
                    <select class="form-control" name="trangthai" value="<?=$trangthai?>" >
                            <option>>-- Chọn trạng thái --< </option>    
                            <option value="0">Đang xác nhận</option>
                            <option value ="1">Đã xác nhận</option>
                            <option value ="2">Đã giao hàng</option>   
                            
                    </select>
                </div>
                <div class="form-group col-md-8">
                    <input type="hidden" name="id_dh" value="<?= $id_dh?>">
                    <input class="btn btn-save" type="submit" name="capnhat" value="Cập nhật"></input>
                    <a class="btn btn-cancel" href="index.php?act=donhang">Hủy bỏ</a>
                </div>
            </div>
        </form>
    </div>



</div>