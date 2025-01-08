<?php
    require "../../config/connection.php";
    
    if(isset($_POST['create_unit_kerja'])){
        $unit_kerja = $_POST["unit_kerja"];

        $create_unit_kerja = mysqli_query($database, "INSERT INTO unit_kerja (unit_kerja) values ('$unit_kerja')");

        if($create_unit_kerja){
            header("Location: ../../pages/master_pegawai/unit_kerja.php");
        } else {
            echo "Data Unit Kerja Gagal Ditambahkan";
        }
    }
?>