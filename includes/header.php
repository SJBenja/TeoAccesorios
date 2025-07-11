<?php
$companyInfo = getCompanyInfo();
$currentPage = getCurrentPage();
?>

<!-- Top Bar -->
<div class="top-bar py-2 text-center">
    <div class="container">
        <p class="mb-0 text-white">
            <i class="fas fa-phone me-2"></i><?php echo $companyInfo['phone']; ?> | 
            <i class="fas fa-envelope me-2"></i><?php echo $companyInfo['email']; ?>
        </p>
    </div>
</div>

<!-- Header Principal -->
<header class="navbar-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="assets/logo.jpeg" alt="<?php echo $companyInfo['name']; ?>" class="me-2">
                <h1 class="mb-0"><?php echo $companyInfo['name']; ?></h1>
            </a>

            <!-- Botón hamburguesa para móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menú principal -->
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActivePage('home'); ?>" href="index.php">
                            <i class="fas fa-home me-1"></i>Inicio
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo isActivePage('productos'); ?>" href="#" id="navbarDropdownProductos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-shopping-bag me-1"></i>Productos y Servicios
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownProductos">
                            <li><a class="dropdown-item" href="index.php?page=productos&categoria=mochilas">Mochilas</a></li>
                            <li><a class="dropdown-item" href="index.php?page=productos&categoria=materos">Materos</a></li>
                            <li><a class="dropdown-item" href="index.php?page=productos&categoria=carteras">Carteras</a></li>
                            <li><a class="dropdown-item" href="index.php?page=productos&categoria=rinoneras">Riñoneras</a></li>
                            <li><a class="dropdown-item" href="index.php?page=productos&categoria=cartucheras">Cartucheras y Neceseres</a></li>
                            <li><a class="dropdown-item" href="index.php?page=productos&categoria=accesorios">Accesorios y Complementos</a></li>
                            <li><a class="dropdown-item" href="index.php?page=productos&categoria=porta-notebook">Porta Notebook</a></li>
                            <li><a class="dropdown-item" href="index.php?page=productos&categoria=billeteras">Billeteras y Monederos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActivePage('quienes-somos'); ?>" href="index.php?page=quienes-somos">
                            <i class="fas fa-users me-1"></i>Quiénes Somos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActivePage('blog'); ?>" href="index.php?page=blog">
                            <i class="fas fa-blog me-1"></i>Blog
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActivePage('contacto'); ?>" href="index.php?page=contacto">
                            <i class="fas fa-envelope me-1"></i>Contacto
                        </a>
                    </li>
                </ul>

                <!-- Acciones del usuario -->
                <div class="d-flex align-items-center">
                    <a href="#" class="btn btn-outline-secondary btn-sm me-2">
                        <i class="fas fa-user me-1"></i>Crear cuenta
                    </a>
                    <a href="#" class="btn btn-outline-secondary btn-sm me-2">
                        <i class="fas fa-sign-in-alt me-1"></i>Iniciar sesión
                    </a>
                    <a href="#" class="btn btn-outline-secondary btn-sm me-3">
                        <i class="fas fa-store me-1"></i>Mayoristas
                    </a>
                    
                    <!-- Carrito y búsqueda -->
                    <a href="#" class="text-decoration-none text-dark me-3" title="Buscar">
                        <i class="fas fa-search"></i>
                    </a>
                    <a href="#" class="text-decoration-none text-dark me-3" title="Carrito">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge bg-primary ms-1">0</span>
                    </a>
                    
                    <!-- Redes sociales -->
                    <a href="#" class="text-decoration-none text-dark me-2" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-decoration-none text-dark" title="Facebook">
                        <i class="fab fa-facebook"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- Espaciador para el menú fijo -->
<div class="menu-spacer"></div> 