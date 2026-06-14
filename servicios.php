<?php 
$page_title = "Servicios | OmnIng - Hardware y Software";
$page_description = "Descubre nuestra oferta de servicios integrales en soporte técnico de hardware y desarrollo de software a la medida en San Miguel.";

require_once 'config/database.php';
include 'includes/header.php'; 

$sql = "SELECT * FROM servicios WHERE estado = 1 ORDER BY id DESC";
$stmt = $conn->query($sql);
$todos_los_servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);

$servicios_hardware = [];
$servicios_software = [];
$servicios_otros = [];

foreach ($todos_los_servicios as $servicio) {
    if ($servicio['categoria'] == 'Hardware') {
        $servicios_hardware[] = $servicio;
    } elseif ($servicio['categoria'] == 'Software') {
        $servicios_software[] = $servicio;
    } else {
        $servicios_otros[] = $servicio;
    }
}
?>

<section class="bg-negro text-blanco py-5 border-bottom border-primario border-2">
    <div class="container py-4 text-center">
        <h1 class="display-4 fw-bold texto-primario mb-3">Nuestros Servicios</h1>
        <p class="lead w-75 mx-auto text-light opacity-75">Soluciones tecnológicas a la medida de tus necesidades, divididas en nuestras dos grandes especialidades.</p>
    </div>
</section>

<section class="py-5 my-4">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-md-8">
                <h2 class="display-6 fw-bold texto-secundario mb-2">Ingeniería en Hardware</h2>
                <p class="text-muted fs-5">Mantenimiento, reparación y optimización física de tus equipos tecnológicos.</p>
            </div>
            <div class="col-md-4 text-md-end text-start mt-3 mt-md-0">
                <i class="fa-solid fa-microchip fa-4x text-light opacity-25"></i>
            </div>
        </div>

        <div class="row g-4">
            <?php if (count($servicios_hardware) > 0): ?>
                <?php foreach ($servicios_hardware as $srv): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 border-0 shadow-sm p-3 rounded-4 custom-hover-card">
                            <div class="card-body">
                                <div class="bg-negro rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow" style="width: 60px; height: 60px;">
                                    <i class="fa-solid <?php echo htmlspecialchars($srv['icono']); ?> fs-3" style="color: var(--color-primario);"></i>
                                </div>
                                <h3 class="card-title h4 fw-bold mb-3"><?php echo htmlspecialchars($srv['titulo']); ?></h3>
                                <p class="card-text text-muted"><?php echo htmlspecialchars($srv['descripcion']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-4">
                    <p class="text-muted fs-5">Estamos actualizando nuestro catálogo de servicios de Hardware.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="bg-light py-5">
    <div class="container py-4">
        <div class="row mb-5 align-items-center">
            <div class="col-md-8">
                <h2 class="display-6 fw-bold texto-secundario mb-2">Ingeniería en Software</h2>
                <p class="text-muted fs-5">Desarrollo de sistemas, aplicaciones y páginas web para digitalizar tu negocio.</p>
            </div>
            <div class="col-md-4 text-md-end text-start mt-3 mt-md-0">
                <i class="fa-solid fa-code fa-4x text-secondary opacity-25"></i>
            </div>
        </div>

        <div class="row g-4">
            <?php if (count($servicios_software) > 0): ?>
                <?php foreach ($servicios_software as $srv): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 border-0 shadow p-3 rounded-4 custom-hover-card">
                            <div class="card-body">
                                <div class="bg-negro rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow" style="width: 60px; height: 60px;">
                                    <i class="fa-solid <?php echo htmlspecialchars($srv['icono']); ?> fs-3" style="color: var(--color-primario);"></i>
                                </div>
                                <h3 class="card-title h4 fw-bold mb-3"><?php echo htmlspecialchars($srv['titulo']); ?></h3>
                                <p class="card-text text-muted"><?php echo htmlspecialchars($srv['descripcion']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-4">
                    <p class="text-muted fs-5">Estamos actualizando nuestro catálogo de servicios de Software.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if (count($servicios_otros) > 0): ?>
<section class="py-5">
    <div class="container py-4">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="display-6 fw-bold texto-secundario mb-2">Otros Servicios</h2>
                <p class="text-muted fs-5">Soluciones adicionales de diseño y tecnología.</p>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            <?php foreach ($servicios_otros as $srv): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm p-3 rounded-4 custom-hover-card">
                        <div class="card-body text-center">
                            <div class="bg-negro rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow" style="width: 60px; height: 60px;">
                                <i class="fa-solid <?php echo htmlspecialchars($srv['icono']); ?> fs-3" style="color: var(--color-primario);"></i>
                            </div>
                            <h3 class="card-title h4 fw-bold mb-3"><?php echo htmlspecialchars($srv['titulo']); ?></h3>
                            <p class="card-text text-muted"><?php echo htmlspecialchars($srv['descripcion']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="bg-negro text-blanco py-5 border-top border-primario border-2">
    <div class="container py-4">
        <div class="row align-items-center bg-primario text-negro rounded-4 p-5 shadow-lg">
            <div class="col-lg-8 mb-4 mb-lg-0 text-center text-lg-start">
                <h3 class="fw-bold mb-2">¿No encuentras el servicio exacto que buscas?</h3>
                <p class="mb-0 fs-5">Cada proyecto es único. Escríbenos y diseñaremos una solución a tu medida.</p>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <a id="btn-contacto-servicios-cta" href="contacto.php" class="btn btn-negro btn-lg fw-bold rounded-pill px-4 py-3 shadow">
                    Contáctanos <i class="fa-solid fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
