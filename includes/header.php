<?php
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
    <meta property="og:image" content="/omning/assets/img/og-image.jpg">
    
    <link rel="icon" type="image/x-icon" href="/omning/assets/img/favicon.ico">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/omning/assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-negro sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/omning/index.php">
                <img src="/omning/assets/img/logo-omning.svg" alt="Logotipo OmnIng" height="40">
            </a>
            
            <button class="navbar-toggler border-primario" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Alternar navegación">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="menuPrincipal">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-blanco" href="/omning/index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-blanco" href="/omning/nosotros.php">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-blanco" href="/omning/servicios.php">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-blanco" href="/omning/portafolio.php">Portafolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-blanco" href="/omning/contacto.php">Contacto</a>
                    </li>
                </ul>
                
                <div class="d-flex">
                    <a href="https://wa.me/50369395620" target="_blank" rel="noopener noreferrer" class="btn bg-primario text-negro fw-bold">
                        <i class="fa-brands fa-whatsapp me-2"></i>Cotizar Proyecto
                    </a>
                </div>
            </div>
        </div>
    </nav>