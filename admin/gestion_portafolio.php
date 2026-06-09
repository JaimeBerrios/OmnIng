<?php
session_start();
$page_title = "Gestión de Portafolio | Administración OmnIng";
$page_description = "Administración de proyectos de hardware, software y diseño.";

require_once '../config/database.php';
include '../includes/header.php'; 
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="texto-primario">Gestión de Portafolio</h1>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>