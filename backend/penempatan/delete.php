<?php
    require "../../config/connection.php";

    if (isset($_POST['delete_penempatan'])) {
        $id_penempatan = $_POST["id_penempatan"]; 

        $delete_penempatan = mysqli_query($database, "DELETE FROM penempatan WHERE id = '$id_penempatan'");

        if ($delete_penempatan) {
            header("Location: ../../pages/master_pegawai/penempatan.php");
        } else {
            echo "Data Penempatan Gagal Dihapus";
        }
    }
?>