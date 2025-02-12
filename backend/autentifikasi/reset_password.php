<?php
session_start();
require '../../config/connection.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../../vendor/phpmailer/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['reset_password'])) {
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['failed'] = "Format email tidak valid.";
        header("Location:../../index.php");
        exit();
    }

    $check_email = mysqli_query($database, "SELECT admin.id_admin FROM users JOIN admin ON users.id_admin = admin.id_admin WHERE admin.email = '$email'");

    if (mysqli_num_rows($check_email) > 0) {
        $user = mysqli_fetch_assoc($check_email);
        
        $newPassword = strval(rand(100000, 999999));
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        $update_password = mysqli_query($database, "UPDATE admin SET password = '$hashedPassword' WHERE email = '$email'");

        if (!$update_password) {
            $_SESSION['failed'] = "Gagal memperbarui password di database.";
            header("Location:../../index.php");
            exit();
        }

        $mail = new PHPMailer();
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'sppdkikc@gmail.com'; 
            $mail->Password   = 'xrmy bnfy lpjs vlaq';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            $mail->setFrom('sppdkikc@gmail.com', 'SPPD System');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'New Password';
            $mail->Body    = "Password baru Anda adalah: <strong>$newPassword</strong>.<br>Silakan login dan segera ubah password Anda untuk keamanan.";

            if ($mail->send()) {
                $_SESSION['success'] = "Password baru telah dikirim ke email Anda.";
            } else {
                $_SESSION['failed'] = "Gagal mengirim email: " . $mail->ErrorInfo;
            }
        } catch (Exception $e) {
            $_SESSION['failed'] = "Mailer Error: " . $mail->ErrorInfo;
        }
    } else {
        $_SESSION['failed'] = "Email tidak ditemukan.";
    }

    header("Location:../../index.php");
    exit();
}
?>
