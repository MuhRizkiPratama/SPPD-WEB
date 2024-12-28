<?php
    require "../../config/connection.php";
    require "../layout/header.php";
?>
    <main>
        <div class="container mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Unit Kerja</h5>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="bi bi-plus"></i>
                    </button>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Unit Kerja</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $queryUnitKerja = "SELECT * FROM unit_kerja";
                                    $resultUnitKerja = mysqli_query ($database, $queryUnitKerja);
                                    while ($data = mysqli_fetch_assoc($resultUnitKerja)){
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['unit_kerja']; ?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateModal"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                                <?php 
                                    }; 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Create Unit Kerja -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="../../backend/penempatan/create.php" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jabatan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label" for="penempatan">Penempatan :</label>
                                <input class="form-control" type="text" name="penempatan" id="penempatan" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="create_penempatan" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php
    require "../layout/footer.php";
?>