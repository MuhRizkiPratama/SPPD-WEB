<?php
    require "../../config/connection.php";
    
    if(isset($_POST['create_penempatan'])){
        $penempatan = $_POST["penempatan"];

        $create_penempatan = mysqli_query($database, "INSERT INTO penempatan (penempatan) values ('$penempatan')");

        if($create_penempatan){
            header("Location: ../../pages/master_pegawai/penempatan.php");
        } else {
            echo "Data Penempatan Gagal Ditambahkan";
        }
    }
?>