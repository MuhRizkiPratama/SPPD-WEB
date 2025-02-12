<?php
    require "../../config/connection.php";

    session_start();

    if (isset($_POST['delete_pegawai'])) {
        $id_pegawai = $_POST["id_pegawai"]; 

        $delete_pegawai = mysqli_query($database, "DELETE FROM pegawai WHERE id_pegawai = '$id_pegawai'");

        if ($delete_pegawai) {
            $_SESSION['success'] = "Data pegawai berhasil dihapus.";
            header("Location:../../pages/master_pegawai/pegawai.php");
            exit();
        } else {
            $_SESSION['failed'] = "Data pegawai gagal dihapus.";
            header("Location:../../pages/master_pegawai/pegawai.php");
            exit();
        }
    }
?>