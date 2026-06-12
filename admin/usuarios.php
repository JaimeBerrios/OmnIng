<?php
require_once 'auth.php';
verificar_admin(); 
require_once '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar_usuario'])) {
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $correo = filter_var(trim($_POST['correo']), FILTER_SANITIZE_EMAIL);
    $rol = htmlspecialchars(trim($_POST['rol']));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO usuarios (nombre, correo, password, rol) VALUES (:nombre, :correo, :password, :rol)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':rol', $rol);
        $stmt->execute();
        
        header("Location: usuarios.php?estado=agregado");
        exit();
    } catch(PDOException $e) {
        header("Location: usuarios.php?estado=error");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar_usuario'])) {
    $id = $_POST['id'];
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $correo = filter_var(trim($_POST['correo']), FILTER_SANITIZE_EMAIL);
    $rol = htmlspecialchars(trim($_POST['rol']));

    try {
        if (!empty($_POST['password'])) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET nombre = :nombre, correo = :correo, rol = :rol, password = :password WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':password', $password);
        } else {
            $sql = "UPDATE usuarios SET nombre = :nombre, correo = :correo, rol = :rol WHERE id = :id";
            $stmt = $conn->prepare($sql);
        }
        
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':rol', $rol);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        header("Location: usuarios.php?estado=editado");
        exit();
    } catch(PDOException $e) {
        header("Location: usuarios.php?estado=error");
        exit();
    }
}

if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    
    if ($id == $_SESSION['usuario_id']) {
        header("Location: usuarios.php?estado=error_autoeliminacion");
        exit();
    }

    try {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        header("Location: usuarios.php?estado=eliminado");
        exit();
    } catch(PDOException $e) {
        header("Location: usuarios.php?estado=error");
        exit();
    }
}

$usuario_editar = null;
if (isset($_GET['editar'])) {
    $id_editar = $_GET['editar'];
    try {
        $sql_edit = "SELECT * FROM usuarios WHERE id = :id";
        $stmt_edit = $conn->prepare($sql_edit);
        $stmt_edit->bindParam(':id', $id_editar);
        $stmt_edit->execute();
        $usuario_editar = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        header("Location: usuarios.php?estado=error");
        exit();
    }
}

$sql_select = "SELECT id, nombre, correo, rol, fecha_creacion FROM usuarios ORDER BY id DESC";
$stmt_select = $conn->query($sql_select);
$usuarios = $stmt_select->fetchAll(PDO::FETCH_ASSOC);

$page_title = "Gestión de Usuarios | OmnIng Admin";
include 'includes/header.php';
?>

<div class="container py-5">
    
    <?php if (isset($_GET['estado'])): ?>
        <?php if ($_GET['estado'] == 'agregado'): ?>
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="fa-solid fa-check-circle me-2"></i> Usuario creado correctamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php elseif ($_GET['estado'] == 'editado'): ?>
            <div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="fa-solid fa-pen-to-square me-2"></i> Usuario actualizado.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php elseif ($_GET['estado'] == 'eliminado'): ?>
            <div class="alert alert-warning alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="fa-solid fa-trash me-2"></i> Usuario eliminado del sistema.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php elseif ($_GET['estado'] == 'error_autoeliminacion'): ?>
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="fa-solid fa-shield-virus me-2"></i> No puedes eliminar tu propia cuenta.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php elseif ($_GET['estado'] == 'error'): ?>
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="fa-solid fa-triangle-exclamation me-2"></i> Hubo un error. Verifica los datos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="row g-4">
        
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h2 class="h4 texto-secundario mb-4 fw-bold">
                        <?php echo $usuario_editar ? '<i class="fa-solid fa-user-pen me-2"></i>Editar Usuario' : '<i class="fa-solid fa-user-plus me-2"></i>Nuevo Usuario'; ?>
                    </h2>
                    <form action="usuarios.php" method="POST">
                        
                        <?php if($usuario_editar): ?>
                            <input type="hidden" name="id" value="<?php echo $usuario_editar['id']; ?>">
                        <?php endif; ?>

                        <div class="mb-3">
                            <label for="nombre" class="form-label fw-bold">Nombre Completo</label>
                            <input type="text" class="form-control bg-light border-0" id="nombre" name="nombre" value="<?php echo $usuario_editar ? htmlspecialchars($usuario_editar['nombre']) : ''; ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="correo" class="form-label fw-bold">Correo Electrónico</label>
                            <input type="email" class="form-control bg-light border-0" id="correo" name="correo" value="<?php echo $usuario_editar ? htmlspecialchars($usuario_editar['correo']) : ''; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="rol" class="form-label fw-bold">Nivel de Acceso</label>
                            <select class="form-select bg-light border-0" id="rol" name="rol" required>
                                <option value="Admin" <?php echo ($usuario_editar && $usuario_editar['rol'] == 'Admin') ? 'selected' : ''; ?>>Administrador</option>
                                <option value="Editor" <?php echo ($usuario_editar && $usuario_editar['rol'] == 'Editor') ? 'selected' : (!isset($usuario_editar) ? 'selected' : ''); ?>>Editor</option>
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">Contraseña</label>
                            <input type="password" class="form-control bg-light border-0" id="password" name="password" <?php echo $usuario_editar ? '' : 'required'; ?>>
                            <?php if($usuario_editar): ?>
                                <div class="form-text mt-2 text-warning fw-bold small"><i class="fa-solid fa-triangle-exclamation me-1"></i>Déjalo en blanco para mantener la actual.</div>
                            <?php endif; ?>
                        </div>
                        
                        <?php if($usuario_editar): ?>
                            <div class="d-flex gap-2">
                                <button type="submit" name="editar_usuario" class="btn btn-cta w-50 fw-bold rounded-pill">
                                    <i class="fa-solid fa-save me-1"></i> Actualizar
                                </button>
                                <a href="usuarios.php" class="btn btn-secondary w-50 fw-bold rounded-pill">
                                    <i class="fa-solid fa-xmark me-1"></i> Cancelar
                                </a>
                            </div>
                        <?php else: ?>
                            <button type="submit" name="agregar_usuario" class="btn btn-cta w-100 fw-bold rounded-pill">
                                <i class="fa-solid fa-paper-plane me-2"></i> Crear Usuario
                            </button>
                        <?php endif; ?>
                        
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4">
                    <h2 class="h4 texto-secundario mb-4 fw-bold"><i class="fa-solid fa-users-gear me-2"></i>Usuarios Registrados</h2>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col"><i class="fa-solid fa-user text-muted me-1"></i> Nombre</th>
                                    <th scope="col"><i class="fa-solid fa-envelope text-muted me-1"></i> Correo</th>
                                    <th scope="col"><i class="fa-solid fa-key text-muted me-1"></i> Rol</th>
                                    <th scope="col" class="text-end"><i class="fa-solid fa-screwdriver-wrench text-muted me-1"></i> Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($usuarios) > 0): ?>
                                    <?php foreach($usuarios as $user): ?>
                                    <tr>
                                        <td class="fw-bold">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="bg-negro texto-primario rounded-circle d-flex justify-content-center align-items-center" style="width: 35px; height: 35px;">
                                                    <?php echo strtoupper(substr($user['nombre'], 0, 1)); ?>
                                                </div>
                                                <?php echo htmlspecialchars($user['nombre']); ?>
                                                <?php if($user['id'] == $_SESSION['usuario_id']): ?>
                                                    <span class="badge bg-success ms-1">Tú</span>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td><?php echo htmlspecialchars($user['correo']); ?></td>
                                        <td>
                                            <?php if($user['rol'] == 'Admin'): ?>
                                                <span class="badge bg-primario text-negro border border-primario"><i class="fa-solid fa-crown me-1"></i>Admin</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary"><i class="fa-solid fa-pen-nib me-1"></i>Editor</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-end">
                                            <a href="usuarios.php?editar=<?php echo $user['id']; ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3 me-1">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <a href="usuarios.php?eliminar=<?php echo $user['id']; ?>" class="btn btn-outline-danger btn-sm rounded-pill px-3 <?php echo ($user['id'] == $_SESSION['usuario_id']) ? 'disabled' : ''; ?>" onclick="return confirm('¿Estás seguro de eliminar permanentemente a este usuario?');">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
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