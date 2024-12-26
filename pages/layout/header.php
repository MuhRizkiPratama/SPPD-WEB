<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/images/Logo Kikc.png" type="image/x-icon">

    <link rel="stylesheet" href="../../assets/css/style.css">
    
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

    <!-- CSS DataTables CDN -->
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Nunito Fonts CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Sistem Surat Perintah Perjalanan Dinas</title>
</head>
<body>
    <header id="header">
        <button class="btn" id="toggleSidebar"><i class="bi bi-list"></i></button>
        <div class="d-flex align-items-center gap-2">
            <img src="../../assets/images/Logo Kikc.png" alt="Logo Kikc" width="55" height="25">
        </div>
    </header>
    <aside id="sidebar">
        <div class="d-flex justify-content-around align-items-center mt-3">
            <img src="../../assets/images/Logo Kikc.png" alt="Logo Kikc" width="65" height="35">
            <button class="btn" id="toggleClose"><i class="bi bi-x-lg"></i></button>
        </div>
        <div class="d-flex align-items-start flex-column ms-3 mt-5">
            <a class="btn fw-semibold" href="../dashboard/dashboard.php">Dashboard</a>
            <div class="dropdown">
                <button class="btn dropdown-toggle text-dark fw-semibold" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Pegawai
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item fw-semibold" href="../pegawai/unit_kerja.php">Unit Kerja</a></li>
                    <li><a class="dropdown-item fw-semibold" href="../pegawai/pegawai.php">Data Pegawai</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn dropdown-toggle text-dark fw-semibold" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Surat
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item fw-semibold" href="../surat/form.php">Form Pengajuan</a></li>
                    <li><a class="dropdown-item fw-semibold" href="../surat/history.php">Histori Pengajuan</a></li>
                </ul>
            </div>
        </div>
    </aside>

    <script src="../../assets/js/bootstrap.bundle.min.js"></script>

    <!-- Link untuk jQuery (untuk DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Link untuk JS DataTables -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
        $('#myTable').DataTable();
        });
    </script>

    <script src="../../assets/js/script.js"></script>   
</body>
</html>