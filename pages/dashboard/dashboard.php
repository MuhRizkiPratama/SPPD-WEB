<?php
    require "../layout/header.php";

    // if($_SESSION['role'] != 'admin' || 'pegawai'){
    //     header("Location:../../index.php");
    //     exit();
    // }
?> 
    <main>
        <div class="container">
            <h4 class="text-center mt-2">Dashboard</h4>
            <div class="d-flex justify-content-center gap-2 ">
                <div class="card" style="width: 35vh;">
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
    
                <div class="card" style="width: 35vh;">
                    <div class="card-header">
                        <h5 class="text-center">Jumlah Unit Kerja:</h5>
                    </div>
                    <?php
                        $query = "SELECT COUNT(*) AS total FROM unit_kerja";
                        $result = mysqli_query($database, $query);
                        while ($jumlah_unit_kerja = mysqli_fetch_assoc($result)){  
                    ?>
                    <div class="card-body">
                        <p class="text-center"><?= $jumlah_unit_kerja['total']; ?> Unit Kerja</p>
                    </div>
                    <?php
                        };
                    ?>
                </div>
    
                <div class="card" style="width: 35vh;">
                    <div class="card-header">
                        <h5 class="text-center">Jumlah Jabatan:</h5>
                    </div>
                    <?php
                        $query = "SELECT COUNT(*) AS total FROM jabatan";
                        $result = mysqli_query($database, $query);
                        while ($jumlah_jabatan = mysqli_fetch_assoc($result)){  
                    ?>
                    <div class="card-body">
                        <p class="text-center"><?= $jumlah_jabatan['total']; ?> Jabatan</p>
                    </div>
                    <?php
                        };
                    ?>
                </div>
            </div>
        </div>
    </main>

    <?php require "../layout/footer.php"; ?>