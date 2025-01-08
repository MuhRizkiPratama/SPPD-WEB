<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/Logo Kikc.png" type="image/x-icon">

    <link rel="stylesheet" href="assets/css/style.css">
    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Nunito Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Sistem Surat Perintah Perjalanan Dinas</title>
</head>
<body>
    <main>
        <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
            <div class="card shadow">
                <div class="card-header">
                    <div class="d-flex justify-content-center flex-column align-items-center p-2 gap-2">
                        <img src="assets/images/Logo Kikc.png" alt="logo kikc" width="80" height="35">
                        <p class="text-center fw-semibold">Surat Perintah Perjalanan Dinas</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                        <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#loginPegawai">
                            Login Pegawai
                        </button>
                        <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#loginAdmin">
                            Login Admin
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal login Pegawai-->
        <div class="modal modal-sm fade" id="loginPegawai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="backend/autentifikasi/login.php">
                            <div class="d-flex justify-content-center align-items-center flex-column gap-2">
                                <img src="assets/images/Logo Kikc.png" alt="logo kikc" width="100" height="40">
                                <h5 class="text-center">Surat Perintah Perjalanan Dinas</h5>
                                <p class="text-center">Login to Your Account Pegawai</p>
                            </div>
                            <div class="mb-3">
                                <label for="no_badge" class="form-label">No Badge :</label>
                                <input type="number" class="form-control" id="no_badge" name="no_badge" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir :</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="login_pegawai" class="fw-semibold btn btn-success main-background text-light w-100 main-background">Login</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Modal login Pegawai-->
        <div class="modal modal-sm fade" id="loginAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="backend/autentifikasi/login.php">
                            <div class="d-flex justify-content-center align-items-center flex-column gap-2">
                                <img src="assets/images/Logo Kikc.png" alt="logo kikc" width="100" height="40">
                                <h5 class="text-center">Surat Perintah Perjalanan Dinas</h5>
                                <p class="text-center">Login to Your Account Admin</p>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email :</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password :</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="login_admin" class="fw-semibold btn btn-success main-background text-light w-100 main-background">Login</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0 mt-4">
                    <img src="assets/images/Logo Kikc.png" alt="Logo Kikc" width="55" height="25">
                    <p class="fw-semibold mt-3"><i class="bi bi-c-circle"></i> 2024. Kawasan Industri Kujang Cikampek</p>
                    <p><i class="bi bi-geo-alt"></i> Jl. Kw. Industri No.Kujang, Kalihurip, Kec. Cikampek, Karawang, Jawa Barat 41373</p>
                </div> 
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0 mt-4">
                    <p><i class="bi bi-envelope"></i> info@kikc.co.id</p>
                    <p><i class="bi bi-telephone"></i> (0264) 313113</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>