<?php
    require "../layout/header.php";
    require "../../backend/pegawai/show.php";
?>
    <main>
        <div class="container mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Data Pegawai</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>No Badge</th>
                                    <th>Nama Pegawai</th>
                                    <th>Jabatan</th>
                                    <th>Unit Kerja</th>
                                    <th>Uang Saku</th>
                                    <th>Penempatan</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                        $data = showPegawai();
                                        foreach ($data as $p){
                                            echo "<td>".$p['no_badge']."</td>";
                                            echo "<td>".$p['nama_pegawai']."</td>";
                                            echo "<td>".$p['unit_kerja']."</td>";
                                            echo "<td>".$p['no_telepon']."</td>";
                                            echo "<td>".$p['alamat']."</td>";
                                        }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require "../layout/footer.php"; ?>