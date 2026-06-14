<?php 
$page_title = "Portafolio | OmnIng - Casos de Éxito";
$page_description = "Explora nuestra galería de proyectos y reparaciones reales. Descubre cómo ayudamos a nuestros clientes con soluciones de hardware y software en El Salvador.";

require_once 'config/database.php';
include 'includes/header.php'; 

$sql = "SELECT * FROM portafolio WHERE estado = 1 ORDER BY id DESC";
$stmt = $conn->query($sql);
$proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="bg-negro text-blanco py-5 border-bottom border-primario border-2">
    <div class="container py-4 text-center">
        <h1 class="display-4 fw-bold texto-primario mb-3">Nuestro Portafolio</h1>
        <p class="lead w-75 mx-auto text-light opacity-75">Una muestra de nuestro compromiso, calidad y experiencia en reparaciones complejas de hardware y desarrollo de software robusto.</p>
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
                                <img src="<?php echo htmlspecialchars($proyecto['imagen']); ?>" width="600" height="400" class="card-img-top img-fluid w-100" alt="<?php echo htmlspecialchars($proyecto['titulo']); ?>" style="height: 240px; object-fit: cover;">
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
                                        <i class="fa-solid fa-arrow-up-right-from-square me-2"></i> Ver Proyecto en Vivo
                                    </a>
                                <?php else: ?>
                                    <a id="btn-concluido-portafolio-<?php echo $proyecto['id']; ?>" href="contacto.php" class="btn btn-light bg-light text-muted fw-bold rounded-pill w-100 py-2 border-0 mt-auto disabled opacity-50">
                                        <i class="fa-solid fa-circle-check me-2"></i> Trabajo Concluido
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
                    <h2 class="h3 fw-bold texto-secundario mb-3">Aún no hay proyectos en la galería</h2>
                    <p class="text-muted w-50 mx-auto">Muy pronto subiremos fotografías e información de nuestros últimos trabajos de soporte y desarrollo de sistemas.</p>
                    <a id="btn-inicio-portafolio-vacio" href="index.php" class="btn btn-cta fw-bold rounded-pill px-4 py-2 mt-3">Volver al Inicio</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="bg-light py-5 border-top border-secondary border-opacity-10">
    <div class="container py-4 text-center">
        <h2 class="display-6 fw-bold texto-secundario mb-3">¿Tienes un reto tecnológico para nosotros?</h2>
        <p class="lead w-50 mx-auto mb-4 text-muted">Permítenos añadir tu caso a nuestra lista de éxitos. Garantizamos máxima dedicación y profesionalismo.</p>
        <a id="btn-contacto-portafolio-cta" href="contacto.php" class="btn btn-cta btn-lg fw-bold rounded-pill px-5 py-3 shadow">
            <i class="fa-solid fa-comments me-2"></i> Iniciar una Conversación
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
