

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="tile-title"> Quản lý Đơn hàng</h3>
        </div>

    </div>


    <div class="container">
        <div class="row">
            <table class="col-md-12">

                <tr>                      
                    <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Phone</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Ghi chú</th>
                    <th>Trạng thái</th>
                    <th>Thanh toán</th>
                    <th>Hành động</th>
                </tr>


                <?php
                foreach ($listdonhang as $donhang ) {
                    extract($donhang );
                    
                    

                
                    $suadh = "index.php?act=suadh&id_dh=" . $id_dh;
                ?>                    
                    <tr>
                        <td><?=  $id_dh ?></td>
                        <td><?=  $ho_ten ?></td>
                        <td><?=  $email ?></td>
                        <td><?=  $dia_chi ?></td>
                        <td><?=  $phone ?></td>
                        <td><?=  $ngay_dat ?></td>
                        <td><?=  $tong_dh ?></td>
                        <td><?=  $ghi_chu ?></td>
                        <td><?php 
                            if($trangthai == 0){
                                echo 'Đang xác nhận';
                            }else if($trangthai == 1){
                                echo'Đã xác nhận';
                            }else{
                                echo 'Đã hoàn thành';
                            }

                        ?></td>                             
                        <td><?php 
                            if($pttt == 0){
                                echo 'Thanh toán nhận hàng';
                            }else if($pttt == 1){
                                echo'Thanh toán vivay';
                            }

                        ?></td>
                        <td>
                            <a href='<?= $suadh?>' type="button"><i class="fas fa-edit"></i></a>
                        </td>

                    </tr>
        


                <?php    
                }
                ?>

<!-- <  if($trangthai==0){echo '<td>Xác nhận đơn</td>' } ?> -->
            </table>
        </div>
    </div>


</div>
