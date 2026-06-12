<?php
require_once 'auth.php';
verificar_admin();
require_once '../config/database.php';

$directorio = '../assets/img/portafolio/';

if (isset($_GET['eliminar'])) {
    $archivo_eliminar = $_GET['eliminar'];
    $ruta_completa = $directorio . basename($archivo_eliminar);
    
    if (file_exists($ruta_completa)) {
        unlink($ruta_completa);
        header("Location: gestor_medios.php?estado=eliminado");
        exit();
    }
}

$archivos_fisicos = array_diff(scandir($directorio), array('.', '..'));

$stmt = $conn->query("SELECT imagen FROM portafolio");
$imagenes_db = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $nombre_archivo = basename($row['imagen']);
    $imagenes_db[] = $nombre_archivo;
}

$archivos_huerfanos = array_diff($archivos_fisicos, $imagenes_db);

$page_title = "Gestor de Medios | OmnIng Admin";
include 'includes/header.php';
?>

<div class="container py-5">
    <?php if (isset($_GET['estado']) && $_GET['estado'] == 'eliminado'): ?>
        <div class="alert alert-warning shadow-sm border-0">
            <i class="fa-solid fa-trash-can me-2"></i> Archivo eliminado del servidor.
        </div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <h2 class="h4 texto-secundario mb-4 fw-bold">
                <i class="fa-solid fa-folder-open me-2"></i> Gestión de Archivos Huérfanos
            </h2>
            <p class="text-muted">Aquí se muestran las imágenes que están ocupando espacio en el servidor pero no están vinculadas a ningún proyecto en tu base de datos.</p>
            
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Vista Previa</th>
                            <th>Nombre de Archivo</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($archivos_huerfanos) > 0): ?>
                            <?php foreach ($archivos_huerfanos as $archivo): ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo $directorio . $archivo; ?>" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                    </td>
                                    <td><code><?php echo htmlspecialchars($archivo); ?></code></td>
                                    <td class="text-end">
                                        <a href="gestor_medios.php?eliminar=<?php echo urlencode($archivo); ?>" 
                                           class="btn btn-outline-danger btn-sm rounded-pill"
                                           onclick="return confirm('¿Borrar permanentemente este archivo?');">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center py-4 text-muted">
                                    <i class="fa-solid fa-circle-check me-2 text-success"></i> No hay imágenes huérfanas. Todo está limpio.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>