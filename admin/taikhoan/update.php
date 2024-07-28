<?php
if(is_array($taikhoan)){
    extract($taikhoan);
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="tile-title"> Sửa tài khoản</h3>
        </div>
    </div>

    <div class="row">
        <form action="index.php?act=updatetk" method="POST" >
            <div class="container">

                <div class="form-group col-md-12 row">
                    <div class="form-group col-md-6">
                        <label class="control-label">Mã tài khoản *</label>
                        <input class="form-control" type="text" name="id_tk" value="<?=$id_kh?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Tên tài khoản *</label>
                        <input class="form-control" type="text" name="ten_tk" value="<?=$ten?>" />
                    </div>
                </div>
                <div class="form-group col-md-12 row">
                    <div class="form-group col-md-6">
                        <label class="control-label">password *</label>
                        <input class="form-control" type="password" name="pass_tk" value="<?=$pass?>"  />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Số điện thoại *</label>
                        <input class="form-control" type="text" name="sdt" value="<?=$phone?>" />
                    </div>
                    
                </div>

                <div class="form-group col-md-11 ">
                    <label class="control-label">Vai trò *</label>
                    <select class="form-control" name="vaitro" value="<?=$vai_tro?>" >
                            <option>>-- Chọn trạng thái --< </option>    
                            <option value="0">0</option>
                            <option value ="1">1</option>  
                        </select>
                </div>
                <div class="form-group col-md-11 ">
                    <label class="control-label">Email *</label>
                    <input class="form-control" type="email" name="email" value="<?=$email?>"  />
                </div>
            
                <div class="form-group col-md-4">
                    <input type="hidden" name="id_kh" >
                    <input class="btn btn-save" type="submit" name="capnhat" value="Thêm "></input>
                    <a class="btn btn-cancel" href="index.php?act=taikhoan">Hủy bỏ</a>
                </div>
            </div>
        </form>
    </div>



</div>