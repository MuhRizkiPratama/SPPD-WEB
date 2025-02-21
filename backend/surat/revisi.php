<?php
    require "../../config/connection.php";

    session_start();

    if(isset($_POST['revisi'])){
        $id_riwayat = $_POST['id_riwayat'];
        $id_pengajuan = $_POST['id_pengajuan'];
        $uang_saku = $_POST['uang_saku'];
        $tujuan = $_POST['tujuan'];
        $tanggal_berangkat = $_POST['tanggal_berangkat'];
        $tanggal_kembali = $_POST['tanggal_kembali'];
        $tugas = $_POST['tugas'];
        $pemberi_perintah = $_POST['pemberi_perintah'];
        $laporan_perjalanan = $_POST['laporan_perjalanan'];
        $biaya_penginapan = $_POST['biaya_penginapan'];
        $biaya_tol = $_POST['biaya_tol'];
        $biaya_bahan_bakar = $_POST['biaya_bahan_bakar'];
        $biaya_lain = $_POST['biaya_lain'];

        $date1 = strtotime($tanggal_berangkat);
        $date2 = strtotime($tanggal_kembali);
        $jumlah_hari = ($date2 - $date1) / (60 * 60 * 24);
        $jumlah_hari = $jumlah_hari == 0 ? 1 : $jumlah_hari;

        $jumlah_uang_saku = $jumlah_hari * $uang_saku;
        $total_biaya = $jumlah_uang_saku + $biaya_penginapan + $biaya_tol + $biaya_bahan_bakar + $biaya_lain;

        function uploadFile($file, $dir, $existingFile) {
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
                    header("Location: ../../pages/manajemen_surat/riwayat_pengajuan_pegawai.php");
                    exit();
                }
            }
            return $existingFile;
        }

        $select_bukti = mysqli_query($database, "SELECT bukti_penginapan, bukti_tol, bukti_bahan_bakar, bukti_lain FROM pengajuan_sppd WHERE id_pengajuan = '$id_pengajuan'");
        $bukti_biaya = mysqli_fetch_assoc($select_bukti);

        $bukti_penginapan_path = uploadFile($_FILES['bukti_penginapan'], "../../assets/bukti biaya/penginapan/", $bukti_biaya['bukti_penginapan']);
        $bukti_tol_path = uploadFile($_FILES['bukti_tol'], "../../assets/bukti biaya/tol/", $bukti_biaya['bukti_tol']);
        $bukti_bahan_bakar_path = uploadFile($_FILES['bukti_bahan_bakar'], "../../assets/bukti biaya/bahan bakar/", $bukti_biaya['bukti_bahan_bakar']);
        $bukti_lain_path = uploadFile($_FILES['bukti_lain'], "../../assets/bukti biaya/lain lain/", $bukti_biaya['bukti_lain']);

        $update_pengajuan = mysqli_query($database, "UPDATE pengajuan_sppd SET tujuan = '$tujuan', tanggal_berangkat = '$tanggal_berangkat', tanggal_kembali = '$tanggal_kembali', tugas = '$tugas', pemberi_perintah = '$pemberi_perintah', jumlah_hari = '$jumlah_hari', laporan_perjalanan = '$laporan_perjalanan', biaya_penginapan = '$biaya_penginapan', biaya_tol = '$biaya_tol', biaya_bahan_bakar = '$biaya_bahan_bakar', biaya_lain = '$biaya_lain', total_biaya = '$total_biaya', bukti_penginapan = '$bukti_penginapan_path', bukti_tol =  '$bukti_tol_path', bukti_bahan_bakar = '$bukti_bahan_bakar_path', bukti_lain = '$bukti_lain_path' WHERE id_pengajuan = '$id_pengajuan'");

        $update_status = mysqli_query($database, "UPDATE riwayat_pengajuan SET status_pengajuan = 'Pending', keterangan = NULL, id_verifikator = NULL WHERE id_riwayat = '$id_riwayat'");
        
        if ($update_pengajuan && $update_status) {
            $_SESSION['success'] = "Pengajuan berhasil diupdate";
            header("Location:../../pages/manajemen_surat/riwayat_pengajuan_pegawai.php");
            exit();
        } else {
            $_SESSION['failed'] = "Pengajuan Gagal diupdate";
            header("Location:../../pages/manajemen_surat/riwayat_pengajuan_pegawai.php");
            exit();
        }
    }
?>
