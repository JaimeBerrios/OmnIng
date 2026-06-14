<?php
$page_title = "OmnIng - Hardware y Software";
$page_description = "OmnIng mantiene tus equipos operativos y desarrolla sistemas web orientados a conversión, con Google Analytics 4 y trackeo de conversiones para medir resultados reales.";

require_once 'config/database.php';
include 'includes/header.php'; 
?>

<section class="bg-negro text-blanco py-5 border-bottom border-primario border-2">
    <div class="container py-lg-5">
        <div class="row align-items-center g-4 g-md-5">
            <div class="col-lg-6 order-2 order-lg-1">
                <span class="badge bg-primario mb-3 px-3 py-2 fs-6 rounded-pill text-wrap mw-100" style="color: var(--color-secundario);">
                    <i class="fa-solid fa-bolt me-1"></i> Tecnología diseñada para rendir y medir
                </span>
                <h1 class="display-4 fw-bold mb-4">
                    Tecnología operativa y <span class="texto-primario">crecimiento medible</span>
                </h1>
                <p class="lead mb-4 text-light opacity-75">
                    Mantenemos tus equipos funcionando y desarrollamos sistemas web orientados a conversión, con Google Analytics 4 y trackeo de conversiones para convertir el comportamiento de tus usuarios en decisiones de negocio.
                </p>
                <div class="d-flex flex-column flex-sm-row gap-3">
                    <a id="btn-whatsapp-hero" href="https://wa.me/50369395620?text=Hola%20OMNING,%20me%20gustaria%20cotizar%20un%20servicio." target="_blank" rel="noopener noreferrer" class="btn btn-cta fw-bold rounded-pill px-4 py-3">
                        <i class="fa-brands fa-whatsapp me-2 fs-5 align-middle"></i> Evaluar mi proyecto
                    </a>
                    <a id="btn-servicios-hero" href="/servicios.php" class="btn btn-outline-light fw-bold rounded-pill px-4 py-3 border-2 custom-hover-btn">
                        <i class="fa-solid fa-arrow-right me-2 align-middle"></i> Revisar capacidades
                    </a>
                </div>
            </div>
            
            <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="/assets/img/hero-omning.webp" width="800" height="600" alt="Representación de servicios OmnIng" class="img-fluid rounded-4 shadow-lg border border-primario border-opacity-50">
            </div>
        </div>
    </div>
</section>

<section class="py-5 my-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="texto-secundario display-5 fw-bold">Servicios enfocados en rendimiento</h2>
                <p class="text-muted lead">Operatividad física para tus equipos y crecimiento digital respaldado por datos</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <img src="/assets/img/servicio-hardware.webp" width="600" height="400" class="card-img-top img-fluid" alt="Soporte de Hardware">
                    <div class="card-body p-4">
                        <div class="bg-negro rounded-circle d-inline-flex align-items-center justify-content-center mb-3 mt-n5 position-relative shadow" style="width: 70px; height: 70px;">
                            <i class="fa-solid fa-microchip fa-2x" style="color: var(--color-primario);"></i>
                        </div>
                        <h3 class="card-title texto-secundario h4">Hardware</h3>
                        <p class="card-text">Diagnóstico, mantenimiento y reparación de computadoras, teléfonos y tablets para reducir interrupciones, extender su vida útil y proteger tu inversión.</p>
                        <a id="btn-servicio-hardware" href="/servicios.php" class="text-decoration-none fw-bold" style="color: var(--color-secundario);">Evaluar mis equipos <i class="fa-solid fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <img src="/assets/img/servicio-software.webp" width="600" height="400" class="card-img-top img-fluid" alt="Desarrollo de Software">
                    <div class="card-body p-4">
                        <div class="bg-negro rounded-circle d-inline-flex align-items-center justify-content-center mb-3 mt-n5 position-relative shadow" style="width: 70px; height: 70px;">
                            <i class="fa-solid fa-code fa-2x" style="color: var(--color-primario);"></i>
                        </div>
                        <h3 class="card-title texto-secundario h4">Software</h3>
                        <p class="card-text">Sistemas y sitios web orientados a conversión, con Google Analytics 4 y trackeo de conversiones para medir usuarios, oportunidades y retorno.</p>
                        <a id="btn-servicio-software" href="/servicios.php" class="text-decoration-none fw-bold" style="color: var(--color-secundario);">Planificar mi sistema <i class="fa-solid fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <img src="/assets/img/casos-exito.webp" width="600" height="400" class="card-img-top img-fluid" alt="Nuestro Portafolio">
                    <div class="card-body p-4">
                        <div class="bg-negro rounded-circle d-inline-flex align-items-center justify-content-center mb-3 mt-n5 position-relative shadow" style="width: 70px; height: 70px;">
                            <i class="fa-solid fa-briefcase fa-2x" style="color: var(--color-primario);"></i>
                        </div>
                        <h3 class="card-title texto-secundario h4">Proyectos Ejecutados</h3>
                        <p class="card-text">Revisa trabajos de hardware y software donde el objetivo fue resolver fallas, mejorar procesos y construir activos digitales medibles.</p>
                        <a id="btn-ver-portafolio" href="/portafolio.php" class="text-decoration-none fw-bold" style="color: var(--color-secundario);">Revisar proyectos <i class="fa-solid fa-arrow-right ms-1"></i></a>
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
                <h2 class="texto-secundario display-6 fw-bold mb-4">Decisiones técnicas con impacto medible</h2>
                <p class="lead text-muted mb-4">
                    Cada intervención parte de un diagnóstico y un objetivo concreto: recuperar operatividad, reducir tareas manuales o aumentar conversiones.
                </p>
                
                <div class="d-flex align-items-start mb-4">
                    <div class="flex-shrink-0">
                        <div class="bg-negro rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="fa-solid fa-handshake-angle text-primario fs-4" style="color: var(--color-primario);"></i>
                        </div>
                    </div>
                    <div class="ms-3">
                        <h3 class="h5 mb-1 fw-bold">Objetivos antes que funciones</h3>
                        <p class="text-muted mb-0">Definimos qué debe mejorar, cómo se medirá y qué herramienta técnica puede generar ese resultado.</p>
                    </div>
                </div>
                
                <div class="d-flex align-items-start mb-4">
                    <div class="flex-shrink-0">
                        <div class="bg-negro rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="fa-solid fa-shield-halved text-primario fs-4" style="color: var(--color-primario);"></i>
                        </div>
                    </div>
                    <div class="ms-3">
                        <h3 class="h5 mb-1 fw-bold">Diagnósticos transparentes</h3>
                        <p class="text-muted mb-0">Recibes un alcance claro, prioridades y costos definidos para decidir con información antes de invertir.</p>
                    </div>
                </div>
                
                <div class="d-flex align-items-start">
                    <div class="flex-shrink-0">
                        <div class="bg-negro rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="fa-solid fa-stopwatch text-primario fs-4" style="color: var(--color-primario);"></i>
                        </div>
                    </div>
                    <div class="ms-3">
                        <h3 class="h5 mb-1 fw-bold">Medición desde el lanzamiento</h3>
                        <p class="text-muted mb-0">Integramos analítica avanzada y eventos de conversión para identificar qué funciona y dónde optimizar.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <img src="/assets/img/por-que-elegir-omning.webp" width="600" height="600" alt="Ingeniería y Soporte OmnIng" class="img-fluid rounded-4 shadow">
            </div>
        </div>
    </div>
</section>

<section class="bg-negro text-blanco py-5 border-top border-bottom border-primario border-2 mt-5">
    <div class="container py-4 text-center">
        <h2 class="display-5 fw-bold mb-3">¿Qué resultado necesitas mejorar?</h2>
        <p class="lead w-75 mx-auto mb-4 text-light opacity-75">
            Cuéntanos qué equipo detiene tu operación o qué proceso digital necesitas medir. Evaluaremos el problema y definiremos el siguiente paso técnico.
        </p>
        <a id="btn-whatsapp-cta-final" href="https://wa.me/50369395620?text=Hola%20OMNING,%20me%20gustaria%20cotizar%20un%20servicio." target="_blank" rel="noopener noreferrer" class="btn btn-cta btn-lg fw-bold rounded-pill px-4 px-sm-5 py-3 shadow-lg text-wrap mw-100">
            <i class="fa-brands fa-whatsapp me-2 fs-4 align-middle"></i> Solicitar evaluación técnica
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
