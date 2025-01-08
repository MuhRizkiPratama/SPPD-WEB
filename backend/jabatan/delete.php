<?php
    require "../../config/connection.php";

    if (isset($_POST['delete_jabatan'])) {
        $id_jabatan = $_POST["id_jabatan"]; 

        $delete_jabatan = mysqli_query($database, "DELETE FROM jabatan WHERE id = '$id_jabatan'");

        if ($delete_jabatan) {
            header("Location: ../../pages/master_pegawai/jabatan.php");
        } else {
            echo "Data Jabatan Gagal Dihapus";
        }
    }
?>