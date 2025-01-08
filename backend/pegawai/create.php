<?php
    require "../../config/connection.php";

    if(isset($_POST['create_pegawai'])){
        $no_badge = $_POST['no_badge'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $uang_saku = $_POST['uang_saku'];
        $jabatan = $_POST['id_jabatan'];
        $unit_kerja = $_POST['id_unit_kerja'];
        $penempatan = $_POST['id_penempatan'];
        
        $create_pegawai = mysqli_query($database, "INSERT INTO pegawai (no_badge, tanggal_lahir, nama_lengkap, uang_saku, id_jabatan, id_unit_kerja, id_penempatan) VALUES ('$no_badge', '$tanggal_lahir', '$nama_lengkap', '$uang_saku', '$jabatan', '$unit_kerja', '$penempatan')");
        
        if ($create_pegawai){
            $id_pegawai = mysqli_insert_id($database);

            $create_users = mysqli_query($database, "INSERT INTO users (id_pegawai, role) VALUES ('$id_pegawai', 'pegawai')");

            if ($create_users){
                header("Location:../../pages/master_pegawai/pegawai.php");
            } else {
                echo "Gagal Menambahkan Data Users";
            }
        } else{
            echo "Gagal Menambahkan Data Pegawai";
        }
    }
?>