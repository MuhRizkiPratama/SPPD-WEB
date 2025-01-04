<?php
    require "../../config/connection.php";

    if (isset($_POST['update_jabatan'])) {
        $id_jabatan = $_POST["id_jabatan"];
        $jabatan = $_POST["jabatan"];

        $query = "UPDATE jabatan SET jabatan = '$jabatan' WHERE id = '$id_jabatan'";
        $update = mysqli_query($database, $query);

        if ($update) {
            header("Location: ../../pages/master_pegawai/jabatan.php");
        } else {
            echo "Data Jabatan Gagal Diupdate";
        }
    }
?>
