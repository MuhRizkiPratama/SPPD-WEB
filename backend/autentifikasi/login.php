<?php
    require "../../config/connection.php";

    session_start();

    if (isset($_POST['login_admin'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT users.id_admin, users.role, admin.nama_lengkap, admin.email, admin.password FROM users JOIN admin ON users.id_admin = admin.id WHERE admin.email = '$email'";

        $result = mysqli_query($database, $query);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            
            if (password_verify($password, $user['password'])) {
                
                $_SESSION['user'] = $user;
                $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
                $_SESSION['role'] = $user['role'];

                header("Location: ../../pages/dashboard/dashboard.php");
            } else {
                echo "Email Atau Password Salah.";
            }
        } else {
            echo "User Tidak Ditemukan.";
        }
    }

    if (isset($_POST['login_pegawai'])) {
        $no_badge = $_POST['no_badge'];
        $tanggal_lahir = $_POST['tanggal_lahir'];

        $query = "SELECT users.id_pegawai, users.role, pegawai.no_badge, pegawai.tanggal_lahir, pegawai.nama_lengkap, pegawai.uang_saku, jabatan.jabatan AS jabatan, unit_kerja.unit_kerja AS unit_kerja FROM users JOIN pegawai ON users.id_pegawai LEFT JOIN jabatan ON pegawai.id_jabatan = jabatan.id LEFT JOIN unit_kerja ON pegawai.id_unit_kerja = unit_kerja.id  WHERE pegawai.no_badge = '$no_badge' AND pegawai.tanggal_lahir = '$tanggal_lahir'";

        $result = mysqli_query($database, $query);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
    
            $_SESSION['pegawai'] = $user;
            $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
            $_SESSION['role'] = $user['role'];
    
            header("Location: ../../pages/dashboard/dashboard.php");
        } else {
            echo "Nomor Badge atau Tanggal Lahir Salah.";
        }
    }
?>