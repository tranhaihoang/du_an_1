<?php

//dang ky
function insert_taikhoan($id_kh,$ten,$pass,$phone,$vai_tro,$email,$dia_chi)
{
    $sql = "INSERT INTO `user` ( `id_kh`, `ten`,`pass`,`phone`,`vai_tro`,`email`,`dia_chi`) VALUES ( '$id_kh','$ten','$pass','$phone','$vai_tro','$email','$dia_chi'); ";
    pdo_execute($sql);
}
function insert_user($email,$ten,$pass){
    $sql="INSERT INTO `user` ( `email`, `ten`, `pass`) VALUES ( '$email', '$ten','$pass'); ";
    pdo_execute($sql);
}

function dangnhap($ten, $pass)
{
    $sql = "SELECT * FROM user WHERE ten='" . $ten . "' AND pass='" . $pass . "'";
    $user = pdo_query_one($sql);
    return $user;
    // if ($taikhoan != false) {
    //     $_SESSION['user'] = $user;
    // } else {
    //     return "Thông tin tài khoản sai";
    // }
}

function dangxuat()
{
    if (isset($_SESSION['ten'])) {
        unset($_SESSION['ten']);
    }
}
function loadall_taikhoan()
{
    $sql = "SELECT * FROM user order by id_kh desc";
    $listaikhoan = pdo_query($sql);
    return $listaikhoan;
}
function xoatk($id_kh){
    $sql = "DELETE FROM user WHERE id_kh=" .$id_kh;
    pdo_execute($sql);
}

function loadone_taikhoan($id_kh){
    $sql = "SELECT * FROM user WHERE id_kh = ".$id_kh;
    $result = pdo_query_one($sql);
    return $result;
}
function sendMail($email)
{
    $sql = "SELECT * FROM user WHERE email='$email'";
    $user = pdo_query_one($sql);

    if ($user != false) {
        sendMailPass($email, $user['ten'], $user['pass']);

        return "gui email thanh cong";
    } else {
        return "Email bạn nhập ko có trong hệ thống";
    }
}
function update_taikhoan($id_kh,$ten,$email,$pass, $vai_tro, $phone){
        $sql=  "UPDATE `user` SET `ten` = '{$ten}',`email` = '{$email}',`pass` = '{$pass}',`vai_tro` = '{$vai_tro}',`phone` = '{$phone}' WHERE `user`.`id_kh` = $id_kh";
        pdo_execute($sql);
}

function sendMailPass($email, $username, $pass)
{
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = '6bda0a4c1abcfc';                     //SMTP username
        $mail->Password = '4430da6c8b9967';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('duanmau@example.com', 'DuAnMau');
        $mail->addAddress($email, $username);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Nguoi dung quen mat khau';
        $mail->Body = 'Mau khau cua ban la' . $pass;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>