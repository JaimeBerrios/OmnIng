<?php 
$page_title = "Nosotros | OmnIng";
$page_description = "Conoce la historia, misión, visión y los valores que impulsan a OmnIng a brindar soluciones tecnológicas y de ingeniería de primer nivel.";

require_once 'config/database.php';
include 'includes/header.php'; 
?>

<section class="bg-negro text-blanco py-5">
    <div class="container py-5">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="texto-primario display-4 fw-bold mb-3">Sobre OmnIng</h1>
                <p class="lead w-75 mx-auto">Transformamos los desafíos tecnológicos en soluciones integrales.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 my-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="texto-secundario mb-4 fw-bold">Nuestro Origen</h2>
                <p class="fs-5">
                    OmnIng nació el <strong>30 de mayo de 2026</strong> con el propósito de potenciar y aplicar los conocimientos adquiridos en la carrera de Ingeniería en Sistemas y Computación. 
                </p>
                <p>
                    Nuestro nombre fusiona el prefijo <strong>"Omni"</strong> (que significa "todo") e <strong>"Ing"</strong> (de "Ingeniería"). Bajo este concepto, ofrecemos servicios integrales de ingeniería informática y técnica, combinando lo mejor de dos mundos:
                </p>
                <ul class="list-unstyled mt-3">
                    <li class="mb-2"><i class="fa-solid fa-microchip me-2" style="color: var(--color-primario);"></i> <strong>Hardware:</strong> Soporte y reparación técnica de computadoras, teléfonos y tablets.</li>
                    <li><i class="fa-solid fa-code me-2" style="color: var(--color-primario);"></i> <strong>Software:</strong> Creación de sistemas y páginas web.</li>
                </ul>
                <p class="mt-3">
                    Nos apasiona brindar soluciones a la medida, ofreciendo una total personalización adaptada a las necesidades y requerimientos específicos de cada cliente.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="p-5 bg-negro text-blanco rounded-4 shadow border-bottom border-primario border-5">
                    <h3 class="texto-primario mb-3"><i class="fa-solid fa-gem me-2"></i>Propuesta de Valor</h3>
                    <p class="mb-0 fs-5">
                        Combinamos ingeniería de software y soporte técnico de hardware para diseñar proyectos 100% personalizados que se adaptan exactamente a lo que tu negocio o tú necesitan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-light py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <i class="fa-solid fa-bullseye fa-3x" style="color: var(--color-primario);"></i>
                        </div>
                        <h2 class="h3 card-title text-center texto-secundario fw-bold mb-3">Misión</h2>
                        <p class="card-text text-center text-muted">
                            Brindar soluciones tecnológicas con claridad, distinción y originalidad, adaptándonos estrictamente a los requerimientos de nuestros clientes. Nos comprometemos a ofrecer servicios informáticos de vanguardia y un soporte técnico de excelencia para dispositivos móviles, garantizando siempre la máxima calidad.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <i class="fa-solid fa-eye fa-3x" style="color: var(--color-primario);"></i>
                        </div>
                        <h2 class="h3 card-title text-center texto-secundario fw-bold mb-3">Visión</h2>
                        <p class="card-text text-center text-muted">
                            Consolidarnos como un referente en el sector tecnológico, impulsando nuestros conocimientos informáticos para ofrecer soluciones innovadoras mediante un servicio guiado por la originalidad, la formalidad y la empatía con cada cliente.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 my-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="texto-secundario display-5 fw-bold">Nuestros Valores</h2>
                <p class="text-muted lead">Los principios que rigen cada uno de nuestros proyectos y reparaciones.</p>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="text-center p-3">
                    <div class="bg-negro text-primario rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow" style="width: 80px; height: 80px;">
                        <i class="fa-solid fa-handshake fa-2x" style="color: var(--color-primario);"></i>
                    </div>
                    <h3 class="h4 texto-secundario fw-bold mb-2">Compromiso</h3>
                    <p class="text-muted">Dedicación absoluta para cumplir y superar las expectativas de nuestros clientes.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="text-center p-3">
                    <div class="bg-negro text-primario rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow" style="width: 80px; height: 80px;">
                        <i class="fa-solid fa-heart fa-2x" style="color: var(--color-primario);"></i>
                    </div>
                    <h3 class="h4 texto-secundario fw-bold mb-2">Empatía</h3>
                    <p class="text-muted">Comprensión profunda de las necesidades tecnológicas de las personas para ofrecer soluciones humanas.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="text-center p-3">
                    <div class="bg-negro text-primario rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow" style="width: 80px; height: 80px;">
                        <i class="fa-solid fa-hands-holding-circle fa-2x" style="color: var(--color-primario);"></i>
                    </div>
                    <h3 class="h4 texto-secundario fw-bold mb-2">Solidaridad</h3>
                    <p class="text-muted">Disposición para apoyar y aportar valor a nuestra comunidad y entorno.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center p-3">
                    <div class="bg-negro text-primario rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow" style="width: 80px; height: 80px;">
                        <i class="fa-solid fa-scale-balanced fa-2x" style="color: var(--color-primario);"></i>
                    </div>
                    <h3 class="h5 texto-secundario fw-bold mb-2">Respeto</h3>
                    <p class="text-muted small">Trato digno, transparente y profesional en cada una de nuestras interacciones.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center p-3">
                    <div class="bg-negro text-primario rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow" style="width: 80px; height: 80px;">
                        <i class="fa-solid fa-seedling fa-2x" style="color: var(--color-primario);"></i>
                    </div>
                    <h3 class="h5 texto-secundario fw-bold mb-2">Humildad</h3>
                    <p class="text-muted small">Apertura al aprendizaje continuo y reconocimiento del valor de cada proyecto.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center p-3">
                    <div class="bg-negro text-primario rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow" style="width: 80px; height: 80px;">
                        <i class="fa-solid fa-fire fa-2x" style="color: var(--color-primario);"></i>
                    </div>
                    <h3 class="h5 texto-secundario fw-bold mb-2">Pasión</h3>
                    <p class="text-muted small">Entusiasmo e innovación constante en el desarrollo de software y hardware.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center p-3">
                    <div class="bg-negro text-primario rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow" style="width: 80px; height: 80px;">
                        <i class="fa-solid fa-shield-halved fa-2x" style="color: var(--color-primario);"></i>
                    </div>
                    <h3 class="h5 texto-secundario fw-bold mb-2">Honradez</h3>
                    <p class="text-muted small">Integridad, rectitud y total transparencia en nuestros diagnósticos y presupuestos.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>