<?php
    require "../../config/connection.php";

    if (isset($_POST['delete_unit_kerja'])) {
        $id_unit_kerja = $_POST["id_unit_kerja"]; 

        $query = "DELETE FROM unit_kerja WHERE id = '$id_unit_kerja'";
        $delete = mysqli_query($database, $query);

        if ($delete) {
            header("Location: ../../pages/master_pegawai/unit_kerja.php");
        } else {
            echo "Data Unit Kerja Gagal Dihapus";
        }
    }
?>