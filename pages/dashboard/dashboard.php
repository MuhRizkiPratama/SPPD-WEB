<?php
    require "../layout/header.php";
?> 
    <main>
        <h5 class="text-center mt-2">Dashboard</h5>
        <p class="text-center">
            <?php
                date_default_timezone_set('Asia/Jakarta'); 
                echo date('l jS \of F Y');
            ?>
        </p>
    </main>

    <?php require "../layout/footer.php"; ?>