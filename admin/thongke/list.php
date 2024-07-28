

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="tile-title">Bảng thống kê</h3>
        </div>

    </div>
    
    <div class="container">
        <div class="row">
            <table class="col-md-12">

                <tr>                      
                    <th>Mã loại</th>
                    <th>Tên loại</th>
                    <th>Số lượng</th>
                    <th>Giá nhỏ nhất</th>
                    <th>Giá lớn nhất</th>
                    <th>Giá trung bình</th>
                </tr>
                <?php
                    foreach ($listtk as $tk) {
                        extract($tk);
                        echo '
                        <tr>
                            <td>'.$madm.'</td>
                            <td>'.$tendm.'</td>
                            <td>'.$countsp.'</td>
                            <td>'.number_format($mingia).' <u>đ</u></td>
                            <td>'.number_format($maxgia).' <u>đ</u></td>
                            <td>'.number_format($avggia).' <u>đ</u></td>
                        </tr>';

                    }
                ?>

            </table>
            <div class="row bieudo">
                <div class="col-md-12 ">
                    <div class="col-xs-3">
                        <h5><a href="index.php?act=bieudo"><i class="fa fa-list" aria-hidden="true"></i> Xem biểu đồ.</a></h5>
                    </div>
                </div>
       
            </div>
        </div>
    </div>


</div>
