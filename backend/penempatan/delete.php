<?php
    require "../../config/connection.php";

    if (isset($_POST['delete_penempatan'])) {
        $id_penempatan = $_POST["id_penempatan"]; 

        $query = "DELETE FROM penempatan WHERE id = '$id_penempatan'";
        $delete = mysqli_query($database, $query);

        if ($delete) {
            header("Location: ../../pages/master_pegawai/penempatan.php");
        } else {
            echo "Data Penempatan Gagal Dihapus";
        }
    }
?>