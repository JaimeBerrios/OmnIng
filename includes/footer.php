</main>
    
    <footer class="bg-negro text-blanco pt-5 pb-3 mt-5 border-top border-primario border-3">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 text-center text-md-start">
                    <a id="link-inicio-footer-logo" href="<?= BASE_URL ?>" class="d-inline-block mb-3">
                        <img src="<?php echo BASE_URL; ?>assets/img/logo-omning.svg" width="150" height="58" loading="lazy" alt="Logotipo OmnIng" class="img-fluid d-block mx-auto mx-md-0">
                    </a>
                    <p class="text-light opacity-75">
                        Mantenemos tus equipos operativos y desarrollamos sistemas web orientados a conversión, con analítica para medir resultados.
                    </p>
                    <div class="d-flex gap-3 mt-4 justify-content-center justify-content-md-start">
                        <a id="link-facebook-footer" href="https://www.facebook.com/omning" target="_blank" rel="noopener noreferrer" class="text-blanco nav-link d-inline-block fs-4" aria-label="Visitar nuestra página de Facebook">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a id="link-instagram-footer" href="https://www.instagram.com/omningtec/" target="_blank" rel="noopener noreferrer" class="text-blanco nav-link d-inline-block fs-4" aria-label="Visitar nuestro perfil de Instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a id="link-tiktok-footer" href="https://www.tiktok.com/@_omning_" target="_blank" rel="noopener noreferrer" class="text-blanco nav-link d-inline-block fs-4" aria-label="Ver nuestros videos en TikTok">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                        <a id="link-youtube-footer" href="https://www.youtube.com/@OmningTec" target="_blank" rel="noopener noreferrer" class="text-blanco nav-link d-inline-block fs-4" aria-label="Visitar nuestro canal de YouTube">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 text-center text-md-start">
                    <h4 class="texto-primario mb-3">Legal y Políticas</h4>
                    <ul class="list-unstyled d-inline-block text-start">
                        <li class="mb-2">
                            <a id="link-politica-privacidad-footer" href="<?= BASE_URL ?>politica-privacidad" class="text-blanco text-decoration-none nav-link d-inline-flex align-items-center gap-2">
                                <i class="fa-solid fa-shield-halved"></i> Política de Privacidad
                            </a>
                        </li>
                        <li class="mb-2">
                            <a id="link-terminos-condiciones-footer" href="<?= BASE_URL ?>terminos-condiciones" class="text-blanco text-decoration-none nav-link d-inline-flex align-items-center gap-2">
                                <i class="fa-solid fa-file-contract"></i> Términos y Condiciones
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div class="col-lg-4 col-md-12 text-center text-md-start">
                    <h4 class="texto-primario mb-3">Contacto</h4>
                    <ul class="list-unstyled text-light opacity-75 d-inline-block text-start">
                        <li class="mb-3 d-flex align-items-start gap-2">
                            <i class="fa-solid fa-location-dot mt-1" style="color: var(--color-primario);"></i>
                            <span>San Miguel, El Salvador</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center gap-2">
                            <i class="fa-solid fa-phone" style="color: var(--color-primario);"></i>
                            <a id="link-telefono-footer" href="tel:+50369395620" class="text-reset text-decoration-none"><span>+503 6939 5620</span></a>
                        </li>
                        <li class="mb-3 d-flex align-items-center gap-2">
                            <i class="fa-solid fa-envelope" style="color: var(--color-primario);"></i>
                            <a id="link-correo-footer" href="mailto:omningtec@gmail.com" class="text-reset text-decoration-none"><span>omningtec@gmail.com</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="row mt-5 pt-3 border-top border-secondary">
                <div class="col-12 text-center text-light opacity-50">
                    <p class="mb-0">&copy; 2026 OmnIng. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
</body>
</html>
