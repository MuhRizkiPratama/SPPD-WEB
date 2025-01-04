<?php
    require "../../config/connection.php";
    
    if(isset($_POST['create_penempatan'])){
        $penempatan = $_POST["penempatan"];

        $query = "INSERT INTO penempatan (penempatan) values ('$penempatan')";
        $create = mysqli_query($database, $query);

        if($create){
            header("Location: ../../pages/master_pegawai/penempatan.php");
        } else {
            echo "Data Penempatan Gagal Ditambahkan";
        }
    }
?>