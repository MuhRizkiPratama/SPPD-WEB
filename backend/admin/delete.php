<?php
    require "../../config/connection.php";
    session_start();

    if (isset($_POST['delete_admin'])) {
        $id_admin = $_POST["id_admin"]; 

        $check_admin = mysqli_query($database, "SELECT COUNT(*) as jumlah FROM riwayat_pengajuan WHERE id_verifikator = '$id_admin'");
        $result = mysqli_fetch_assoc($check_admin);

        if ($result['jumlah'] > 0) {
            $_SESSION['failed'] = "Data admin tidak dapat dihapus karena masih digunakan oleh data riwayat pengajuan.";
        } else {
            $delete_admin = mysqli_query($database, "DELETE FROM admin WHERE id_admin = '$id_admin'");
            if ($delete_admin) {
                $_SESSION['success'] = "Data admin berhasil dihapus.";
            } else {
                $_SESSION['failed'] = "Data admin gagal dihapus.";
            }
        }
        header("Location: ../../pages/users/admin.php");
        exit();
    }
?>
