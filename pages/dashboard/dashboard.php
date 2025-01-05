<?php
    require "../../config/connection.php";
    require "../layout/header.php";
?> 
    <main>
        <div class="container">
            <h4 class="text-center mt-2">Dashboard</h4>
            <h5>Selamat Datang <?= $_SESSION['nama_lengkap'];?></h5>
    
            <div class="card" style="width: 30vh;">
                <div class="card-header">
                    <h5 class="text-center">Jumlah Pegawai:</h5>
                </div>
                <?php
                    $query = "SELECT COUNT(*) AS total FROM pegawai";
                    $result = mysqli_query($database, $query);
                    while ($jumlahPegawai = mysqli_fetch_assoc($result)){  
                ?>
                <div class="card-body">
                    <p class="text-center"><?= $jumlahPegawai['total']; ?> Pegawai</p>
                </div>
                <?php
                    };
                ?>
            </div>
        </div>
    </main>

    <?php require "../layout/footer.php"; ?>