<?php
    require "../../config/connection.php";

    session_start();

    if (isset($_POST['delete_jabatan'])) {
        $id_jabatan = $_POST["id_jabatan"]; 

        $delete_jabatan = mysqli_query($database, "DELETE FROM jabatan WHERE id_jabatan = '$id_jabatan'");

        if ($delete_jabatan){
            $_SESSION['success'] = "Data jabatan berhasil dihapus.";
            header("Location:../../pages/master_pegawai/jabatan.php");
            exit();
        } else {
            $_SESSION['failed'] = "Data jabatan gagal dihapus.";
            header("Location:../../pages/master_pegawai/jabatan.php");
            exit();
        }
    }
?>