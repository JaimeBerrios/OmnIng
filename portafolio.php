<?php 
$page_title = "Portafolio | OmnIng - Casos de Éxito";
$page_description = "Revisa proyectos reales de soporte técnico, reparación de hardware y desarrollo de sistemas web orientados a resultados medibles en El Salvador.";

require_once 'config/database.php';
include 'includes/header.php'; 

$sql = "SELECT * FROM portafolio WHERE estado = 1 ORDER BY id DESC";
$stmt = $conn->query($sql);
$proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="bg-negro text-blanco py-5 border-bottom border-primario border-2">
    <div class="container py-4 text-center">
        <h1 class="display-4 fw-bold texto-primario mb-3">Proyectos con objetivos concretos</h1>
        <p class="lead w-75 mx-auto text-light opacity-75">Trabajos de hardware y software ejecutados para recuperar operatividad, optimizar procesos y crear canales digitales medibles.</p>
    </div>
</section>

<section class="py-5 my-4">
    <div class="container">
        <div class="row g-4">
            <?php if (count($proyectos) > 0): ?>
                <?php foreach ($proyectos as $proyecto): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 border-0 shadow-sm overflow-hidden rounded-4 custom-hover-card">
                            <div class="position-relative">
                                <img src="<?php echo BASE_URL . ltrim(htmlspecialchars($proyecto['imagen']), '/'); ?>" width="600" height="400" loading="lazy" decoding="async" class="card-img-top img-fluid w-100" alt="<?php echo htmlspecialchars($proyecto['titulo']); ?>" style="height: 240px; object-fit: cover;">
                                <span class="badge bg-negro text-primario position-absolute top-0 start-0 m-3 border border-primario px-3 py-2 rounded-pill fw-bold">
                                    <?php if ($proyecto['categoria'] == 'Hardware'): ?>
                                        <i class="fa-solid fa-microchip me-1"></i> Hardware
                                    <?php elseif ($proyecto['categoria'] == 'Software'): ?>
                                        <i class="fa-solid fa-code me-1"></i> Software
                                    <?php else: ?>
                                        <i class="fa-solid fa-star me-1"></i> <?php echo htmlspecialchars($proyecto['categoria']); ?>
                                    <?php endif; ?>
                                </span>
                            </div>
                            <div class="card-body p-4 d-flex flex-column">
                                <h2 class="card-title h4 fw-bold texto-secundario mb-3"><?php echo htmlspecialchars($proyecto['titulo']); ?></h2>
                                <p class="card-text text-muted flex-grow-1 mb-4"><?php echo htmlspecialchars($proyecto['descripcion']); ?></p>
                                
                                <?php if (!empty($proyecto['enlace'])): ?>
                                    <a id="btn-proyecto-portafolio-<?php echo $proyecto['id']; ?>" href="<?php echo htmlspecialchars($proyecto['enlace']); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-dark fw-bold rounded-pill w-100 py-2 border-2 mt-auto">
                                        <i class="fa-solid fa-arrow-up-right-from-square me-2"></i> Revisar Proyecto en Vivo
                                    </a>
                                <?php else: ?>
                                    <a id="btn-concluido-portafolio-<?php echo $proyecto['id']; ?>" href="<?= BASE_URL ?>contacto" class="btn btn-light bg-light text-muted fw-bold rounded-pill w-100 py-2 border-0 mt-auto disabled opacity-50">
                                        <i class="fa-solid fa-circle-check me-2"></i> Proyecto Entregado
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <div class="mb-4">
                        <i class="fa-solid fa-briefcase fa-4x text-muted opacity-25"></i>
                    </div>
                    <h2 class="h3 fw-bold texto-secundario mb-3">Estamos documentando nuevos proyectos</h2>
                    <p class="text-muted w-50 mx-auto">Pronto publicaremos intervenciones de soporte y desarrollos de software con sus objetivos, proceso y resultados.</p>
                    <a id="btn-inicio-portafolio-vacio" href="<?= BASE_URL ?>" class="btn btn-cta fw-bold rounded-pill px-4 py-2 mt-3">Revisar nuestros servicios</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="bg-light py-5 border-top border-secondary border-opacity-10">
    <div class="container py-4 text-center">
        <h2 class="display-6 fw-bold texto-secundario mb-3">¿Qué necesita mejorar tu operación?</h2>
        <p class="lead w-50 mx-auto mb-4 text-muted">Analizaremos el problema, el impacto esperado y los indicadores que permitirán comprobar el resultado.</p>
        <a id="btn-contacto-portafolio-cta" href="<?= BASE_URL ?>contacto" class="btn btn-cta btn-lg fw-bold rounded-pill px-5 py-3 shadow">
            <i class="fa-solid fa-comments me-2"></i> Solicitar evaluación del proyecto
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
