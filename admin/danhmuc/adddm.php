<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="tile-title"> Thêm mới danh mục</h3>
        </div>
    </div>

    <div class="row">
        <form action="index.php?act=adddm" method="POST" enctype="multipart/form-data">
            <div class="container">
                <div class="form-group col-md-12">
                    <label class="control-label">Danh Mục</label>
                    <input type="text" name="id_dm" placeholder="Nhập id">
                    <?php
                        if (isset($error['id_dm']) && ($error['id_dm'] != ""))
                            echo  '<span style="color:red;">' . $error['id_dm'] . '</span>';
                    ?>
                </div>
                <div class="form-group col-md-12 ">
                    <label class="control-label">Tên danh mục</label>
                    <input class="form-control" type="text" name="ten_dm" />
                    <?php
                        if (isset($error['ten_dm']) && ($error['ten_dm'] != ""))
                            echo  '<span style="color:red;">' . $error['ten_dm'] . '</span>';
                    ?>
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
                <div class="form-group col-md-12">
                    <input class="btn btn-save" type="submit" name="themmoi" value="Thêm "></input>
                    <a class="btn btn-cancel" href="index.php?act=listdm">Hủy bỏ</a>
                </div>
            </div>
        </form>
    </div>



</div>