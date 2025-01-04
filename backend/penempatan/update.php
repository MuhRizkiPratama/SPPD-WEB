<?php
    require "../../config/connection.php";

    if (isset($_POST['update_penempatan'])) {
        $id_penempatan = $_POST["id_penempatan"];
        $penempatan = $_POST["penempatan"];

        $query = "UPDATE penempatan SET penempatan = '$penempatan' WHERE id = '$id_penempatan'";
        $update = mysqli_query($database, $query);

        if ($update) {
            header("Location: ../../pages/master_pegawai/penempatan.php");
        } else {
            echo "Data Penempatan Gagal Diupdate";
        }
    }
?>