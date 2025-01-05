<?php
    require "../../config/connection.php";
    require "../layout/header.php";

    session_start();
    $user = $_SESSION['pegawai'];
?>
    <main>
        <div class="d-flex flex-column justify-content-center align-items-center mt-5 mb-5">
            <div class="d-flex flex-column justify-content-center align-items-center p-2 gap-2">
                <img src="../../assets/images/Logo Kikc.png" alt="logo kikc" width="100" height="40">
                <h5 class="text-center">Form Pengajuan Surat Perintah Perjalanan Dinas</h5>
            </div>
            <div class="card w-75">
                <div class="card-body shadow">
                    <form action="backend/proses_surat.php" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="fw-semibold">Ditugaskan kepada:</p>
                                <div class="mb-3">
                                <label class="form-label" for="no_badge">No Badge:</label>
                                    <input class="form-control" type="number" id="no_badge" name="no_badge" value="<?= $pegawai['no_badge']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="nama_pegawai">Nama Pegawai:</label>
                                    <input class="form-control" type="text" id="nama_pegawai" name="nama_pegawai" value="<?= $pegawai['nama_lengkap']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="jabatan">Jabatan:</label>
                                    <input class="form-control" type="text" id="jabatan" name="jabatan" value="<?= $pegawai['jabatan']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="unit_kerja">Unit Kerja:</label>
                                    <input class="form-control" type="text" id="unit_kerja" name="unit_kerja" value="<?= $pegawai['unit_kerja']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="uang_saku">Uang Saku:</label>
                                    <input class="form-control" type="number" id="uang_saku" name="uang_saku" value="<?= $pegawai['uang_saku']; ?>" readonly>
                                </div>
                            </div>
    
                            <div class="col-lg-6">
                                <p class="fw-semibold">Waktu dan Tugas:</p>
                                <div class="mb-3">
                                    <label class="form-label" for="lama_perjalanan">Lama Perjalanan:</label>
                                    <input class="form-control" type="number" name="lama_perjalanan" id="lama_perjalanan">
                                </div>
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
                            </div>
                            <hr>
    
                            <div class="col-lg-6">
                                <p class="fw-semibold">Perhitungan Biaya:</p>
                                <div class="lumpsum">
                                    <p class="fw-semibold">I. BIAYA LUMPSUM</p>
                                    <div class="mb-3">
                                        <label class="form-label" for="penginapan">Penginapan:</label>
                                        <input class="form-control" type="number" name="penginapan" id="penginapan">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="uang_saku">Uang Saku:</label>
                                        <input class="form-control" type="number" name="uang_saku" id="uang_saku">
                                    </div>
                                </div>
                                <div class="biaya_at_cost">
                                    <p class="fw-semibold">II. BIAYA AT-COST</p>
                                    <div class="mb-3">
                                        <label class="form-label" for="penginapan">Penginapan:</label>
                                        <input class="form-control" type="number" name="penginapan" id="penginapan">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="jasa_tol">Jasa Tol:</label>
                                        <input class="form-control" type="number" name="jasa_tol" id="jasa_tol">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="bbm">BBM:</label>
                                        <input class="form-control" type="number" name="bbm" id="bbm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn fw-semibold btn-primary w-100" type="submit" name="create_surat" style="background-color: #f45c25;">Ajukan Surat</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
        
    <?php require "../layout/footer.php"; ?>