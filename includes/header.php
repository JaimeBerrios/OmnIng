<?php
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$base_path = ($host === 'localhost') ? '/omning' : ''; 
$base_url = $protocol . $host . $base_path;
$current_url = $protocol . $host . $_SERVER['REQUEST_URI'];

$title = $page_title ?? 'OmnIng | Soluciones Integrales de Hardware y Software';
$desc = $page_description ?? 'En OmnIng transformamos desafíos tecnológicos en soluciones integrales. Expertos en soporte técnico, diseño gráfico y desarrollo de software a la medida en San Miguel, El Salvador.';
?>
<!DOCTYPE html>
<html lang="es-SV">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    
    <meta name="description" content="<?php echo $desc; ?>">
    <meta name="keywords" content="soporte técnico, desarrollo web, diseño gráfico, reparación de computadoras, reparación de móviles, sistemas a la medida, San Miguel, El Salvador, OmnIng, ingeniería de sistemas">
    <meta name="author" content="OmnIng">
    <meta name="robots" content="index, follow">
    
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="<?php echo $desc; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://localhost/omning/">
    <meta property="og:image" content="<?php echo BASE_URL; ?>assets/img/og-image.webp">
    
    <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL; ?>assets/img/favicon.ico">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"></noscript>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-negro sticky-top py-3">
        <div class="container">
            <a id="link-inicio-nav-logo" class="navbar-brand" href="/index.php">
                <img src="<?php echo BASE_URL; ?>assets/img/logo-omning.svg" width="104" height="40" alt="Logotipo OmnIng" class="img-fluid">
            </a>
            
            <button id="btn-menu-nav" class="navbar-toggler border-primario" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Alternar navegación">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="menuPrincipal">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-2">
                        <a id="nav-inicio" class="nav-link text-blanco d-flex align-items-center gap-2" href="/index.php">
                            <i class="fa-solid fa-house"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a id="nav-nosotros" class="nav-link text-blanco d-flex align-items-center gap-2" href="/nosotros.php">
                            <i class="fa-solid fa-users"></i> Nosotros
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a id="nav-servicios" class="nav-link text-blanco d-flex align-items-center gap-2" href="/servicios.php">
                            <i class="fa-solid fa-laptop-code"></i> Servicios
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a id="nav-portafolio" class="nav-link text-blanco d-flex align-items-center gap-2" href="/portafolio.php">
                            <i class="fa-solid fa-briefcase"></i> Portafolio
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a id="nav-contacto" class="nav-link text-blanco d-flex align-items-center gap-2" href="/contacto.php">
                            <i class="fa-solid fa-envelope"></i> Contacto
                        </a>
                    </li>
                </ul>
                
                <div class="d-flex">
                    <a id="btn-whatsapp-nav" href="https://wa.me/50369395620?text=Hola%20OMNING,%20me%20gustaria%20cotizar%20un%20servicio." target="_blank" rel="noopener noreferrer" class="btn btn-cta fw-bold rounded-pill px-4">
                        <i class="fa-brands fa-whatsapp me-2 fs-5 align-middle"></i> Cotizar Proyecto
                    </a>
                </div>
            </div>
        </div>
    </nav>
    
    <main class="flex-grow-1">
