<?php
    require "../../config/connection.php";
    
    if(isset($_POST['create_jabatan'])){
        $jabatan = $_POST["jabatan"];

        $create_jabatan = mysqli_query($database, "INSERT INTO jabatan (jabatan) values ('$jabatan')");

        if($create_jabatan){
            header("Location: ../../pages/master_pegawai/jabatan.php");
        } else {
            echo "Data Jabatan Gagal Ditambahkan";
        }
    }
?>