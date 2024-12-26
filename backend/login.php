<?php
    require "../config/database.php";

    if(isset($_POST['login'])){
        $no_badge = $_POST['no_badge'];
        $tanggal_lahir = $_POST['tanggal_lahir'];

        $connect = mysqli_query($database, "SELECT * FROM users where no_badge = '$no_badge' and tanggal_lahir = '$tanggal_lahir'");

        if(mysqli_num_rows($connect) > 0){
            $user = mysqli_fetch_assoc($connect);

            if($tanggal_lahir === $user['tanggal_lahir']){

                $id = $user['id'];
                $nama = $user['nama'];
                $role = $user['role'];
    
                $_SESSION['nama'] = $nama;
                $_SESSION['role'] = $role;
    
                if($role === 'pegawai'){
                    header ("Location: ../pages/dashboard/dashboard.php");
                } else {
                    header ("Location: ../index.php");
                }
            }
        }
    }
?>