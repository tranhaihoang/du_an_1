

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="tile-title"> Quản lý hàng hóa</h3>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12 ">
            <div class="col-xs-3">
                <a href="index.php?act=addsp"><i class="fas fa-plus"></i>Thêm mới</a>
            </div>
            <div class="col-xs-3">
                <a><i class="fa fa-list" aria-hidden="true"></i> Danh Mục</a>
            </div>
        </div>
        <div class="col-md-12 ">
            <div class="dataTables_length" id="sampleTable_length">
                <form action="index.php?act=listsp" method="post">
                    <input type="text" name="keyw" placeholder="Tìm sản phẩm">
                    <label>Danh mục
                        <select name="id_dm">
                            <option value="0" selected>Tất cả</option>
                            <?php
                            foreach ($listdanhmuc as $danhmuc) {
                                extract($danhmuc);
                                echo '<option value="' . $id_dm . '">' . $name_dm . '</option>';
                            }
                            ?>
                        </select>
                        <input type="submit" value="Tìm kiếm" name="timkiem">

                    </label>
                </form>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <table class="col-md-12">

                <tr>                      
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Giá sale</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả </th>
                    <th>Trạng thái</th>
                    <th>Số lương</th>
                    <th>Mô tả chi tiết</th>
                    <th>Hành động</th>
                </tr>



                <!-- <tr role="row" class="odd">
                    <td class="sorting_1">1</td>
                    <td>53</td>
                    <td>Bánh ngọt</td>
                    <td>bánh kẹo ngọt</td>
                    <td>2165400</td>
                    <td>20</td>
                    <td>30</td>
                    <td><img src="" alt="" height="50px;" /></td>
                    <td>Có sẵn</td>
                    <td>
                        <button type="button"><i class="fas fa-trash-alt"></i></button>
                        <a href="#" type="button"><i class="fas fa-edit"></i></a>
                    </td>
                </tr> -->

                <?php
                foreach ($listsanpham as $sanpham) {
                    extract($sanpham);
                    

                    $suasp = "index.php?act=suasp&id_sp=" . $id_sp;
                    
                    $xoasp = "index.php?act=xoasp&id_sp=" . $id_sp;
                    $hinhpath ="../upload/".$img_sp;
                    if (is_file($hinhpath)) {
                        $hinh = "<img src= '" .$hinhpath. "'height='100px'>";
                    } else {
                        $hinh = "No file img!";
                    }
                    echo 
                    '<tr>
                        <td>' . $id_sp . '</td>
                        <td>' . $ten_sp . '</td>
                        <td>' . $gia_sp . '</td>
                        <td>' . $gia_sale . '</td>
                        <td>' . $hinh. '</td>
                        <td>' . $mota_sp. '</td>
                        <td>' . $trangthai . '</td>
                        <td>' . $soluong . '</td>
                        <td>' . $mota_ct. '</td>
                        <td>
                            <a href="'.$xoasp.'"><button type="button" onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')"><i class="fas fa-trash-alt"></i></button></a>
                            <a href="'.$suasp.'" type="button"><i class="fas fa-edit"></i></a>
                        </td>

                    </tr>';
        


                    
                }
                ?>


            </table>
        </div>
    </div>


</div>
