<?php
    require "../../config/connection.php";

    function list_jabatan(){
        global $database;
        $query = "SELECT * FROM jabatan";
        $result = mysqli_query ($database, $query);
        $list = [];
        while ($data = mysqli_fetch_assoc($result)){
            $list [] = $data;

        }
        return $list;
    }
?>