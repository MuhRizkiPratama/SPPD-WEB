<?php
    require "../../config/connection.php";

    if (isset($_POST['delete_jabatan'])) {
        $id_jabatan = $_POST["id_jabatan"]; 

        $query = "DELETE FROM jabatan WHERE id = '$id_jabatan'";
        $delete = mysqli_query($database, $query);

        if ($delete) {
            header("Location: ../../pages/master_pegawai/jabatan.php");
        } else {
            echo "Data Jabatan Gagal Dihapus";
        }
    }
?>