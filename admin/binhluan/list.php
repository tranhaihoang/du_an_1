
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="tile-title"> Quản lý bình luận</h3>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12 ">
            <div class="dataTables_length" id="sampleTable_length">
                <form action="index.php?act=listsp" method="post">
                    <input type="text" name="keyw" placeholder="Tìm theo id">
                        <input type="submit" value="Tìm kiếm" name="timkiem">
                </form>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <table class="col-md-12">

                <tr>                      
                    <th>Mã bình luận</th>
                    <th>Mã sản phẩm</th>
                    <th>Mã khách hàng</th>
                    <th>Nội dung</th>
                    <th>Ngày bình luận</th>
                    <th>Hành động</th>
                </tr>


                <?php
                foreach ( $listbl as $binhluan) {
                    extract($binhluan);
                    $xoabl = "index.php?act=xoabl&ma_bl=".$ma_bl;
                    echo 
                    '<tr>
                        <td>' . $ma_bl . '</td>
                        <td>' . $id_sp. '</td>                      
                        <td>' . $id_kh. '</td>  
                        <td>' . $noi_dung. '</td>
                        <td>' . $ngay_bl . '</td>                   


                        <td>
                            <a href="'.$xoabl.'"><button type="button" onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')"><i class="fas fa-trash-alt"></i></button></a>
                        </td>

                    </tr>';
        


                    
                }
                ?>


            </table>
        </div>
    </div>


</div>
