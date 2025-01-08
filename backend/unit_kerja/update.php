<?php
    require "../../config/connection.php";

    if (isset($_POST['update_unit_kerja'])) {
        $id_unit_kerja = $_POST["id_unit_kerja"];
        $unit_kerja = $_POST["unit_kerja"];

        $update_unit_kerja = mysqli_query($database, "UPDATE unit_kerja SET unit_kerja = '$unit_kerja' WHERE id = '$id_unit_kerja'");

        if ($update_unit_kerja) {
            header("Location: ../../pages/master_pegawai/unit_kerja.php");
        } else {
            echo "Data Unit Kerja Gagal Diupdate";
        }
    }
?>
