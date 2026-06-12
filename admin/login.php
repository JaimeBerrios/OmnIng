<?php
session_start();
require_once '../config/database.php';

if (isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

$stmt_check = $conn->query("SELECT COUNT(*) FROM usuarios");
if ($stmt_check->fetchColumn() == 0) {
    $hash = password_hash('admin123', PASSWORD_DEFAULT);
    $sql_init = "INSERT INTO usuarios (nombre, correo, password, rol) VALUES ('Administrador', 'admin@omning.com', :hash, 'Admin')";
    $stmt_init = $conn->prepare($sql_init);
    $stmt_init->bindParam(':hash', $hash);
    $stmt_init->execute();
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = filter_var(trim($_POST['correo']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE correo = :correo AND estado = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();
    
    if ($stmt->rowCount() == 1) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $usuario['password'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            $_SESSION['usuario_rol'] = $usuario['rol'];
            header("Location: index.php");
            exit();
        } else {
            $error = 'Contraseña incorrecta.';
        }
    } else {
        $error = 'Correo no encontrado o cuenta inactiva.';
    }
}
?>
<!DOCTYPE html>
<html lang="es-SV">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | OmnIng Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-negro d-flex align-items-center justify-content-center vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-body p-5 bg-light text-center">
                        <div class="bg-negro rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                            <i class="fa-solid fa-shield-halved fa-2x text-primario"></i>
                        </div>
                        <h1 class="h3 fw-bold mb-4 texto-secundario">Acceso Seguro</h1>
                        
                        <?php if ($error): ?>
                            <div class="alert alert-danger border-0 shadow-sm py-2">
                                <i class="fa-solid fa-circle-exclamation me-1"></i> <?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <form action="login.php" method="POST">
                            <div class="form-floating mb-3 text-start">
                                <input type="email" class="form-control border-0 shadow-sm texto-secundario" id="correo" name="correo" placeholder="nombre@ejemplo.com" required>
                                <label for="correo" class="text-muted">Correo electrónico</label>
                            </div>
                            <div class="form-floating mb-4 text-start">
                                <input type="password" class="form-control border-0 shadow-sm texto-secundario" id="password" name="password" placeholder="Contraseña" required>
                                <label for="password" class="text-muted">Contraseña</label>
                            </div>
                            <button type="submit" class="btn btn-cta w-100 fw-bold rounded-pill py-3">
                                Ingresar <i class="fa-solid fa-arrow-right ms-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="../index.php" class="text-light text-decoration-none opacity-75"><i class="fa-solid fa-arrow-left me-1"></i> Volver a la web pública</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>