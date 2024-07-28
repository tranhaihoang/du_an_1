<div class="container">
           <div class="row">
               <div class="col-lg-12">
                   
                    <h5>Cảm ơn quý khách đã đặt hàng!</h5>
                    <?php
                        if(isset($bill)&&(is_array($bill))){
                            // extract($bill);
                        }
                    
                    ?>   
                       <table class="col-md-12" border="1px">

                               <tr >
                                    
                                    <td>ID đơn hàng</td>
                                    <td>Ảnh sản phẩm</td>
                                    <td>Địa chỉ</td>
                                    <td>Thông tin ct</td>                             
                                    <th>Ngày đặt</th>
                                    <th>Ghi chú</th>
                                    <th>Số lượng mua</th>
                                    <th>Trạng thái</th>
                                    <th>tổng tiền</th>
                               </tr>
                           <tbody id="order">
                               
                                <tr>
                                    <td><?= $bill['ten'] ?></td>
                                    <td><?= $bill['email'] ?></td>
                                    <td><?= $bill['dia_chi'] ?></td>
                                    <td><?= $bill['phone'] ?></td>
                                    <td><?= $bill['ngay_dat'] ?></td>
                                    <td><?= $bill['ghi_chu'] ?></td>
                                    <td><?= $bill['pttt'] ?></td>
                                    <td><?= $bill['tong_dh'] ?></td>
                                </tr>

                            
                               
                           </tbody>
                       </table> 
                     
               </div>
           </div>
