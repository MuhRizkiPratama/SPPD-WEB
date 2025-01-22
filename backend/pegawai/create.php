<?php
    require "../../config/connection.php";
    session_start();

    if(isset($_POST['create_pegawai'])){
        $no_badge = $_POST['no_badge'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $nama_pegawai = $_POST['nama_pegawai'];
        $uang_saku = $_POST['uang_saku'];
        $jabatan = $_POST['id_jabatan'];
        $unit_kerja = $_POST['id_unit_kerja'];

        $check_no_badge = mysqli_query($database, "SELECT * FROM pegawai WHERE no_badge = '$no_badge'");

        if(mysqli_num_rows($check_no_badge) > 0){
            $_SESSION['failed'] = "No badge sudah digunakan, Silahkan menggunakan no badge yang lain.";
            header("Location:../../pages/master_pegawai/pegawai.php");
        } else {
            $create_pegawai = mysqli_query($database, "INSERT INTO pegawai (no_badge, tanggal_lahir, nama_pegawai, uang_saku, id_jabatan, id_unit_kerja) VALUES ('$no_badge', '$tanggal_lahir', '$nama_pegawai', '$uang_saku', '$jabatan', '$unit_kerja')");
        
            if ($create_pegawai){
                $id_pegawai = mysqli_insert_id($database);

                $create_users = mysqli_query($database, "INSERT INTO users (id_pegawai, role) VALUES ('$id_pegawai', 'pegawai')");

                if ($create_users){
                    $_SESSION['success'] = "Data users pegawai berhasil ditambahkan.";
                    header("Location:../../pages/master_pegawai/pegawai.php");
                } else {
                    $_SESSION['failed'] = "Gagal menambahkan data users pegawai";
                    header("Location:../../pages/master_pegawai/pegawai.php");
                }
            } else{
                $_SESSION['failed'] = "Gagal menambahkan data pegawai";
                header("Location:../../pages/master_pegawai/pegawai.php");
            }
        }
    }
?>