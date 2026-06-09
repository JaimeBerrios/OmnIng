<?php
session_start();
$page_title = "Dashboard | Administración OmnIng";
$page_description = "Panel principal de administración.";

require_once '../config/database.php';
include '../includes/header.php'; 
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="texto-primario">Dashboard</h1>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>