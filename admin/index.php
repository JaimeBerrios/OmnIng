<?php
require_once 'auth.php';
require_once '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar_servicio'])) {
    $titulo = htmlspecialchars(trim($_POST['titulo']));
    $descripcion = htmlspecialchars(trim($_POST['descripcion']));
    $categoria = htmlspecialchars(trim($_POST['categoria']));
    $icono = htmlspecialchars(trim($_POST['icono']));

    try {
        $sql = "INSERT INTO servicios (titulo, descripcion, categoria, icono) VALUES (:titulo, :descripcion, :categoria, :icono)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':icono', $icono);
        $stmt->execute();
        
        header("Location: index.php?estado=agregado");
        exit();
    } catch(PDOException $e) {
        header("Location: index.php?estado=error");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar_servicio'])) {
    $id = $_POST['id'];
    $titulo = htmlspecialchars(trim($_POST['titulo']));
    $descripcion = htmlspecialchars(trim($_POST['descripcion']));
    $categoria = htmlspecialchars(trim($_POST['categoria']));
    $icono = htmlspecialchars(trim($_POST['icono']));

    try {
        $sql = "UPDATE servicios SET titulo = :titulo, descripcion = :descripcion, categoria = :categoria, icono = :icono WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':icono', $icono);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        header("Location: index.php?estado=editado");
        exit();
    } catch(PDOException $e) {
        header("Location: index.php?estado=error");
        exit();
    }
}

if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    try {
        $sql = "DELETE FROM servicios WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        header("Location: index.php?estado=eliminado");
        exit();
    } catch(PDOException $e) {
        header("Location: index.php?estado=error");
        exit();
    }
}

$servicio_editar = null;
if (isset($_GET['editar'])) {
    $id_editar = $_GET['editar'];
    try {
        $sql_edit = "SELECT * FROM servicios WHERE id = :id";
        $stmt_edit = $conn->prepare($sql_edit);
        $stmt_edit->bindParam(':id', $id_editar);
        $stmt_edit->execute();
        $servicio_editar = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        header("Location: index.php?estado=error");
        exit();
    }
}

$sql_select = "SELECT * FROM servicios ORDER BY id DESC";
$stmt_select = $conn->query($sql_select);
$servicios = $stmt_select->fetchAll(PDO::FETCH_ASSOC);

$page_title = "Servicios Admin | OmnIng";
include 'includes/header.php';
?>

<div class="container py-5">
    
    <?php if (isset($_GET['estado'])): ?>
        <?php if ($_GET['estado'] == 'agregado'): ?>
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="fa-solid fa-check-circle me-2"></i> Servicio agregado correctamente.
                <button id="btn-cerrar-alerta-agregado-servicios-admin" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php elseif ($_GET['estado'] == 'editado'): ?>
            <div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="fa-solid fa-pen-to-square me-2"></i> Servicio actualizado correctamente.
                <button id="btn-cerrar-alerta-editado-servicios-admin" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php elseif ($_GET['estado'] == 'eliminado'): ?>
            <div class="alert alert-warning alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="fa-solid fa-trash me-2"></i> Servicio eliminado correctamente.
                <button id="btn-cerrar-alerta-eliminado-servicios-admin" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php elseif ($_GET['estado'] == 'error'): ?>
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="fa-solid fa-triangle-exclamation me-2"></i> Ocurrió un error en la base de datos.
                <button id="btn-cerrar-alerta-error-servicios-admin" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="row g-4">
        
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h2 class="h4 texto-secundario mb-4 fw-bold">
                        <?php echo $servicio_editar ? '<i class="fa-solid fa-pen me-2"></i>Editar Servicio' : '<i class="fa-solid fa-plus-circle me-2"></i>Nuevo Servicio'; ?>
                    </h2>
                    <form id="form-servicio-admin" action="index.php" method="POST">
                        
                        <?php if($servicio_editar): ?>
                            <input type="hidden" name="id" value="<?php echo $servicio_editar['id']; ?>">
                        <?php endif; ?>

                        <div class="mb-3">
                            <label for="titulo" class="form-label fw-bold">Título del Servicio</label>
                            <input type="text" class="form-control bg-light border-0" id="titulo" name="titulo" value="<?php echo $servicio_editar ? htmlspecialchars($servicio_editar['titulo']) : ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoria" class="form-label fw-bold">Categoría</label>
                            <select class="form-select bg-light border-0" id="categoria" name="categoria" required>
                                <option value="Hardware" <?php echo ($servicio_editar && $servicio_editar['categoria'] == 'Hardware') ? 'selected' : ''; ?>>Hardware</option>
                                <option value="Software" <?php echo ($servicio_editar && $servicio_editar['categoria'] == 'Software') ? 'selected' : ''; ?>>Software</option>
                                <option value="Otro" <?php echo ($servicio_editar && $servicio_editar['categoria'] == 'Otro') ? 'selected' : ''; ?>>Otro</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="icono" class="form-label fw-bold">Clase del Ícono (FontAwesome)</label>
                            <input type="text" class="form-control bg-light border-0" id="icono" name="icono" placeholder="ej: fa-laptop-medical" value="<?php echo $servicio_editar ? htmlspecialchars($servicio_editar['icono']) : ''; ?>" required>
                            <div class="form-text mt-2"><a id="link-iconos-servicios-admin" href="https://fontawesome.com/search?o=r&m=free" target="_blank" class="text-decoration-none"><i class="fa-solid fa-magnifying-glass me-1"></i>Buscar íconos aquí</a></div>
                        </div>
                        <div class="mb-4">
                            <label for="descripcion" class="form-label fw-bold">Descripción Corta</label>
                            <textarea class="form-control bg-light border-0" id="descripcion" name="descripcion" rows="4" required><?php echo $servicio_editar ? htmlspecialchars($servicio_editar['descripcion']) : ''; ?></textarea>
                        </div>
                        
                        <?php if($servicio_editar): ?>
                            <div class="d-flex gap-2">
                                <button id="btn-submit-editar-servicio-admin" type="submit" name="editar_servicio" class="btn btn-cta w-50 fw-bold rounded-pill">
                                    <i class="fa-solid fa-save me-1"></i> Actualizar
                                </button>
                                <a id="btn-cancelar-editar-servicio-admin" href="index.php" class="btn btn-secondary w-50 fw-bold rounded-pill">
                                    <i class="fa-solid fa-xmark me-1"></i> Cancelar
                                </a>
                            </div>
                        <?php else: ?>
                            <button id="btn-submit-agregar-servicio-admin" type="submit" name="agregar_servicio" class="btn btn-cta w-100 fw-bold rounded-pill">
                                <i class="fa-solid fa-paper-plane me-2"></i> Guardar Servicio
                            </button>
                        <?php endif; ?>
                        
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4">
                    <h2 class="h4 texto-secundario mb-4 fw-bold"><i class="fa-solid fa-table-list me-2"></i>Servicios Activos</h2>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col"><i class="fa-solid fa-icons text-muted me-1"></i> Ícono</th>
                                    <th scope="col"><i class="fa-solid fa-font text-muted me-1"></i> Título</th>
                                    <th scope="col"><i class="fa-solid fa-tag text-muted me-1"></i> Categoría</th>
                                    <th scope="col" class="text-end"><i class="fa-solid fa-screwdriver-wrench text-muted me-1"></i> Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($servicios) > 0): ?>
                                    <?php foreach($servicios as $servicio): ?>
                                    <tr>
                                        <td>
                                            <div class="bg-negro texto-primario rounded d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="fa-solid <?php echo htmlspecialchars(str_replace('fa-solid ', '', $servicio['icono'])); ?> fs-5"></i>
                                            </div>
                                        </td>
                                        <td class="fw-bold"><?php echo htmlspecialchars($servicio['titulo']); ?></td>
                                        <td><span class="badge bg-secondary"><?php echo htmlspecialchars($servicio['categoria']); ?></span></td>
                                        <td class="text-end">
                                            <a id="btn-editar-servicio-admin-<?php echo $servicio['id']; ?>" href="index.php?editar=<?php echo $servicio['id']; ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3 me-1">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <a id="btn-eliminar-servicio-admin-<?php echo $servicio['id']; ?>" href="index.php?eliminar=<?php echo $servicio['id']; ?>" class="btn btn-outline-danger btn-sm rounded-pill px-3" onclick="event.preventDefault(); confirmarAccion(this.href);">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">No hay servicios registrados aún.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include 'includes/footer.php'; ?>
