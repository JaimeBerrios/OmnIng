<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

function verificar_admin() {
    if ($_SESSION['usuario_rol'] !== 'Admin') {
        header("Location: index.php?estado=acceso_denegado");
        exit();
    }
}
?>