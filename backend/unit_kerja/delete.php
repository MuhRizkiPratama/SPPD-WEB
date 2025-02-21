<?php
    require "../../config/connection.php";

    session_start();

    if (isset($_POST['delete_unit_kerja'])) {
        $id_unit_kerja = $_POST["id_unit_kerja"]; 

        $check_unit_kerja = mysqli_query($database, "SELECT COUNT(*) as jumlah FROM pegawai WHERE id_unit_kerja = '$id_unit_kerja'");
        $result = mysqli_fetch_assoc($check_unit_kerja);

        if ($result['jumlah'] > 0) {
            $_SESSION['failed'] = "Data unit kerja tidak dapat dihapus karena masih digunakan oleh data pegawai.";
        } else {
            $delete_unit_kerja = mysqli_query($database, "DELETE FROM unit_kerja WHERE id_unit_kerja = '$id_unit_kerja'");
            if ($delete_unit_kerja) {
                $_SESSION['success'] = "Data unit kerja berhasil dihapus.";
            } else {
                $_SESSION['failed'] = "Data unit kerja gagal dihapus.";
            }
        }
        header("Location: ../../pages/master_pegawai/unit_kerja.php");
        exit();
    }
?>