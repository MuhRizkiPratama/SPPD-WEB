<?php
    require "../../config/connection.php";

    session_start();

    if(isset($_POST['update_admin'])) {
        $id_admin = $_POST["id_admin"];
        $nama_admin = $_POST["nama_admin"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $check_email = mysqli_query($database, "SELECT * FROM admin WHERE email = '$email' AND id_admin != '$id_admin'");

        if(mysqli_num_rows($check_email) > 0) {
            $_SESSION['failed'] = "Email sudah digunakan, silakan gunakan email lain.";
            header("Location: ../../pages/users/admin.php");
            exit();
        } else {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $update_admin = mysqli_query($database, "UPDATE admin SET nama_admin = '$nama_admin', email = '$email', password = '$hashed_password' WHERE id_admin = '$id_admin'");
    
            if($update_admin) {
                $_SESSION['success'] = "Data admin berhasil diedit.";
                header("Location:../../pages/users/admin.php");
            } else {
                $_SESSION['failed'] = "Data admin gagal diedit.";
                header("Location:../../pages/users/admin.php");
            }
        }
    }
?>
