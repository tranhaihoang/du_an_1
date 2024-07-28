<?php 
    session_start();
    if (!isset($_SESSION['cart'])) {
        // Nếu không có thì đi khởi tạo
        $_SESSION['cart'] = [];
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //lấy dữ liệu từ ajax đẩy lên
        $productid_sp = $_POST['id_sp'];
        $productten_sp = $_POST['ten_sp'];
        $productgia_sp = $_POST['gia_sp'];

        //kiểm tra sản phẩm đã có trong giỏ hàng chưa 
        $index = false;
        if (!empty($_SESSION['cart'])) {
            $index= array_search( $productid_sp, array_column($_SESSION['cart'],'id_sp'));
        }
        //array_column trích xuất từ một cột từ mảng giỏ hàng và trả về một mảng giá trị của cột id
        if($index !== false){
            $_SESSION['cart'][$index]['quantity'] +=1;
        }else{
            $product =[
                'id_sp'=>$productid_sp,
                'ten_sp'=>$productten_sp,
                'gia_sp'=>$productgia_sp,
                'quantity'=>1

            ];
            $_SESSION['cart'][]=$product;
        }
        //trả về số lương sản phẩm của giỏ hàng
        echo count($_SESSION['cart']);
    }else{
        echo 'Yêu cầu không hợp lệ';
    }
?>