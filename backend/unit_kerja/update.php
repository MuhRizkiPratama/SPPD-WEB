<?php
    require "../../config/connection.php";

    session_start();

    if (isset($_POST['update_unit_kerja'])) {
        $id_unit_kerja = $_POST["id_unit_kerja"];
        $nama_unit_kerja = $_POST["nama_unit_kerja"];

        $update_unit_kerja = mysqli_query($database, "UPDATE unit_kerja SET nama_unit_kerja = '$nama_unit_kerja' WHERE id_unit_kerja = '$id_unit_kerja'");

        if ($update_unit_kerja) {
            $_SESSION['success'] = "Data unit kerja berhasil diedit.";
            header("Location:../../pages/master_pegawai/unit_kerja.php");
        } else {
            $_SESSION['failed'] = "Data unit kerja gagal diedit.";
            header("Location:../../pages/master_pegawai/unit_kerja.php");
        }
    }
?>
