<?php
session_start();
require_once __DIR__ . '/../config/database.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: " . BASE_URL . "admin/login");
    exit();
}

function verificar_admin() {
    if ($_SESSION['usuario_rol'] !== 'Admin') {
        header("Location: " . BASE_URL . "admin/?estado=acceso_denegado");
        exit();
    }
}
?>
