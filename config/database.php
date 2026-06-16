<?php
$entorno = $_SERVER['SERVER_NAME'];

if ($entorno === 'localhost' || $entorno === '127.0.0.1') {
    define('BASE_URL', '/omning/');
    $host = "localhost";
    $db_name = "omning_db";
    $username = "root";
    $password = "";
} else {
    define('BASE_URL', '/');
    $host = "localhost";
    $db_name = "omning_db";
    $username = "omning_admin";
    $password = "OmnIngTec2026*";
}

try {
    $conn = new PDO("mysql:host={$host};dbname={$db_name};charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $exception) {
    echo "Error de conexión: " . $exception->getMessage();
    exit;
}
?>
