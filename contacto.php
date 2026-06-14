<?php 
$page_title = "Contacto | OmnIng - Hardware y Software";
$page_description = "Solicita un diagnóstico de hardware o una evaluación para desarrollar sistemas web orientados a conversión y medición de datos en San Miguel.";

require_once 'config/database.php';
include 'includes/header.php'; 
?>

<section class="bg-negro text-blanco py-5 border-bottom border-primario border-2">
    <div class="container py-4 text-center">
        <h1 class="display-4 fw-bold texto-primario mb-3">Conversemos sobre el resultado que necesitas</h1>
        <p class="lead w-75 mx-auto text-light opacity-75">Describe la falla, el proceso que deseas automatizar o el objetivo digital que necesitas medir. Te responderemos con un siguiente paso claro.</p>
    </div>
</section>

<section class="py-5 my-4">
    <div class="container">
        <div class="row g-4 g-md-5">
            <div class="col-lg-5">
                <div class="p-4 p-md-5 bg-negro text-blanco rounded-4 shadow h-100 border-start border-primario border-5">
                    <h2 class="texto-primario mb-4 h3">Información de Contacto</h2>
                    
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primario text-negro rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px;">
                            <i class="fa-solid fa-location-dot fs-5"></i>
                        </div>
                        <div class="ms-3 contact-detail">
                            <h3 class="h5 mb-1 fw-bold">Ubicación</h3>
                            <p class="mb-0 text-light opacity-75">San Miguel, El Salvador</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primario text-negro rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px;">
                            <i class="fa-solid fa-phone fs-5"></i>
                        </div>
                        <div class="ms-3 contact-detail">
                            <h3 class="h5 mb-1 fw-bold">Teléfono / WhatsApp</h3>
                            <a id="link-telefono-contacto" href="tel:+50369395620" class="text-reset text-decoration-none text-light opacity-75">+503 6939 5620</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-5">
                        <div class="bg-primario text-negro rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px;">
                            <i class="fa-solid fa-envelope fs-5"></i>
                        </div>
                        <div class="ms-3 contact-detail">
                            <h3 class="h5 mb-1 fw-bold">Correo Electrónico</h3>
                            <a id="link-correo-contacto" href="mailto:omningtec@gmail.com" class="text-reset text-decoration-none text-light opacity-75">omningtec@gmail.com</a>
                        </div>
                    </div>

                    <h3 class="texto-primario mb-3 h5">Síguenos</h3>
                    <div class="d-flex gap-3">
                        <a id="link-facebook-contacto" href="https://www.facebook.com/omning" target="_blank" rel="noopener noreferrer" class="text-blanco nav-link fs-4" aria-label="Visitar nuestra página de Facebook"><i class="fa-brands fa-facebook"></i></a>
                        <a id="link-instagram-contacto" href="https://www.instagram.com/omningtec/" target="_blank" rel="noopener noreferrer" class="text-blanco nav-link fs-4" aria-label="Visitar nuestro perfil de Instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a id="link-tiktok-contacto" href="https://www.tiktok.com/@_omning_" target="_blank" rel="noopener noreferrer" class="text-blanco nav-link fs-4" aria-label="Ver nuestros videos en TikTok"><i class="fa-brands fa-tiktok"></i></a>
                        <a id="link-youtube-contacto" href="https://www.youtube.com/@OmningTec" target="_blank" rel="noopener noreferrer" class="text-blanco nav-link fs-4" aria-label="Visitar nuestro canal de YouTube"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="bg-light p-4 p-md-5 rounded-4 shadow-sm h-100">
                    
                    <?php if (isset($_GET['estado'])): ?>
                        <?php if ($_GET['estado'] == 'exito'): ?>
                            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                                <i class="fa-solid fa-circle-check me-2"></i> ¡Mensaje enviado con éxito! Nos pondremos en contacto contigo muy pronto.
                                <button id="btn-cerrar-alerta-exito-contacto" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                            </div>
                        <?php elseif ($_GET['estado'] == 'error'): ?>
                            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                                <i class="fa-solid fa-triangle-exclamation me-2"></i> Hubo un error al procesar tu solicitud. Por favor, intenta de nuevo o contáctanos por WhatsApp.
                                <button id="btn-cerrar-alerta-error-contacto" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <h2 class="texto-secundario mb-4 h3 fw-bold">Solicita una evaluación</h2>
                    <form id="form-contacto-principal" action="procesar_contacto.php" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label fw-bold">Nombre Completo</label>
                                <input type="text" class="form-control form-control-lg border-0 shadow-sm" id="nombre" name="nombre" required>
                            </div>
                            <div class="col-md-6">
                                <label for="telefono" class="form-label fw-bold">Teléfono</label>
                                <input type="tel" class="form-control form-control-lg border-0 shadow-sm" id="telefono" name="telefono">
                            </div>
                            <div class="col-12">
                                <label for="correo" class="form-label fw-bold">Correo Electrónico</label>
                                <input type="email" class="form-control form-control-lg border-0 shadow-sm" id="correo" name="correo" required>
                            </div>
                            <div class="col-12">
                                <label for="servicio" class="form-label fw-bold">¿Qué área necesitas mejorar?</label>
                                <select class="form-select form-select-lg border-0 shadow-sm" id="servicio" name="servicio" required>
                                    <option value="" selected disabled>Selecciona un servicio...</option>
                                    <option value="Soporte de Hardware">Soporte y Reparación de Hardware</option>
                                    <option value="Desarrollo de Software">Desarrollo de Software / Web</option>
                                    <option value="Diseño Gráfico">Diseño Gráfico</option>
                                    <option value="Otro">Otro servicio</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="mensaje" class="form-label fw-bold">Problema, objetivo o detalles del proyecto</label>
                                <textarea class="form-control border-0 shadow-sm" id="mensaje" name="mensaje" rows="5" required></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <button id="btn-submit-contacto" type="submit" class="btn btn-cta btn-lg fw-bold rounded-pill px-5 w-100">
                                    <i class="fa-solid fa-paper-plane me-2"></i> Solicitar evaluación
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid px-0">
    <iframe class="d-block w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.845876003732!2d-88.1794276239103!3d13.483424186873523!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f7b2a6b2f76856d%3A0x1d5e30773dbfba!2sSan%20Miguel%2C%20El%20Salvador!5e0!3m2!1ses!2sus!4v1718151240000!5m2!1ses!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<?php include 'includes/footer.php'; ?>
