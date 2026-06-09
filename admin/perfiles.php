<?php
session_start();
$page_title = "Perfiles | Administración OmnIng";
$page_description = "Gestión de cuentas y credenciales de administradores.";

require_once '../config/database.php';
include '../includes/header.php'; 
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="texto-primario">Gestión de Perfiles</h1>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>