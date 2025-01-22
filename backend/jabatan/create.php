<?php
    require "../../config/connection.php";

    session_start();
    
    if(isset($_POST['create_jabatan'])){
        $nama_jabatan = $_POST["nama_jabatan"];

        $create_jabatan = mysqli_query($database, "INSERT INTO jabatan (nama_jabatan) values ('$nama_jabatan')");

        if($create_jabatan){
            $_SESSION['success'] = "Data jabatan berhasil ditambahkan.";
            header("Location:../../pages/master_pegawai/jabatan.php");
        } else {
            $_SESSION['failed'] = "Data jabatan gagal ditambahkan.";
            header("Location:../../pages/master_pegawai/jabatan.php");
        }
    }
?>