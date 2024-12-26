<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/Logo Kikc.png" type="image/x-icon">

    <link rel="stylesheet" href="assets/css/style.css">
    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Nunito Fonts CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Sistem Surat Perintah Perjalanan Dinas</title>
</head>
<body>
    <div class="main-content">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex flex-column justify-content-center align-items-center p-2 gap-2">
                <img src="assets/images/Logo Kikc.png" alt="logo kikc" width="100" height="40">
                <h5 class="text-center">Surat Perintah Perjalanan Dinas</h5>
            </div>
            <div class="card card-login shadow">
                <div class="card-body">
                    <form method="post" action="backend/login.php">
                        <h5 class="text-center">Login to Your Account</h5>
                        <p class="text-center">Masukan No Badge Dan Tanggal Lahir</p>
                        <div class="mb-3">
                            <i class="bi bi-person-fill"></i>
                            <label for="no_badge" class="form-label">No Badge :</label>
                            <input type="number" class="form-control" id="no_badge" name="no_badge" required>
                        </div>
                        <div class="mb-3">
                            <i class="bi bi-calendar-fill"></i>
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir :</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="login" class="fw-semibold btn btn-success main-background text-light w-100 main-background">Login</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container p-4">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0 mt-4">
                        <img src="assets/images/Logo Kikc.png" alt="Logo Kikc" width="70" height="28">
                        <p class="fw-semibold mt-3"><i class="bi bi-c-circle"></i> 2024. Kawasan Industri Kujang Cikampek</p>
                        <p>Jl. Kw. Industri No.Kujang, Kalihurip, Kec. Cikampek, Karawang, Jawa Barat 41373</p>
                    </div> 
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0 mt-4">
                        <p class="text-justify">Aplikasi berbasis web ini dibangun bertujuan untuk memudahkan pegawai dalam pengajuan surat perintah perjalanan dinas serta memudahkan staff departement SDM & Umum untuk mengelola surat perintah perjalanan dinas.</p>
                        <p><i class="bi bi-telephone"></i> (0264) 313113</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>