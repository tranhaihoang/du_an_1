<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="tile-title"> Thêm tài khoản mới</h3>
        </div>
    </div>

    <div class="row">
        <form action="index.php?act=addtk" method="POST" >
            <div class="container">

                <div class="form-group col-md-12 row">
                    <div class="form-group col-md-6">
                        <label class="control-label">Mã tài khoản *</label>
                        <input class="form-control" type="text" name="id_tk" />
                        <?php
                        if (isset($error['id_tk']) && ($error['id_tk'] != ""))
                            echo  '<span style="color:red;">' . $error['id_tk'] . '</span>';
                        ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Tên tài khoản *</label>
                        <input class="form-control" type="text" name="ten_tk" />
                        <?php
                        if (isset($error['ten_tk']) && ($error['ten_tk'] != ""))
                            echo  '<span style="color:red;">' . $error['ten_tk'] . '</span>';
                        ?>
                    </div>
                </div>
                <div class="form-group col-md-12 row">
                    <div class="form-group col-md-6">
                        <label class="control-label">password *</label>
                        <input class="form-control" type="password" name="pass_tk" />
                        <?php
                        if (isset($error['pass_tk']) && ($error['pass_tk'] != ""))
                            echo  '<span style="color:red;">' . $error['pass_tk'] . '</span>';
                        ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Số điện thoại *</label>
                        <input class="form-control" type="text" name="sdt" />
                        <?php
                        if (isset($error['sdt']) && ($error['sdt'] != ""))
                            echo  '<span style="color:red;">' . $error['sdt'] . '</span>';
                        ?>
                    </div>
                    
                </div>

                <div class="form-group col-md-11 ">
                    <label class="control-label">Vai trò *</label>
                    <select class="form-control" name="vaitro">
                            <option>>-- Chọn trạng thái --< </option>    
                            <option value="0">0</option>
                            <option value ="1">1</option>  
                            <?php
                        if (isset($error['vaitro']) && ($error['vaitro'] != ""))
                            echo  '<span style="color:red;">' . $error['vaitro'] . '</span>';
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-11 ">
                    <label class="control-label">Email *</label>
                    <input class="form-control" type="email" name="email"  />
                    <?php
                        if (isset($error['email']) && ($error['email'] != ""))
                            echo  '<span style="color:red;">' . $error['email'] . '</span>';
                    ?>
                </div>
                <div class="form-group col-md-11 ">
                    <label class="control-label">Địa chỉ</label>
                    <input class="form-control" type="text" name="diachi"  />
                    <?php
                        if (isset($error['diachi']) && ($error['diachi'] != ""))
                            echo  '<span style="color:red;">' . $error['diachi'] . '</span>';
                    ?>
                </div>
            
                <div class="form-group col-md-4">
                    <input type="hidden" name="id_kh" >
                    <input class="btn btn-save" type="submit" name="themmoi" value="Thêm "></input>
                    <a class="btn btn-cancel" href="index.php?act=taikhoan">Hủy bỏ</a>
                </div>
            </div>
        </form>
    </div>



</div>