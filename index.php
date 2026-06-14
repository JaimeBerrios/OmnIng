<?php
$page_title = "OmnIng - Hardware y Software";
$page_description = "En OmnIng transformamos desafíos tecnológicos en soluciones integrales. Expertos en soporte técnico, diseño gráfico y desarrollo de software a la medida.";

require_once 'config/database.php';
include 'includes/header.php'; 
?>

<section class="bg-negro text-blanco py-5 border-bottom border-primario border-2">
    <div class="container py-lg-5">
        <div class="row align-items-center g-4 g-md-5">
            <div class="col-lg-6 order-2 order-lg-1">
                <span class="badge bg-primario mb-3 px-3 py-2 fs-6 rounded-pill text-wrap mw-100" style="color: var(--color-secundario);">
                    <i class="fa-solid fa-bolt me-1"></i> Soluciones 100% Personalizadas
                </span>
                <h1 class="display-4 fw-bold mb-4">
                    Transformamos tus desafíos en <span class="texto-primario">Soluciones Integrales</span>
                </h1>
                <p class="lead mb-4 text-light opacity-75">
                    Combinamos lo mejor de dos mundos: desarrollo de software a la medida y soporte técnico especializado en hardware para llevar tu tecnología al siguiente nivel.
                </p>
                <div class="d-flex flex-column flex-sm-row gap-3">
                    <a href="https://wa.me/50369395620?text=Hola%20OMNING,%20me%20gustaria%20cotizar%20un%20servicio." target="_blank" rel="noopener noreferrer" class="btn btn-cta fw-bold rounded-pill px-4 py-3">
                        <i class="fa-brands fa-whatsapp me-2 fs-5 align-middle"></i> Cotizar Ahora
                    </a>
                    <a href="/omning/servicios.php" class="btn btn-outline-light fw-bold rounded-pill px-4 py-3 border-2 custom-hover-btn">
                        <i class="fa-solid fa-arrow-right me-2 align-middle"></i> Ver Servicios
                    </a>
                </div>
            </div>
            
            <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="/assets/img/hero-omning.png" alt="Representación de servicios OmnIng" class="img-fluid rounded-4 shadow-lg border border-primario border-opacity-50">
            </div>
        </div>
    </div>
</section>

<section class="py-5 my-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="texto-secundario display-5 fw-bold">Nuestros Servicios Destacados</h2>
                <p class="text-muted lead">Conoce las áreas principales en las que podemos ayudarte</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <img src="/assets/img/servicio-hardware.png" class="card-img-top img-fluid" alt="Soporte de Hardware">
                    <div class="card-body p-4">
                        <div class="bg-negro rounded-circle d-inline-flex align-items-center justify-content-center mb-3 mt-n5 position-relative shadow" style="width: 70px; height: 70px;">
                            <i class="fa-solid fa-microchip fa-2x" style="color: var(--color-primario);"></i>
                        </div>
                        <h3 class="card-title texto-secundario h4">Hardware</h3>
                        <p class="card-text">Soporte y reparación técnica garantizada para computadoras, teléfonos y tablets. Diagnósticos precisos y soluciones efectivas.</p>
                        <a href="/omning/servicios.php" class="text-decoration-none fw-bold" style="color: var(--color-secundario);">Saber más <i class="fa-solid fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <img src="/assets/img/servicio-software.png" class="card-img-top img-fluid" alt="Desarrollo de Software">
                    <div class="card-body p-4">
                        <div class="bg-negro rounded-circle d-inline-flex align-items-center justify-content-center mb-3 mt-n5 position-relative shadow" style="width: 70px; height: 70px;">
                            <i class="fa-solid fa-code fa-2x" style="color: var(--color-primario);"></i>
                        </div>
                        <h3 class="card-title texto-secundario h4">Software</h3>
                        <p class="card-text">Creación de sistemas a la medida y páginas web optimizadas. Escalabilidad y diseño enfocado en la experiencia del usuario.</p>
                        <a href="/omning/servicios.php" class="text-decoration-none fw-bold" style="color: var(--color-secundario);">Saber más <i class="fa-solid fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <img src="/assets/img/casos-exito.png" class="card-img-top img-fluid" alt="Nuestro Portafolio">
                    <div class="card-body p-4">
                        <div class="bg-negro rounded-circle d-inline-flex align-items-center justify-content-center mb-3 mt-n5 position-relative shadow" style="width: 70px; height: 70px;">
                            <i class="fa-solid fa-briefcase fa-2x" style="color: var(--color-primario);"></i>
                        </div>
                        <h3 class="card-title texto-secundario h4">Casos de Éxito</h3>
                        <p class="card-text">Explora nuestros proyectos anteriores, reparaciones destacadas y cómo hemos ayudado a otros clientes a alcanzar sus metas.</p>
                        <a href="/omning/portafolio.php" class="text-decoration-none fw-bold" style="color: var(--color-secundario);">Ver proyectos <i class="fa-solid fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-light py-5">
    <div class="container py-4">
        <div class="row align-items-center g-4 g-md-5">
            <div class="col-lg-6">
                <h2 class="texto-secundario display-6 fw-bold mb-4">¿Por qué elegir OmnIng?</h2>
                <p class="lead text-muted mb-4">
                    No solo reparamos equipos o escribimos código; nos involucramos en tu proyecto para garantizar resultados que aporten valor real.
                </p>
                
                <div class="d-flex align-items-start mb-4">
                    <div class="flex-shrink-0">
                        <div class="bg-negro rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="fa-solid fa-handshake-angle text-primario fs-4" style="color: var(--color-primario);"></i>
                        </div>
                    </div>
                    <div class="ms-3">
                        <h3 class="h5 mb-1 fw-bold">Atención Personalizada</h3>
                        <p class="text-muted mb-0">Hablamos tu idioma. Traducimos términos técnicos complejos en soluciones claras y comprensibles.</p>
                    </div>
                </div>
                
                <div class="d-flex align-items-start mb-4">
                    <div class="flex-shrink-0">
                        <div class="bg-negro rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="fa-solid fa-shield-halved text-primario fs-4" style="color: var(--color-primario);"></i>
                        </div>
                    </div>
                    <div class="ms-3">
                        <h3 class="h5 mb-1 fw-bold">Diagnósticos Transparentes</h3>
                        <p class="text-muted mb-0">Presupuestos honestos sin costos ocultos. Sabrás exactamente qué necesita tu equipo o software desde el día uno.</p>
                    </div>
                </div>
                
                <div class="d-flex align-items-start">
                    <div class="flex-shrink-0">
                        <div class="bg-negro rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="fa-solid fa-stopwatch text-primario fs-4" style="color: var(--color-primario);"></i>
                        </div>
                    </div>
                    <div class="ms-3">
                        <h3 class="h5 mb-1 fw-bold">Tiempos de Respuesta Ágiles</h3>
                        <p class="text-muted mb-0">Entendemos que la tecnología no puede esperar. Optimizamos nuestros procesos para entregas puntuales.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <img src="/assets/img/por-que-elegir-omning.png" alt="Ingeniería y Soporte OmnIng" class="img-fluid rounded-4 shadow">
            </div>
        </div>
    </div>
</section>

<section class="bg-negro text-blanco py-5 border-top border-bottom border-primario border-2 mt-5">
    <div class="container py-4 text-center">
        <h2 class="display-5 fw-bold mb-3">¿Listo para impulsar tu tecnología?</h2>
        <p class="lead w-75 mx-auto mb-4 text-light opacity-75">
            Escríbenos hoy mismo y cuéntanos sobre tu equipo dañado o la idea de software que tienes en mente. Estamos listos para ayudarte.
        </p>
        <a href="https://wa.me/50369395620?text=Hola%20OMNING,%20me%20gustaria%20cotizar%20un%20servicio." target="_blank" rel="noopener noreferrer" class="btn btn-cta btn-lg fw-bold rounded-pill px-4 px-sm-5 py-3 shadow-lg text-wrap mw-100">
            <i class="fa-brands fa-whatsapp me-2 fs-4 align-middle"></i> Solicitar Asistencia Inmediata
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
