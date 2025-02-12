<?php
    require "../../config/connection.php";
    session_start();

    if (isset($_POST['update_admin'])) {
        $id_admin = $_POST["id_admin"];
        $nama_admin = $_POST["nama_admin"];
        $email = $_POST["email"];
        $password_lama = $_POST["password_lama"];
        $password_baru = $_POST["password_baru"];

        $check_email = mysqli_query($database, "SELECT * FROM admin WHERE email = '$email' AND id_admin != '$id_admin'");

        if (mysqli_num_rows($check_email) > 0) {
            $_SESSION['failed'] = "Email sudah digunakan, silakan gunakan email lain.";
            header("Location: ../../pages/users/admin.php");
            exit();
        }

        $select_admin = mysqli_query($database, "SELECT password FROM admin WHERE id_admin = '$id_admin'");
        $admin = mysqli_fetch_assoc($select_admin);

        if (!$admin) {
            $_SESSION['failed'] = "Admin tidak ditemukan.";
            header("Location: ../../pages/users/admin.php");
            exit();
        }

        if (!password_verify($password_lama, $admin['password'])) {
            $_SESSION['failed'] = "Password lama salah, data admin gagal diedit!";
            header("Location: ../../pages/users/admin.php");
            exit();
        }

        if (!empty($password_baru)) {
            $hashed_password = password_hash($password_baru, PASSWORD_BCRYPT);
        } else {
            $hashed_password = $admin['password'];
        }

        $update_admin = mysqli_query($database, "UPDATE admin SET nama_admin = '$nama_admin', email = '$email', password = '$hashed_password' WHERE id_admin = '$id_admin'");

        if ($update_admin) {
            $_SESSION['success'] = "Data admin berhasil diedit.";
        } else {
            $_SESSION['failed'] = "Data admin gagal diedit.";
        }

        header("Location: ../../pages/users/admin.php");
        exit();
    }
?>
