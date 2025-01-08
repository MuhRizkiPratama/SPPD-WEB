<?php
    require "../../config/connection.php";

    if (isset($_POST['update_jabatan'])) {
        $id_jabatan = $_POST["id_jabatan"];
        $jabatan = $_POST["jabatan"];

        $update_jabatan = mysqli_query($database, "UPDATE jabatan SET jabatan = '$jabatan' WHERE id = '$id_jabatan'");

        if ($update_jabatan) {
            header("Location: ../../pages/master_pegawai/jabatan.php");
        } else {
            echo "Data Jabatan Gagal Diupdate";
        }
    }
?>
