<?php
    session_start();
    include "../../model/pdo.php";
    include "../../model/binhluan.php";
    // include "../../model/sanpham.php";
    // include "../../model/danhmuc.php";
    $id_sp=$_REQUEST['id_sp'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    if (isset($_SESSION['ten'])) {
        extract($_SESSION['ten']);
        ?>
    <div class='reviews-form-area'>
        <h4 class='title'>Bình Luận Mới</h4>
        <div class='reviews-form-content'>

            <form action='<?= $_SERVER['PHP_SELF'];?>' method='post'>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='form-group'>
                            <input type='hidden' name='idpro' value="<?php $idpro?>">
                            <input id='for_comment' name='noidung' class='form-control' placeholder='Bình luận sản phẩm....'  ></input>
                            <input type="submit" name='gui' value='Bình Luận'>
                        </div>
                    </div>
    
                </div>
            </form>

            <div class='col-md-12'>
                <div class='form-group'>
                    <?php
                        echo 'sản phảm bạn là '.$id_sp;
                    ?>
                </div>
            </div>

            
            <?php 
            if(isset($_POST['gui'])&&($_POST['gui'])){
                $id_tk=$_SESSION['ten']['id_tk'];
                $noidung=$_POST['noidung'];
                $idpro=$_POST['idpro'];
                $date=date('h:i:sa d/m/Y');
                insert_binhluan($id_tk,$noidung,$id_sp,$date);
                header("location: ".$_SERVER['HTTP_REFERER']);
            }
                
            ?>
                        
        </div>
    </div>
<?php } else {?>
    <div class='reviews-form-area'>
        <h4 class='title'>Bạn Hãy Vui Lòng <a href='index.php?act=dangnhap'>Đăng Nhập</a> Để Bình Luận </h4>
    </div>
<?php }?>
</body>
</html>              