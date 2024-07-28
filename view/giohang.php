   <!-- Hero Section Begin -->
   <!-- Hero Section End -->

   <?php
    if (empty($dataDb)) {
        echo ('Bạn chưa có trong giỏ hàng !');
    } else {
    ?>
       <section class="breadcrumb-section set-bg" data-setbg="img/banner-bai.png" style="background-image: url(&quot;img/banner-bai.png&quot;);">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12 text-center">
                       <div class="breadcrumb__text">
                           <h2>Cửa hàng OGANI</h2>
                           <div class="breadcrumb__option">
                               <a href="./index.html">Trang chủ</a>
                               <span>Cửa hàng</span>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>

       <section class="shoping-cart spad">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="shoping__cart__table">
                           <table>
                               <thead>
                                   <tr>
                                       <th>Stt</th>
                                       <th class="shoping__product">Sản Phẩm</th>
                                       <th>Giá</th>
                                       <th>Số lượng</th>
                                       <th>tổng tiền</th>
                                       <th></th>
                                   </tr>
                               </thead>
                               <tbody id="order">
                                   <?php
                                    $sum_total = 0;
                                    foreach ($dataDb as $key => $product) :
                                        // kiểm tra số lượng sản phẩm trong giỏ hàng
                                        $quantityInCart = 0;
                                        foreach ($_SESSION['cart'] as $item) {
                                            if ($item['id_sp'] == $product['id_sp']) {
                                                $quantityInCart = $item['quantity'];
                                                break;
                                            }
                                        }

                                    ?>
                                       <tr>
                                           <td><?= $key + 1 ?></td>
                                           <td class="shoping__cart__item">
                                               <img src="<?= $img_path, $product['img_sp'] ?>" alt="<?= $product['ten_sp'] ?>">
                                               <h5><?= $product['ten_sp'] ?></h5>
                                           </td>
                                           <td class="shoping__cart__price">
                                               <?= number_format((int)$product['gia_sp'], 0, ",", ".")  ?> <u>đ</u>
                                           </td>
                                           <td class="shoping__cart__quantity">
                                               <div class="quantity">
                                                   <div class="pro-qty">
                                                       <input type="number" value="<?= $quantityInCart ?>" min="1" id="quantity_<?= $product['id_sp'] ?>" oninput="updateQuantity(<?= $product['id_sp'] ?>, <?= $key ?>)">
                                                   </div>
                                               </div>
                                           </td>
                                           <td class="shoping__cart__total">
                                               <?= number_format((int)$product['gia_sp'] * (int)$quantityInCart, 0, ",", ".") ?> <u>đ</u>
                                           </td>
                                           <td class="shoping__cart__item__close">
                                               <span onclick="removeformcart(<?= $product['id_sp'] ?>)">
                                                   <p class="icon_close"></p>
                                               </span>
                                           </td>
                                       </tr>

                                   <?php
                                        // Tính tổng giá đơn hàng
                                        $sum_total += ((int)$product['gia_sp'] * (int)$quantityInCart);

                                        // Lưu tổng giá trị vào sesion
                                        $_SESSION['resultTotal'] = $sum_total;

                                    endforeach;
                                    ?>


                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
               <div class="row">
                   <div class="col-lg-6">
                       <div class="shoping__continue">
                           <div class="shoping__discount">
                               <h5>Mã Giảm giá</h5>
                               <form action="#">
                                   <input type="text" placeholder="Nhập mã phiếu giảm giá">
                                   <button type="submit" class="site-btn">Ap dụng</button>
                               </form>
                           </div>
                       </div>
                   </div>
                   <div class="col-lg-6">
                       <div class="shoping__checkout">
                           <h5>Tổng tiền</h5>
                           <ul>
                               <li>Tạm tính <span><?= number_format((int)$sum_total, 0, ",", ".")  ?> <u>đ</u></span></li>
                               <li>Tổng cổng <span><?= number_format((int)$sum_total, 0, ",", ".")  ?> <u>đ</u></span></li>
                           </ul>
                           <form action="index.php?act=thanhtoan" method="post">
                               <input type="submit" class="primary-btn" value="Tiến Hàng Đặt Hàng"></input>
                           </form>
                       </div>
                   </div>

               </div>
       </section>

   <?php } ?>
   <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
   <script>
       function updateQuantity(id_sp, index) {
           let newQuantity = $('#quantity_' + id_sp).val();
           if (newQuantity <= 0) {
               newQuantity = 1
           }

           // Gửi yêu cầu bằng ajax để cập nhật giỏ hàng
           $.ajax({
               type: 'POST',
               url: './view/updatequantity.php',
               data: {
                   id_sp: id_sp,
                   quantity: newQuantity
               },
               success: function(response) {
                   // Sau khi cập nhật thành công
                   $.post('view/tablecartorder.php', function(data) {
                       $('#order').html(data);
                   })
               },
               error: function(error) {
                   console.log(error);
               },
           })
       }

       function removeformcart(id_sp) {
           if (confirm("Bạn có đồng ý xóa hay không")) {
               $.ajax({
                   type: 'POST',
                   url: './view/removeformcart.php',
                   data: {
                       id_sp: id_sp,
                   },
                   success: function(response) {
                       // Sau khi cập nhật thành công
                       $.post('view/tablecartorder.php', function(data) {
                           $('#order').html(data);
                       })
                   },
                   error: function(error) {
                       console.log(error);
                   },
               })
           }

           // Gửi yêu cầu bằng ajax để cập nhật giỏ hàng

       }
   </script>
   <!-- Breadcrumb Section Begin -->

   <!-- Breadcrumb Section End -->

   <!-- Shoping Cart Section Begin -->

   <!-- Shoping Cart Section End -->