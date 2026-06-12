<!DOCTYPE html>
<html lang="es-SV">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'Panel de Administración | OmnIng'; ?></title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-negro py-3 shadow-sm">
        <div class="container-fluid px-4">
            <a class="navbar-brand texto-primario fw-bold" href="index.php">
                <i class="fa-solid fa-shield-halved me-2"></i> OmnIng Admin
            </a>
            <button class="navbar-toggler border-primario" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="adminNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active texto-primario fw-bold' : 'text-blanco'; ?>" href="index.php">
                            <i class="fa-solid fa-list-check me-1"></i> Servicios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'gestion_portafolio.php' ? 'active texto-primario fw-bold' : 'text-blanco'; ?>" href="gestion_portafolio.php">
                            <i class="fa-solid fa-briefcase me-1"></i> Portafolio
                        </a>
                    </li>
                    <?php if (isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] === 'Admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'usuarios.php' ? 'active texto-primario fw-bold' : 'text-blanco'; ?>" href="usuarios.php">
                            <i class="fa-solid fa-users me-1"></i> Usuarios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'gestor_medios.php' ? 'active texto-primario fw-bold' : 'text-blanco'; ?>" href="gestor_medios.php">
                            <i class="fa-solid fa-folder-open me-1"></i> Medios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'gestion_mensajes.php' ? 'active texto-primario fw-bold' : 'text-blanco'; ?>" href="gestion_mensajes.php">
                            <i class="fa-solid fa-envelope me-1"></i> Mensajes
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
                <a href="../index.php" class="btn btn-outline-light btn-sm rounded-pill px-3">
                    <i class="fa-solid fa-globe me-1"></i> Ver sitio web
                </a>
                <a href="logout.php" class="btn btn-outline-danger btn-sm rounded-pill px-3 ms-2">
                    <i class="fa-solid fa-right-from-bracket"></i> Salir
                </a>
            </div>
        </div>
    </nav>