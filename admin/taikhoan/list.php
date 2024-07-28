

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="tile-title"> Quản lý User</h3>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12 ">
            <div class="col-xs-3">
                <a href="index.php?act=addtk"><i class="fas fa-plus"></i>Thêm mới tài khoản.</a>
            </div>
        </div>
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
                    <th>Mã khách hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Email </th>
                    <th>Passwword</th>
                    
                    <th>Vai trò </th>
                    <th>phone</th>
                    <th>Địa chỉ</th>
                    <th>Hành động</th>
                </tr>


                <?php
                foreach ($listtaikhoan as $taikhoan) {
                    extract($taikhoan);
                    

                    $suakh = "index.php?act=suatk&id_kh=" . $id_kh;
                    
                    $xoakh = "index.php?act=xoatk&id_kh=" . $id_kh;
                    echo 
                    '<tr>
                        <td>' . $id_kh . '</td>
                        <td>' . $ten . '</td>  
                        <td>' . $email . '</td>                   
                        <td>' . $pass . '</td>                      
                        <td>' . $vai_tro. '</td>                                    
                        <td>' . $phone. '</td>
                        <td>' . $dia_chi . '</td>
                        <td>
                            <a href="'.$xoakh.'"><button type="button" onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')"><i class="fas fa-trash-alt"></i></button></a>
                            <a href="'.$suakh.'" type="button"><i class="fas fa-edit"></i></a>
                        </td>

                    </tr>';
        


                    
                }
                ?>


            </table>
        </div>
    </div>


</div>
