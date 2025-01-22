<?php
    require "../../config/connection.php";

    session_start();

    if (isset($_POST['create_admin'])) {
        $nama_admin = $_POST['nama_admin'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $check_email = mysqli_query($database, "SELECT * FROM admin WHERE email = '$email'");

        if(mysqli_num_rows($check_email) > 0) {
            $_SESSION['failed'] = "Email sudah digunakan, silakan gunakan email lain.";
            header("Location: ../../pages/users/admin.php");
            exit();
        } else {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $create_admin = mysqli_query($database, "INSERT INTO admin (nama_admin, email, password) VALUES ('$nama_admin', '$email', '$hashed_password')");

            if($create_admin) {
                $id_admin = mysqli_insert_id($database);

                $create_users = mysqli_query($database, "INSERT INTO users (id_admin, role) VALUES ('$id_admin', 'admin')");

                $_SESSION['success'] = "Data admin berhasil ditambahkan.";
                header("Location: ../../pages/users/admin.php");
                exit();
            } else {
                $_SESSION['failed'] = "Data Admin Gagal Ditambahkan.";
                header("Location: ../../pages/users/admin.php");
            }
        }
    }
?>