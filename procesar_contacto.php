<?php
require_once 'config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $telefono = htmlspecialchars(trim($_POST['telefono']));
    $correo = filter_var(trim($_POST['correo']), FILTER_SANITIZE_EMAIL);
    $servicio = htmlspecialchars(trim($_POST['servicio']));
    $mensaje = htmlspecialchars(trim($_POST['mensaje']));

    try {
        $sql = "INSERT INTO mensajes_contacto (nombre, telefono, correo, servicio, mensaje) 
                VALUES (:nombre, :telefono, :correo, :servicio, :mensaje)";
        
        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':servicio', $servicio);
        $stmt->bindParam(':mensaje', $mensaje);
        
        $stmt->execute();
        
        header("Location: contacto.php?estado=exito");
        exit();
        
    } catch(PDOException $e) {
        header("Location: contacto.php?estado=error");
        exit();
    }
} else {
    header("Location: contacto.php");
    exit();
}
?>