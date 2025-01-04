<?php
    require "../../config/connection.php";
    
    if(isset($_POST['create_unit_kerja'])){
        $unit_kerja = $_POST["unit_kerja"];

        $query = "INSERT INTO unit_kerja (unit_kerja) values ('$unit_kerja')";
        $create = mysqli_query($database, $query);

        if($create){
            header("Location: ../../pages/master_pegawai/unit_kerja.php");
        } else {
            echo "Data Unit Kerja Gagal Ditambahkan";
        }
    }
?>