<?php
require_once 'auth.php';
require_once '../config/database.php';

$directorio_subida = '../assets/img/portafolio/';

if (!file_exists($directorio_subida)) {
    mkdir($directorio_subida, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['guardar_proyecto'])) {
    $titulo = htmlspecialchars(trim($_POST['titulo']));
    $descripcion = htmlspecialchars(trim($_POST['descripcion']));
    $categoria = htmlspecialchars(trim($_POST['categoria']));
    $enlace = htmlspecialchars(trim($_POST['enlace']));
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    
    $ruta_imagen = "";
    $actualizar_imagen = false;

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
        $nombre_nuevo = uniqid('port_') . '.' . $extension;
        $ruta_destino = $directorio_subida . $nombre_nuevo;

        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_destino)) {
            $ruta_imagen = '/omning/assets/img/portafolio/' . $nombre_nuevo;
            $actualizar_imagen = true;
        }
    }

    try {
        if ($id) {
            if ($actualizar_imagen) {
                $sql_old = "SELECT imagen FROM portafolio WHERE id = :id";
                $stmt_old = $conn->prepare($sql_old);
                $stmt_old->bindParam(':id', $id);
                $stmt_old->execute();
                $old_img = $stmt_old->fetchColumn();
                
                if ($old_img && file_exists($_SERVER['DOCUMENT_ROOT'] . $old_img)) {
                    unlink($_SERVER['DOCUMENT_ROOT'] . $old_img);
                }

                $sql = "UPDATE portafolio SET titulo = :titulo, descripcion = :descripcion, categoria = :categoria, enlace = :enlace, imagen = :imagen WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':imagen', $ruta_imagen);
            } else {
                $sql = "UPDATE portafolio SET titulo = :titulo, descripcion = :descripcion, categoria = :categoria, enlace = :enlace WHERE id = :id";
                $stmt = $conn->prepare($sql);
            }
            
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':enlace', $enlace);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            header("Location: gestion_portafolio.php?estado=editado");
            exit();

        } else {
            $sql = "INSERT INTO portafolio (titulo, descripcion, categoria, imagen, enlace) VALUES (:titulo, :descripcion, :categoria, :imagen, :enlace)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':imagen', $ruta_imagen);
            $stmt->bindParam(':enlace', $enlace);
            $stmt->execute();
            
            header("Location: gestion_portafolio.php?estado=agregado");
            exit();
        }
    } catch(PDOException $e) {
        header("Location: gestion_portafolio.php?estado=error");
        exit();
    }
}

if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    try {
        $sql_img = "SELECT imagen FROM portafolio WHERE id = :id";
        $stmt_img = $conn->prepare($sql_img);
        $stmt_img->bindParam(':id', $id);
        $stmt_img->execute();
        $imagen_borrar = $stmt_img->fetchColumn();

        if ($imagen_borrar && file_exists($_SERVER['DOCUMENT_ROOT'] . $imagen_borrar)) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $imagen_borrar);
        }

        $sql = "DELETE FROM portafolio WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        header("Location: gestion_portafolio.php?estado=eliminado");
        exit();
    } catch(PDOException $e) {
        header("Location: gestion_portafolio.php?estado=error");
        exit();
    }
}

$proyecto_editar = null;
if (isset($_GET['editar'])) {
    $id_editar = $_GET['editar'];
    try {
        $sql_edit = "SELECT * FROM portafolio WHERE id = :id";
        $stmt_edit = $conn->prepare($sql_edit);
        $stmt_edit->bindParam(':id', $id_editar);
        $stmt_edit->execute();
        $proyecto_editar = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        header("Location: gestion_portafolio.php?estado=error");
        exit();
    }
}

$sql_select = "SELECT * FROM portafolio ORDER BY id DESC";
$stmt_select = $conn->query($sql_select);
$proyectos = $stmt_select->fetchAll(PDO::FETCH_ASSOC);

$page_title = "Portafolio Admin | OmnIng";
include 'includes/header.php';
?>

<div class="container py-5">
    
    <?php if (isset($_GET['estado'])): ?>
        <?php if ($_GET['estado'] == 'agregado'): ?>
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="fa-solid fa-check-circle me-2"></i> Proyecto guardado correctamente.
                <button id="btn-cerrar-alerta-agregado-portafolio-admin" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php elseif ($_GET['estado'] == 'editado'): ?>
            <div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="fa-solid fa-pen-to-square me-2"></i> Proyecto actualizado correctamente.
                <button id="btn-cerrar-alerta-editado-portafolio-admin" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php elseif ($_GET['estado'] == 'eliminado'): ?>
            <div class="alert alert-warning alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="fa-solid fa-trash me-2"></i> Proyecto eliminado permanentemente.
                <button id="btn-cerrar-alerta-eliminado-portafolio-admin" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php elseif ($_GET['estado'] == 'error'): ?>
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="fa-solid fa-triangle-exclamation me-2"></i> Ocurrió un error en la base de datos o subida de archivo.
                <button id="btn-cerrar-alerta-error-portafolio-admin" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="row g-4">
        
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h2 class="h4 texto-secundario mb-4 fw-bold">
                        <?php echo $proyecto_editar ? '<i class="fa-solid fa-pen me-2"></i>Editar Proyecto' : '<i class="fa-solid fa-plus-circle me-2"></i>Nuevo Proyecto'; ?>
                    </h2>
                    <form id="form-portafolio-admin" action="gestion_portafolio.php" method="POST" enctype="multipart/form-data">
                        
                        <?php if($proyecto_editar): ?>
                            <input type="hidden" name="id" value="<?php echo $proyecto_editar['id']; ?>">
                        <?php endif; ?>

                        <div class="mb-3">
                            <label for="titulo" class="form-label fw-bold">Título del Proyecto</label>
                            <input type="text" class="form-control bg-light border-0" id="titulo" name="titulo" value="<?php echo $proyecto_editar ? htmlspecialchars($proyecto_editar['titulo']) : ''; ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="categoria" class="form-label fw-bold">Categoría</label>
                            <select class="form-select bg-light border-0" id="categoria" name="categoria" required>
                                <option value="Hardware" <?php echo ($proyecto_editar && $proyecto_editar['categoria'] == 'Hardware') ? 'selected' : ''; ?>>Hardware</option>
                                <option value="Software" <?php echo ($proyecto_editar && $proyecto_editar['categoria'] == 'Software') ? 'selected' : ''; ?>>Software</option>
                                <option value="Otro" <?php echo ($proyecto_editar && $proyecto_editar['categoria'] == 'Otro') ? 'selected' : ''; ?>>Otro</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="imagen" class="form-label fw-bold">Imagen del Proyecto</label>
                            <?php if($proyecto_editar && !empty($proyecto_editar['imagen'])): ?>
                                <div class="mb-2">
                                    <img src="<?php echo htmlspecialchars($proyecto_editar['imagen']); ?>" width="150" height="100" class="img-fluid img-thumbnail" style="max-height: 100px; object-fit: cover;" alt="">
                                </div>
                            <?php endif; ?>
                            <input type="file" class="form-control bg-light border-0" id="imagen" name="imagen" accept="image/png, image/jpeg, image/jpg, image/webp" <?php echo $proyecto_editar ? '' : 'required'; ?>>
                            <div class="form-text">Formatos: JPG, PNG, WEBP.</div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="enlace" class="form-label fw-bold">Enlace Externo (Opcional)</label>
                            <input type="url" class="form-control bg-light border-0" id="enlace" name="enlace" placeholder="https://ejemplo.com" value="<?php echo $proyecto_editar ? htmlspecialchars($proyecto_editar['enlace']) : ''; ?>">
                        </div>
                        
                        <div class="mb-4">
                            <label for="descripcion" class="form-label fw-bold">Descripción del Trabajo Realizado</label>
                            <textarea class="form-control bg-light border-0" id="descripcion" name="descripcion" rows="4" required><?php echo $proyecto_editar ? htmlspecialchars($proyecto_editar['descripcion']) : ''; ?></textarea>
                        </div>
                        
                        <?php if($proyecto_editar): ?>
                            <div class="d-flex gap-2">
                                <button id="btn-submit-editar-portafolio-admin" type="submit" name="guardar_proyecto" class="btn btn-cta w-50 fw-bold rounded-pill">
                                    <i class="fa-solid fa-save me-1"></i> Actualizar
                                </button>
                                <a id="btn-cancelar-editar-portafolio-admin" href="gestion_portafolio.php" class="btn btn-secondary w-50 fw-bold rounded-pill">
                                    <i class="fa-solid fa-xmark me-1"></i> Cancelar
                                </a>
                            </div>
                        <?php else: ?>
                            <button id="btn-submit-agregar-portafolio-admin" type="submit" name="guardar_proyecto" class="btn btn-cta w-100 fw-bold rounded-pill">
                                <i class="fa-solid fa-paper-plane me-2"></i> Guardar Proyecto
                            </button>
                        <?php endif; ?>
                        
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4">
                    <h2 class="h4 texto-secundario mb-4 fw-bold"><i class="fa-solid fa-table-list me-2"></i>Proyectos en el Portafolio</h2>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col"><i class="fa-solid fa-image text-muted me-1"></i> Imagen</th>
                                    <th scope="col"><i class="fa-solid fa-font text-muted me-1"></i> Título</th>
                                    <th scope="col"><i class="fa-solid fa-tag text-muted me-1"></i> Categoría</th>
                                    <th scope="col" class="text-end"><i class="fa-solid fa-screwdriver-wrench text-muted me-1"></i> Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($proyectos) > 0): ?>
                                    <?php foreach($proyectos as $proyecto): ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo htmlspecialchars($proyecto['imagen']); ?>" width="60" height="60" class="img-fluid img-thumbnail rounded" style="width: 60px; height: 60px; object-fit: cover;" alt="">
                                        </td>
                                        <td class="fw-bold"><?php echo htmlspecialchars($proyecto['titulo']); ?></td>
                                        <td><span class="badge bg-secondary"><?php echo htmlspecialchars($proyecto['categoria']); ?></span></td>
                                        <td class="text-end">
                                            <a id="btn-editar-portafolio-admin-<?php echo $proyecto['id']; ?>" href="gestion_portafolio.php?editar=<?php echo $proyecto['id']; ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3 me-1">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <a id="btn-eliminar-portafolio-admin-<?php echo $proyecto['id']; ?>" href="gestion_portafolio.php?eliminar=<?php echo $proyecto['id']; ?>" class="btn btn-outline-danger btn-sm rounded-pill px-3" onclick="event.preventDefault(); confirmarAccion(this.href);">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">Aún no has agregado proyectos a tu portafolio.</td>
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
