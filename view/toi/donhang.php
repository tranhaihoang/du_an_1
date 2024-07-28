<table class="col-lg-12" border="1px" style="text-align: center;">
    <tr>
        <th>Mã đơn hàng</th>
        <th>Tên người nhận</th>
        <th>Địa chỉ</th>
        <th>Ngày đặt</th>
        <th>Trạng thái</th>
        <th>tổng Thanh toán</th>
        <th>Ghi chú</th>
    </tr>
    <tbody id="order">
        <?php
        if (isset($loadbill)) {
            // extract($_SESSION['cart']);
            foreach ($loadbill as $bill) {
                extract($bill);

        ?>
                <tr>
                    <td><?= $id_dh ?></td>
                    <td><?= $ho_ten ?></td>
                    <td><?= $dia_chi ?></td>
                    <td><?= $ngay_dat ?></td>
                    <td><?php
                        if ($trangthai == 0) {
                            echo 'Đang xác nhận';
                        } else if ($trangthai == 1) {
                            echo 'Đã xác nhận';
                        } else {
                            echo 'Đã hoàn thành';
                        }

                        ?></td>
                    <td><?= number_format((int)$tong_dh, 0, ",", ".") ?><u>.đ</u></td>

                    <td><?= $ghi_chu ?></td>
                </tr>
        <?php
            }
            // echo '<pre>';
            // var_dump($loadbill);
        }
        ?>
    </tbody>
</table>