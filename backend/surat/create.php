<?php 
    require "../../config/connection.php";
    session_start();

    if(isset($_POST['create_surat'])){
        $id_pegawai = $_SESSION['detail_pegawai']['id_pegawai'];
        $uang_saku = $_POST['uang_saku'];
        $tujuan = $_POST['tujuan'];
        $pemberi_perintah = $_POST['pemberi_perintah'];
        $tanggal_berangkat = $_POST['tanggal_berangkat'];
        $tanggal_kembali = $_POST['tanggal_kembali'];
        $tugas = $_POST['tugas'];
        $laporan = $_POST['laporan_perjalanan'];
        $biaya_penginapan = $_POST['biaya_penginapan'];
        $biaya_tol = $_POST['biaya_tol'];
        $biaya_bahan_bakar = $_POST['biaya_bahan_bakar'];
        $biaya_lain = $_POST['biaya_lain'];

        $date1 = strtotime($tanggal_berangkat);
        $date2 = strtotime($tanggal_kembali);
        $jumlah_hari = ($date2 - $date1) / (60 * 60 * 24);

        if ($jumlah_hari == 0) {
            $jumlah_hari = 1;
        }

        $jumlah_uang_saku = $jumlah_hari * $uang_saku;
        $total_biaya = $jumlah_uang_saku + $biaya_penginapan + $biaya_tol + $biaya_bahan_bakar + $biaya_lain;

        function uploadFile($file, $dir) {
            $allowed_extensions = ['jpg', 'jpeg', 'png'];
            
            if (!empty($file['name'])) {
                $file_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

                if (in_array($file_ext, $allowed_extensions)) {
                    $file_name = time() . '-' . md5(rand()) . '.' . $file_ext;
                    $file_path = $dir . $file_name;
                    move_uploaded_file($file['tmp_name'], $file_path);
                    return $file_path;
                } else {
                    $_SESSION['failed'] = "Format file bukti tidak diizinkan! Hanya JPG, JPEG, dan PNG.";
                    header("Location: ../../pages/manajemen_surat/pengajuan.php");
                    exit();
                }
            }
            return NULL;
        }

        $bukti_penginapan_path = uploadFile($_FILES['bukti_penginapan'], "../../assets/bukti biaya/penginapan/");
        $bukti_tol_path = uploadFile($_FILES['bukti_tol'], "../../assets/bukti biaya/tol/");
        $bukti_bahan_bakar_path = uploadFile($_FILES['bukti_bahan_bakar'], "../../assets/bukti biaya/bahan bakar/");
        $bukti_lain_path = uploadFile($_FILES['bukti_lain'], "../../assets/bukti biaya/lain lain/");

        $create_surat = mysqli_query($database, "INSERT INTO pengajuan_sppd 
            (id_pegawai, tujuan, pemberi_perintah, jumlah_hari, tanggal_berangkat, tanggal_kembali, tugas, laporan_perjalanan, biaya_penginapan, biaya_tol, biaya_bahan_bakar, biaya_lain, total_biaya, bukti_penginapan, bukti_tol, bukti_bahan_bakar, bukti_lain) 
            VALUES ('$id_pegawai', '$tujuan', '$pemberi_perintah', '$jumlah_hari', '$tanggal_berangkat', '$tanggal_kembali', '$tugas', '$laporan', '$biaya_penginapan', '$biaya_tol', '$biaya_bahan_bakar', '$biaya_lain', '$total_biaya', '$bukti_penginapan_path', '$bukti_tol_path', '$bukti_bahan_bakar_path', '$bukti_lain_path')");

        if($create_surat){
            $id_pengajuan = mysqli_insert_id($database);
            $create_riwayat = mysqli_query($database, "INSERT INTO riwayat_pengajuan (id_pengajuan) VALUES ('$id_pengajuan')");

            $_SESSION['success'] = "SPPD berhasil diajukan.";
            header("Location: ../../pages/manajemen_surat/pengajuan.php");
            exit();
        } else {
            $_SESSION['failed'] = "SPPD gagal diajukan.";
            header("Location: ../../pages/manajemen_surat/pengajuan.php");
            exit();
        }
    }
?>
