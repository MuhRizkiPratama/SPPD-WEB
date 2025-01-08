<?php
    require "../../config/connection.php";

    if (isset($_POST['update_penempatan'])) {
        $id_penempatan = $_POST["id_penempatan"];
        $penempatan = $_POST["penempatan"];

        $update_penempatan = mysqli_query($database, "UPDATE penempatan SET penempatan = '$penempatan' WHERE id = '$id_penempatan'");

        if ($update_penempatan) {
            header("Location: ../../pages/master_pegawai/penempatan.php");
        } else {
            echo "Data Penempatan Gagal Diupdate";
        }
    }
?>