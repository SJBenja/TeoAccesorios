<?php
$companyInfo = getCompanyInfo();
?>

<footer class="footer bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <!-- Información de la empresa -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="text-primary mb-3">
                    <i class="fas fa-store me-2"></i><?php echo $companyInfo['name']; ?>
                </h5>
                <p class="mb-3">Tu estilo, tu camino. Diseños únicos que marcan la diferencia en accesorios de calidad.</p>
                
                <!-- Información de contacto -->
                <div class="contact-info">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-envelope text-primary me-2"></i>
                        <a href="mailto:<?php echo $companyInfo['email']; ?>" class="text-white text-decoration-none">
                            <?php echo $companyInfo['email']; ?>
                        </a>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                        <span><?php echo $companyInfo['location']; ?></span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-phone text-primary me-2"></i>
                        <a href="tel:<?php echo $companyInfo['phone']; ?>" class="text-white text-decoration-none">
                            <?php echo $companyInfo['phone']; ?>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Enlaces rápidos -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="text-primary mb-3">Enlaces Rápidos</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="index.php" class="text-white text-decoration-none">
                            <i class="fas fa-home me-1"></i>Inicio
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="index.php?page=productos" class="text-white text-decoration-none">
                            <i class="fas fa-shopping-bag me-1"></i>Productos
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="index.php?page=quienes-somos" class="text-white text-decoration-none">
                            <i class="fas fa-users me-1"></i>Quiénes Somos
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="index.php?page=blog" class="text-white text-decoration-none">
                            <i class="fas fa-blog me-1"></i>Blog
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="index.php?page=contacto" class="text-white text-decoration-none">
                            <i class="fas fa-envelope me-1"></i>Contacto
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Categorías de productos -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="text-primary mb-3">Categorías</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="index.php?page=productos&categoria=mochilas" class="text-white text-decoration-none">
                            <i class="fas fa-briefcase me-1"></i>Mochilas
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="index.php?page=productos&categoria=materos" class="text-white text-decoration-none">
                            <i class="fas fa-mug-hot me-1"></i>Materos
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="index.php?page=productos&categoria=carteras" class="text-white text-decoration-none">
                            <i class="fas fa-handbag me-1"></i>Carteras
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="index.php?page=productos&categoria=rinoneras" class="text-white text-decoration-none">
                            <i class="fas fa-bag-shopping me-1"></i>Riñoneras
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="index.php?page=productos&categoria=accesorios" class="text-white text-decoration-none">
                            <i class="fas fa-gem me-1"></i>Accesorios
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Información legal y redes sociales -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="text-primary mb-3">Información Legal</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="index.php?page=politica-privacidad" class="text-white text-decoration-none">
                            <i class="fas fa-shield-alt me-1"></i>Política de Privacidad
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="index.php?page=terminos-condiciones" class="text-white text-decoration-none">
                            <i class="fas fa-file-contract me-1"></i>Términos y Condiciones
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="index.php?page=envios-devoluciones" class="text-white text-decoration-none">
                            <i class="fas fa-truck me-1"></i>Envíos y Devoluciones
                        </a>
                    </li>
                </ul>

                <!-- Redes sociales -->
                <h6 class="text-primary mb-3 mt-4">Síguenos</h6>
                <div class="social-links">
                    <a href="#" class="text-white me-3 fs-5" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-white me-3 fs-5" title="Facebook">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-white me-3 fs-5" title="WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="#" class="text-white me-3 fs-5" title="TikTok">
                        <i class="fas fa-music"></i>
                    </a>
                    <a href="#" class="text-white fs-5" title="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Línea divisoria -->
        <hr class="my-4 bg-secondary">

        <!-- Copyright -->
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0">
                    &copy; <?php echo $companyInfo['year']; ?> <?php echo $companyInfo['name']; ?>. 
                    Todos los derechos reservados.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="mb-0">
                    <small class="text-muted">
                        Desarrollado con <i class="fas fa-heart text-danger"></i> en Argentina 🇦🇷
                    </small>
                </p>
            </div>
        </div>
    </div>
</footer> 