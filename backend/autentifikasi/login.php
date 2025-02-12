<?php
    require "../../config/connection.php";

    session_start();

    if(isset($_POST['login_admin'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $check_admin = mysqli_query($database, "SELECT users.id_admin, users.role, admin.nama_admin, admin.email, admin.password FROM users JOIN admin ON users.id_admin = admin.id_admin WHERE admin.email = '$email'");

        if(mysqli_num_rows($check_admin) > 0) {
            $user = mysqli_fetch_assoc($check_admin);
            
            if(password_verify($password, $user['password'])) {

                $_SESSION['id_admin'] = $user['id_admin'];
                $_SESSION['role'] = $user['role'];

                header("Location:../../pages/dashboard/dashboard.php");
            } else {
                $_SESSION['failed'] = "Email Atau Password Salah";
                header("Location:../../index.php");
                exit();
            }
        } else {
            $_SESSION['failed'] = "User tidak ditemukan.";
            header("Location:../../index.php");
            exit();
        }
    }

    if(isset($_POST['login_pegawai'])) {
        $no_badge = $_POST['no_badge'];
        $tanggal_lahir = $_POST['tanggal_lahir'];

        $check_pegawai = mysqli_query($database,"SELECT users.id_pegawai, users.role, pegawai.no_badge, pegawai.tanggal_lahir, pegawai.nama_pegawai, pegawai.uang_saku, jabatan.nama_jabatan, unit_kerja.nama_unit_kerja FROM users JOIN pegawai ON users.id_pegawai = pegawai.id_pegawai LEFT JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan LEFT JOIN unit_kerja ON pegawai.id_unit_kerja = unit_kerja.id_unit_kerja  WHERE pegawai.no_badge = '$no_badge' AND pegawai.tanggal_lahir = '$tanggal_lahir'");

        if(mysqli_num_rows($check_pegawai) > 0) {
            $user = mysqli_fetch_assoc($check_pegawai);
    
            $_SESSION['detail_pegawai'] = $user;
            $_SESSION['id_pegawai'] = $user['id_pegawai'];
            $_SESSION['role'] = $user['role'];
    
            header("Location:../../pages/dashboard/dashboard.php");
            exit();
        } else {
            $_SESSION['failed'] = "Nomor badge atau tanggal lahir salah.";
            header("Location:../../index.php");
            exit();
        }
    }
?>