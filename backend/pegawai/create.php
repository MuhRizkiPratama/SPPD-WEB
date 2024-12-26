<?php
    require "../../config/connection.php";

    if(isset($_POST['create'])){
        $no_badge = $_POST['no_badge'];
        $nama_pegawai = $_POST['nama_pegawai'];
        $unit_kerja = $_POST['id_unit_kerja'];
        $no_telepon = $_POST['no_telepon'];
        $alamat = $_POST['alamat'];

        $query = "INSERT INTO pegawai (no_badge, nama_pegawai, unit_kerja, no_telepon, alamat) VALUES ('$no_badge', '$nama_pegawai', '$unit_kerja', '$no_telepon', '$alamat')";
        $create = mysqli_query($database, $query);

        if($create){
            header("Location: ../../pages/pegawai/pegawai.php");
        } else{
            
        }
    }
?>