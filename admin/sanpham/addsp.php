
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="tile-title"> Tạo sản phẩm mới</h3>
        </div>
    </div>

    <div class="row">
        <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
            <div class="container">
                <div class="form-group col-md-8">
                    <label class="control-label">Danh Mục</label>
                    <select class="form-control" name="id_dm">
                        <option>>-- Chọn danh mục --</option>
                        <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            echo '<option value="' . $id_dm . '">' . $name_dm . '</option>';
                        }
                        ?>
                        <?php
                        if (isset($error['id_dm']) && ($error['id_dm'] != ""))
                            echo  '<span style="color:red;">' . $error['id_dm'] . '</span>';
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-8 ">
                    <label class="control-label">Giá</label>
                    <input class="form-control" type="text" name="gia_sp" value="0" />
                    <?php
                        if (isset($error['gia_sp']) && ($error['gia_sp'] != ""))
                            echo  '<span style="color:red;">' . $error['gia_sp'] . '</span>';
                    ?>
                </div>
                <div class="form-group col-md-8 ">
                    <label class="control-label">Giá Sale(%)</label>
                    <input class="form-control" type="text" name="gia_sale" value="0" />
                    <?php
                        if (isset($error['gia_sale']) && ($error['gia_sale'] != ""))
                            echo  '<span style="color:red;">' . $error['gia_sale'] . '</span>';
                    ?>
                </div>
            
            
                <div class="form-group col-md-12 row">
                    <div class="form-group col-md-4">
                        <label class="control-label">Tên sản phẩm</label>
                        <input class="form-control" type="text" name="ten_sp" />
                        <?php
                        if (isset($error['ten_sp']) && ($error['ten_sp'] != ""))
                            echo  '<span style="color:red;">' . $error['ten_sp'] . '</span>';
                        ?>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Số lượng</label>
                        <input class="form-control" type="number" name="soluong" />
                        <?php
                        if (isset($error['soluong']) && ($error['soluong'] != ""))
                            echo  '<span style="color:red;">' . $error['soluong'] . '</span>';
                        ?>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="status" class="control-label">Trạng thái</label>
                        <select class="form-control" name="trangthai">
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
                        <?php
                        if (isset($error['hinh']) && ($error['hinh'] != ""))
                            echo  '<span style="color:red;">' . $error['hinh'] . '</span>';
                        ?>
                    </div>
                    <div id="thumbbox">
                        <img alt="Hình ảnh ngón tay cái">
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
                        <textarea name="mota_sp" id="nd-blog" cols="70" rows="50"></textarea>
                        <?php
                        if (isset($error['mota_sp']) && ($error['mota_sp'] != ""))
                            echo  '<span style="color:red;">' . $error['mota_sp'] . '</span>';
                        ?>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label">Mô tả chi tiết</label>
                    <div class="box-nd-blog">
                        <textarea name="mota_ct" id="nd-blog" cols="70" rows="50"></textarea>
                        <?php
                        if (isset($error['mota_ct']) && ($error['mota_ct'] != ""))
                            echo  '<span style="color:red;">' . $error['mota_ct'] . '</span>';
                        ?>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <input class="btn btn-save" type="submit" name="themmoi" value="Thêm "></input>
                    <a class="btn btn-cancel" href="index.php?act=listsp">Hủy bỏ</a>
                </div>
            </div>
        </form>
    </div>



</div>