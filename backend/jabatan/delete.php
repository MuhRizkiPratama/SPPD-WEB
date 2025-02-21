<?php
    require "../../config/connection.php";

    session_start();

    if (isset($_POST['delete_jabatan'])) {
        $id_jabatan = $_POST["id_jabatan"]; 

        $check_jabatan = mysqli_query($database, "SELECT COUNT(*) as jumlah FROM pegawai WHERE id_jabatan = '$id_jabatan'");
        $result = mysqli_fetch_assoc($check_jabatan);

        if ($result['jumlah'] > 0) {
            $_SESSION['failed'] = "Data jabatan tidak dapat dihapus karena masih digunakan oleh data pegawai.";
        } else {
            $delete_jabatan = mysqli_query($database, "DELETE FROM jabatan WHERE id_jabatan = '$id_jabatan'");
            if ($delete_jabatan) {
                $_SESSION['success'] = "Data jabatan berhasil dihapus.";
            } else {
                $_SESSION['failed'] = "Data jabatan gagal dihapus.";
            }
        }
        header("Location: ../../pages/master_pegawai/jabatan.php");
        exit();
    }
?>
