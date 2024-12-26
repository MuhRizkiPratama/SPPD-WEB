<?php
    require "../../config/connection.php";
    
    if(isset($_POST['create_jabatan'])){
        $jabatan = $_POST["jabatan"];

        $query = "INSERT INTO jabatan (jabatan) values ('$jabatan')";
        $create = mysqli_query($database, $query);

        if($jabatan){
            header("Location: ../../pages/master_pegawai/jabatan.php");
        } else {
            echo "Data Jabatan Gagal Ditambahkan";
        }
    }
?>