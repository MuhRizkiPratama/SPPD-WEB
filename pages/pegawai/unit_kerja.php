<?php
    require "../../config/database.php";
    require "../layout/header.php";
?>
    <main>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">Unit Kerja</h5>
                        </div>
                        <div class="card-body">
                            <!-- Button Modal Tambah Unit Kerja-->
                            <button type="button" class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createUnitkerja">
                                <i class="bi bi-plus"></i>
                            </button>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Unit Kerja</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 1;
                                        $query = "SELECT * FROM unit_kerja";
                                        $data = mysqli_query($database, $query);
                                        while($unit_kerja = mysqli_fetch_assoc($data)){
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $unit_kerja['unit_kerja'] ?></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Modal Tambah Unit Kerja-->
                            <div class="modal fade" id="createUnitkerja" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Unit Kerja</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="../../backend/unit_kerja/create.php" method="post">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label" for="unit_kerja">Unit Kerja :</label>
                                                <input class="form-control" type="text" name="unit_kerja" id="unit_kerja">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="createUnitkerja">Tambah</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">Jabatan</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Jabatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require "../layout/footer.php"; ?>