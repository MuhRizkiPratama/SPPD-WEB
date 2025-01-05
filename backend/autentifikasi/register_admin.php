<?php
    require "../../config/connection.php";

    if(isset($_POST['register_admin'])){
        $nama_lengkap = $_POST['nama_lengkap'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO admin (nama_lengkap, email, password) VALUES ('$nama_lengkap', '$email', '$hashed_password')";
        $create = mysqli_query($database, $query);

        if($create){
            $user = mysqli_insert_id($database);

            $createUser = mysqli_query($database, "INSERT INTO users (id_admin, role) VALUES ('$user', 'admin')");
            header("Location: ../../pages/admin/create.php");
        } else {
            echo "Data Admin Gagal Ditambahkan.";
        }
    }
?>