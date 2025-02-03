<?php
    require "../../config/connection.php";
    require "../../vendor/autoload.php";

    use PhpOffice\PhpWord\TemplateProcessor;

    if(isset($_POST['print'])) {
        $id_sppd = $_POST['id_sppd']; 

        $select_sppd = "SELECT * FROM sppd_terverifikasi JOIN pengajuan_sppd ON sppd_terverifikasi.id_pengajuan = pengajuan_sppd.id_pengajuan LEFT JOIN pegawai ON pengajuan_sppd.id_pegawai = pegawai.id_pegawai LEFT JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan LEFT JOIN unit_kerja ON pegawai.id_unit_kerja = unit_kerja.id_unit_kerja WHERE sppd_terverifikasi.id_sppd = '$id_sppd'";
                    
        $result = mysqli_query($database, $select_sppd);

        if ($result && mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);

            $template_surat = '../../assets/template surat/SPPD.docx';

            if (file_exists($template_surat)) {
                $template = new \PhpOffice\PhpWord\TemplateProcessor($template_surat);

                $total_uang_saku = $data['jumlah_hari'] * $data['uang_saku'];

                $template->setValue('no_surat', $data['no_surat']);
                $template->setValue('no_badge', $data['no_badge']);
                $template->setValue('nama_pegawai', $data['nama_pegawai']);
                $template->setValue('jabatan', $data['nama_jabatan']);
                $template->setValue('unit_kerja', $data['nama_unit_kerja']);
                $template->setValue('tujuan', $data['tujuan']);
                $template->setValue('berangkat', $data['tanggal_berangkat']);
                $template->setValue('kembali', $data['tanggal_kembali']);
                $template->setValue('tugas', $data['tugas']);
                $template->setValue('pemberi_perintah', $data['pemberi_perintah']);
                $template->setValue('laporan_perjalanan', $data['laporan_perjalanan']);
                $template->setValue('hari', $data['jumlah_hari']);
                $template->setValue('uang_saku', $data['uang_saku']);
                $template->setValue('total_uang_saku', $total_uang_saku);
                $template->setValue('biaya_penginapan', $data['biaya_penginapan']);
                $template->setValue('biaya_bahan_bakar', $data['biaya_bahan_bakar']);
                $template->setValue('biaya_tol', $data['biaya_tol']);
                $template->setValue('biaya_lain', $data['biaya_lain']);

                if (!empty($data['bukti_penginapan']) && file_exists($data['bukti_penginapan'])) {
                    $template->setImageValue('bukti_penginapan', [
                        'path' => $data['bukti_penginapan'],
                        'width' => 500, 
                        'height' => 350, 
                        'ratio' => true 
                    ]);
                } else {
                    $template->setValue('bukti_penginapan', '');
                }

                if (!empty($data['bukti_tol']) && file_exists($data['bukti_tol'])) {
                    $template->setImageValue('bukti_tol', [
                        'path' => $data['bukti_tol'],
                        'width' => 500, 
                        'height' => 350, 
                        'ratio' => true 
                    ]);
                } else {
                    $template->setValue('bukti_tol', '');
                }

                if (!empty($data['bukti_bahan_bakar']) && file_exists($data['bukti_bahan_bakar'])) {
                    $template->setImageValue('bukti_bahan_bakar', [
                        'path' => $data['bukti_bahan_bakar'],
                        'width' => 500, 
                        'height' => 350, 
                        'ratio' => true 
                    ]);
                } else {
                    $template->setValue('bukti_bahan_bakar', '');
                }

                if (!empty($data['bukti_lain']) && file_exists($data['bukti_lain'])) {
                    $template->setImageValue('bukti_lain', [
                        'path' => $data['bukti_lain'],
                        'width' => 500, 
                        'height' => 350, 
                        'ratio' => true 
                    ]);
                } else {
                    $template->setValue('bukti_lain', '');
                }

                $file_surat = "surat_sppd_{$id_sppd}.docx";

                header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
                header('Content-Disposition: attachment; filename="' . $file_surat . '"');
                header('Cache-Control: max-age=0');

                $template->saveAs('php://output');
                exit;
            } else {
                echo "Template surat tidak ditemukan.";
            }
        } else {
            echo "Data SPPD tidak ditemukan.";
        }
    } else {
        echo "Metode request tidak valid.";
    }
?>