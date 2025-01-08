<?php
    require "../../config/connection.php";

    if (isset($_POST['delete_unit_kerja'])) {
        $id_unit_kerja = $_POST["id_unit_kerja"]; 

        $delete_unit_kerja = mysqli_query($database, "DELETE FROM unit_kerja WHERE id = '$id_unit_kerja'");

        if ($delete_unit_kerja) {
            header("Location: ../../pages/master_pegawai/unit_kerja.php");
        } else {
            echo "Data Unit Kerja Gagal Dihapus";
        }
    }
?>