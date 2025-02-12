<?php
    require "../../config/connection.php";
    require "../../vendor/autoload.php";

    use PhpOffice\PhpWord\TemplateProcessor;
    use PhpOffice\PhpWord\IOFactory;
    use Mpdf\Mpdf;
    use PhpOffice\PhpWord\Settings;

    if(isset($_POST['print'])) {
        $id_sppd = $_POST['id_sppd']; 

        $select_sppd = "SELECT * FROM sppd_terverifikasi JOIN pengajuan_sppd ON sppd_terverifikasi.id_pengajuan = pengajuan_sppd.id_pengajuan LEFT JOIN pegawai ON pengajuan_sppd.id_pegawai = pegawai.id_pegawai LEFT JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan LEFT JOIN unit_kerja ON pegawai.id_unit_kerja = unit_kerja.id_unit_kerja WHERE sppd_terverifikasi.id_sppd = '$id_sppd'";
                    
        $result = mysqli_query($database, $select_sppd);

        if ($result && mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);

            $template_surat = '../../assets/template surat/SPPD.docx';

            if (file_exists($template_surat)) {
                $template = new TemplateProcessor($template_surat);

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
                $template->setValue('total_biaya', $data['total_biaya']);

                $file_bukti = [
                    'bukti_penginapan' => $data['bukti_penginapan'],
                    'bukti_tol' => $data['bukti_tol'],
                    'bukti_bahan_bakar' => $data['bukti_bahan_bakar'],
                    'bukti_lain' => $data['bukti_lain']
                ];
    
                foreach ($file_bukti as $key => $file) {
                    if (!empty($file) && file_exists($file)) {
                        $template->setImageValue($key, [
                            'path' => $file,
                            'width' => 500,
                            'height' => 350,
                            'ratio' => true
                        ]);
                    } else {
                        $template->setValue($key, '');
                    }
                }

                $no_surat = str_replace('/', '.', $data['no_surat']);
                $file_surat = "../../assets/sppd/sppd_({$no_surat}).docx";
                $file_pdf = "../../assets/sppd/sppd_{$no_surat}.pdf";

                $template->saveAs($file_surat);

                Settings::setPdfRendererName(Settings::PDF_RENDERER_MPDF);
                Settings::setPdfRendererPath('../../vendor/mpdf/mpdf'); 

                $phpWord = IOFactory::load($file_surat);
                $pdfWriter = IOFactory::createWriter($phpWord, 'PDF');
                $pdfWriter->save($file_pdf);

                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename="' . basename($file_pdf) . '"');
                readfile($file_pdf);
                exit();
            } else {
                $_SESSION['failed'] = "Template surat tidak ditemukan.";
                header("Location:../../pages/manajemen_surat/surat_terverifikasi.php");
                exit();
            }
        } else {
            $_SESSION['failed'] = "Data SPPD tidak ditemukan.";
            header("Location:../../pages/manajemen_surat/surat_terverifikasi.php");
            exit();
        }
    } else {
        $_SESSION['failed'] = "Metode request tidak valid.";
        header("Location:../../pages/manajemen_surat/surat_terverifikasi.php");
        exit();
    }
?>