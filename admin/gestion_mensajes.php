<?php
require_once 'auth.php';
verificar_admin();
require_once '../config/database.php';

if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    try {
        $sql = "DELETE FROM mensajes WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header("Location: gestion_mensajes.php?estado=eliminado");
        exit();
    } catch(PDOException $e) {
        header("Location: gestion_mensajes.php?estado=error");
        exit();
    }
}

$sql_select = "SELECT * FROM mensajes ORDER BY fecha_creacion DESC";
$stmt_select = $conn->query($sql_select);
$mensajes = $stmt_select->fetchAll(PDO::FETCH_ASSOC);

$page_title = "Mensajes Admin | OmnIng";
include 'includes/header.php';
?>

<div class="container py-5">

    <?php if (isset($_GET['estado'])): ?>
        <?php if ($_GET['estado'] == 'eliminado'): ?>
            <div class="alert alert-warning alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="fa-solid fa-trash me-2"></i> Mensaje eliminado correctamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php elseif ($_GET['estado'] == 'error'): ?>
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="fa-solid fa-triangle-exclamation me-2"></i> Ocurrió un error en la base de datos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <h2 class="h4 texto-secundario mb-4 fw-bold"><i class="fa-solid fa-envelope-open-text me-2"></i>Mensajes Recibidos</h2>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col"><i class="fa-solid fa-user text-muted me-1"></i> Nombre</th>
                            <th scope="col"><i class="fa-solid fa-envelope text-muted me-1"></i> Correo</th>
                            <th scope="col"><i class="fa-solid fa-tag text-muted me-1"></i> Servicio</th>
                            <th scope="col"><i class="fa-solid fa-align-left text-muted me-1"></i> Mensaje</th>
                            <th scope="col" class="text-end"><i class="fa-solid fa-screwdriver-wrench text-muted me-1"></i> Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($mensajes) > 0): ?>
                            <?php foreach($mensajes as $msj): ?>
                            <tr>
                                <td class="fw-bold"><?php echo htmlspecialchars($msj['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($msj['correo']); ?></td>
                                <td><span class="badge bg-secondary"><?php echo htmlspecialchars($msj['servicio']); ?></span></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-dark rounded-pill" data-bs-toggle="modal" data-bs-target="#modalMensaje<?php echo $msj['id']; ?>">
                                        Ver mensaje
                                    </button>
                                    <div class="modal fade" id="modalMensaje<?php echo $msj['id']; ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Mensaje de <?php echo htmlspecialchars($msj['nombre']); ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><?php echo nl2br(htmlspecialchars($msj['mensaje'])); ?></p>
                                                    <hr>
                                                    <small class="text-muted">Tel: <?php echo htmlspecialchars($msj['telefono']); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end">
                                    <a href="gestion_mensajes.php?eliminar=<?php echo $msj['id']; ?>" class="btn btn-outline-danger btn-sm rounded-pill px-3" onclick="return confirm('¿Eliminar este mensaje?');">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">No hay mensajes nuevos.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>