<?php
    require "../../config/connection.php";

    session_start();

    if (isset($_POST['delete_admin'])) {
        $id_admin = $_POST["id_admin"]; 

        $delete_admin = mysqli_query($database, "DELETE FROM admin WHERE id_admin = '$id_admin'");

        if ($delete_admin) {
            $_SESSION['success'] = "Data admin berhasil dihapus.";
            header("Location:../../pages/users/admin.php");
        } else {
            $_SESSION['failed'] = "Data admin berhasil dihapus.";
            header("Location:../../pages/users/admin.php");
        }
    }
?>