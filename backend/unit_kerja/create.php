<?php
    require "../../config/database.php";
    
    if(isset($_POST['createUnitkerja'])){
        $unit_kerja = $_POST["unit_kerja"];

        $query = "INSERT INTO unit_kerja (unit_kerja) values ('$unit_kerja')";
        $create = mysqli_query($database, $query);

        if($unit_kerja){
            header("Location: ../../pages/pegawai/unit_kerja.php");
        } else {
            echo "Data unit kerja gagal ditambahkan";
        }
    }
?>