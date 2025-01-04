<?php
    require "../../config/connection.php";

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = $query = "SELECT users.id_admin, users.role, admin.email, admin.password FROM users JOIN admin ON users.id_admin = admin.id WHERE admin.email = '$email'";

        $result = mysqli_query($database, $query);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['admin_id'] = $user['id_admin'];
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $user['role'];

                header("Location: ../../pages/dashboard/dashboard.php");
            } else {
                echo "Email Atau Password Salah.";
            }
        } else {
            echo "User Tidak Ditemukan.";
        }
    }
?>
