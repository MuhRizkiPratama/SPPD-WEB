<?php
    require "../../config/connection.php";

    if (isset($_POST['update_unit_kerja'])) {
        $id_unit_kerja = $_POST["id_unit_kerja"];
        $unit_kerja = $_POST["unit_kerja"];

        $query = "UPDATE unit_kerja SET unit_kerja = '$unit_kerja' WHERE id = '$id_unit_kerja'";
        $update = mysqli_query($database, $query);

        if ($update) {
            header("Location: ../../pages/master_pegawai/unit_kerja.php");
        } else {
            echo "Data Unit Kerja Gagal Diupdate";
        }
    }
?>
