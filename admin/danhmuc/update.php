<?php
    if (is_array($danhmuc)) {
        extract($danhmuc);
    }
    $hinhpath="../upload/".$anh_dm;
    if(is_file($hinhpath)){
        $hinh="<img src='".$hinhpath."' width='100px' height='100px'>";
    }else{
        $hinh="No file img!";
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="tile-title"> Thêm mới danh mục</h3>
        </div>
    </div>

    <div class="row">
        <form action="index.php?act=updatedm" method="POST" enctype="multipart/form-data">
            <div class="container">
                <div class="form-group col-md-12">
                    <label class="control-label">Danh Mục</label>
                    <input type="text" name="id_dm" placeholder="Nhập id" value="<?=$id_dm?>">
                </div>
                <div class="form-group col-md-12 ">
                    <label class="control-label">Tên danh mục</label>
                    <input class="form-control" type="text" name="ten_dm"
                        value="<?php if (isset($name_dm) && ($name_dm) != "")
                            echo $name_dm; ?>" />
                </div>

                <div class="form-group col-md-12">
                    <label class="control-label">Hình ảnh chính</label>
                    <div id="myfileupload">
                        <input type="file" id="uploadfile" name="hinh" />
                    </div>
                    <div id="thumbbox">
                        <?php echo $hinh?>
                        <a class="removeimg" href="javascript:"></a>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <input type="hidden" name="id_dm" value="<?php if (isset($id_dm) && ($id_dm > 0))
                        echo $id_dm;?>">
                    <input class="btn btn-save" type="submit" name="capnhat" value="Sửa "></input>
                    <a class="btn btn-cancel" href="index.php?act=listdm">Hủy bỏ</a>
                </div>
            </div>
        </form>
    </div>



</div>
