<?php
    session_start();
    include "../model/pdo.php";
    include "../model/taikhoan.php";
    include "../model/sanpham.php";
    include "../model/danhmuc.php";
    include "../global.php";

    if (!empty($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
         // Tạo mảng chứa ID các sản phẩm trong giỏ hàng
         $productid_sp = array_column($cart, 'id_sp');
         
         // Chuyển đôi mảng id thành một cuỗi để thực hiện truy vấn
         $idlist = implode(',', $productid_sp);
         
         // Lấy sản phẩm trong bảng sản phẩm theo id
         $dataDb = loadone_sanphamCart ($idlist);
        //  var_dump($dataDb );

        $sum_total = 0;
                                    foreach ($dataDb as $key => $product):
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
                                    <td><?= $key +1?></td>
                                    <td class="shoping__cart__item">
                                        <img src="<?= $img_path, $product['img_sp']?>" alt="<?= $product['ten_sp']?>">
                                        <h5><?= $product['ten_sp']?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                    <?= number_format((int)$product['gia_sp'], 0, ",", ".")  ?> <u>đ</u>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="number" value="<?= $quantityInCart ?>" min="1" id="quantity_<?= $product['id_sp'] ?>" oninput="updateQuantity(<?= $product['id_sp'] ?>, <?= $key?>)">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                    <?= number_format((int)$product['gia_sp']*(int)$quantityInCart, 0, ",", ".") ?> <u>đ</u>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span onclick="removeformcart(<?= $product['id_sp'] ?>)"><p class="icon_close"></p></span>
                                    </td>
                                </tr>

                            <?php
                                // Tính tổng giá đơn hàng
                                $sum_total += ((int)$product['gia_sp'] * (int)$quantityInCart);

                                // Lưu tổng giá trị vào sesion
                                $_SESSION['resultTotal'] = $sum_total;
                            endforeach;
                            ?>
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
<?php
    }
?>