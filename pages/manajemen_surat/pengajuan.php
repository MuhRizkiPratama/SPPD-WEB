<?php
    require "../layout/header.php";
    
    if($_SESSION['role'] != 'pegawai'){
        session_destroy();
        header("Location:../../index.php");
    }

    $user = $_SESSION['detail_pegawai'];
?>
    <main>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex flex-column justify-content-center align-items-center p-2 gap-2">
                <img src="../../assets/images/Logo Kikc.png" alt="logo kikc" width="100" height="40">
                <h5 class="text-center">Form Pengajuan Surat Perintah Perjalanan Dinas</h5>
            </div>

            <!-- Alert Berhasil -->
            <?php if(isset($_SESSION['success'])): ?>
                <div class="alert alert-success" role="alert" id="alert-messages">
                    <i class="bi bi-check-circle-fill"></i>
                    <?= $_SESSION['success']; ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
            
            <!-- Alert Gagal -->
            <?php if(isset($_SESSION['failed'])): ?>
                <div class="alert alert-danger" role="alert" id="alert-messages">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <?= $_SESSION['failed']; ?>
                </div>
                <?php unset($_SESSION['failed']); ?>
            <?php endif; ?>
            
            <div class="card w-75">
                <div class="card-body shadow">
                    <form action="../../backend/surat/create.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="fw-semibold">Ditugaskan Kepada:</p>
                                <div class="mb-3">
                                <label class="form-label" for="no_badge">No Badge:</label>
                                    <input class="form-control" type="text" id="no_badge" name="no_badge" value="<?= $user['no_badge']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="nama_pegawai">Nama Pegawai:</label>
                                    <input class="form-control" type="text" id="nama_pegawai" name="nama_pegawai" value="<?= $user['nama_pegawai']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="jabatan">Jabatan:</label>
                                    <input class="form-control" type="text" id="jabatan" name="jabatan" value="<?= $user['nama_jabatan']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="unit_kerja">Unit Kerja:</label>
                                    <input class="form-control" type="text" id="unit_kerja" name="unit_kerja" value="<?= $user['nama_unit_kerja']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="uang_saku">Uang Saku:</label>
                                    <input class="form-control" type="number" id="uang_saku" name="uang_saku" value="<?= $user['uang_saku']; ?>" readonly>
                                </div>
                            </div>
    
                            <div class="col-lg-6">
                                <p class="fw-semibold">Waktu dan Tugas:</p>
                                <div class="mb-3">
                                    <label class="form-label" for="tujuan">Tujuan:</label>
                                    <input class="form-control" type="text" name="tujuan" id="tujuan">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="tanggal_berangkat">Tanggal Berangkat:</label>
                                    <input class="form-control" type="date" name="tanggal_berangkat" id="tanggal_berangkat">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="tanggal_kembali">Tanggal Kembali:</label>
                                    <input class="form-control" type="date" name="tanggal_kembali" id="tanggal_kembali">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="Tugas">Tugas:</label>
                                    <input class="form-control" type="text" name="tugas" id="tugas">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="pemberi_perintah">Pemberi Perintah:</label>
                                    <input class="form-control" type="text" name="pemberi_perintah" id="pemberi_perintah">
                                </div>
                            </div>
                            <hr class="border border-dark">
                            <div class="col-lg-12">
                                <p class="text-center fw-semibold">Laporan Perjalanan Dinas:</p>
                                <div class="mb-3">
                                    <label class="form-label" for="laporan_perjalanan">Laporan:</label>
                                    <input class="form-control" type="text" name="laporan_perjalanan" id="laporan_perjalanan">
                                </div>
                            </div>
                            <hr class="border border-dark">
    
                            <div class="row">
                                <p class="text-center fw-semibold">Biaya At Cost:</p>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="biaya_penginapan">Biaya Penginapan:</label>
                                        <input class="form-control" type="number" name="biaya_penginapan" id="biaya_penginapan" value="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="biaya_tol">Biaya Tol:</label>
                                        <input class="form-control" type="number" name="biaya_tol" id="biaya_tol" value="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="biaya_bahan_bakar">Biaya Bahan Bakar:</label>
                                        <input class="form-control" type="number" name="biaya_bahan_bakar" id="biaya_bahan_bakar" value="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="biaya_lain">Biaya Lain:</label>
                                        <input class="form-control" type="number" name="biaya_lain" id="biaya_lain" value="0">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bukti_penginapan">Bukti Penginapan:</label>
                                        <input class="form-control" type="file" name="bukti_penginapan" id="bukti_penginapan">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="bukti_tol">Bukti Tol:</label>
                                        <input class="form-control" type="file" name="bukti_tol" id="bukti_tol">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="bukti_bahan_bakar">Bukti Bahan Bakar:</label>
                                        <input class="form-control" type="file" name="bukti_bahan_bakar" id="bukti_bahan_bakar">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="bukti_lain">Bukti Lain:</label>
                                        <input class="form-control" type="file" name="bukti_lain" id="bukti_lain">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <button class="btn fw-semibold btn-primary w-100" type="submit" name="create_surat">Ajukan Surat</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
        
    <?php require "../layout/footer.php"; ?>