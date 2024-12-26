<?php
    require "../../config/database.php";

    function showPegawai(){
        global $database;
        $result = mysqli_query($database, "SELECT * FROM pegawai JOIN unit_kerja");
        $pegawai = [];
        while($data = mysqli_fetch_assoc($result)){
            $pegawai [] = $data;
        }
        return $pegawai; 
    }
?>