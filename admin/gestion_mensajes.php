<?php
session_start();
$page_title = "Mensajes | Administración OmnIng";
$page_description = "Bandeja de entrada y gestión de mensajes de contacto.";

require_once '../config/database.php';
include '../includes/header.php'; 
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="texto-primario">Gestión de Mensajes</h1>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>