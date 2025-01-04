<?php
    require "../layout/header.php";
?>
    <main>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Create Admin</h5>
                </div>
                <div class="card-body">
                    <form action="../../backend/admin/create.php" method="post">
                        <div class="mb-3">
                            <label class="form-label" for="nama_lengkap">Nama Lengkap :</label>
                            <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email :</label>
                            <input class="form-control" type="email" name="email" id="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password :</label>
                            <input class="form-control" type="password" name="password" id="password">
                        </div>
                        <button class="btn btn-primary w-100" type="submit">Create Admin</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

<?php
    require "../layout/footer.php";
?>