<?php
    require "../../config/connection.php";

    session_start();
    
    if(isset($_POST['create_unit_kerja'])){
        $nama_unit_kerja = $_POST["nama_unit_kerja"];

        $create_unit_kerja = mysqli_query($database, "INSERT INTO unit_kerja (nama_unit_kerja) values ('$nama_unit_kerja')");

        if($create_unit_kerja){
            $_SESSION['success'] = "Data unit kerja berhasil ditambahkan.";
            header("Location:../../pages/master_pegawai/unit_kerja.php");
        } else {
            $_SESSION['failed'] = "Data unit kerja gagal ditambahkan.";
            header("Location:../../pages/master_pegawai/unit_kerja.php");
        }
    }
?>