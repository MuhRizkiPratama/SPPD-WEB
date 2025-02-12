<?php
    require "../../config/connection.php";

    session_start();

    if (isset($_POST['delete_unit_kerja'])) {
        $id_unit_kerja = $_POST["id_unit_kerja"]; 

        $delete_unit_kerja = mysqli_query($database, "DELETE FROM unit_kerja WHERE id_unit_kerja = '$id_unit_kerja'");

        if ($delete_unit_kerja) {
            $_SESSION['success'] = "Data unit kerja berhasil dihapus.";
            header("Location:../../pages/master_pegawai/unit_kerja.php");
            exit();
        } else {
            $_SESSION['failed'] = "Data unit kerja berhasil dihapus.";
            header("Location:../../pages/master_pegawai/unit_kerja.php");
            exit();
        }
    }
?>