    <aside class="shadow">
        <div class="d-flex flex-column">
            <div class="d-flex flex-column justify-content-center align-items-center gap-2 mt-3">
                <img src="../../assets/images/Logo Kikc.png" alt="Logo Kikc" width="60" height="30">
                <p class="fw-semibold text-center">Sistem Surat Perintah Perjalanan Dinas</p>
                <hr class="border border-success opacity-100 w-75">
            </div>
            <div class="d-flex align-items-start justify-content-center flex-column ms-2 mt-2 gap-1">
                <a class="btn fw-semibold" href="../dashboard/dashboard.php"><i class="bi bi-house"></i> Dashboard</a>
                
                <?php if($role === 'admin'): ?>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle text-dark fw-semibold" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-people"></i> Master Pegawai
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item fw-semibold" href="../master_pegawai/pegawai.php">Data Pegawai</a></li>
                            <li><a class="dropdown-item fw-semibold" href="../master_pegawai/jabatan.php">Jabatan</a></li>
                            <li><a class="dropdown-item fw-semibold" href="../master_pegawai/unit_kerja.php">Unit Kerja</a></li>
                            <li><a class="dropdown-item fw-semibold" href="../master_pegawai/penempatan.php">Penempatan</a></li>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="dropdown">
                    <button class="btn dropdown-toggle text-dark fw-semibold" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-file-text"></i> Surat
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item fw-semibold" href="../surat/pengajuan.php">Form Pengajuan</a></li>
                        <li><a class="dropdown-item fw-semibold" href="../surat/riwayat.php">Riwayat Pengajuan</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-start align-items-center ms-2 mt-1">
            <div class="logout">
                <a class="btn fw-semibold" href="../../backend/autentifikasi/logout.php"><i class="bi bi-box-arrow-left"></i> Log Out</a>
            </div>
        </div>
    </aside>