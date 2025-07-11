<?php
$currentPage = getCurrentPage();
if ($currentPage !== 'home' && $currentPage !== '') {
    return;
}

$featuredProducts = getFeaturedProducts(8);
$categories = getProductCategories();
?>

<!-- Hero Section -->
<section class="hero-section py-5 bg-gradient-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">
                    Tu Estilo, <span class="text-warning">Tu Camino</span>
                </h1>
                <p class="lead mb-4">
                    Descubre nuestra colección exclusiva de accesorios que marcan la diferencia. 
                    Diseños únicos para personas únicas.
                </p>
                <div class="d-flex gap-3">
                    <a href="index.php?page=productos" class="btn btn-warning btn-lg">
                        <i class="fas fa-shopping-bag me-2"></i>Ver Productos
                    </a>
                    <a href="index.php?page=quienes-somos" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-users me-2"></i>Conócenos
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="assets/images/hero-image.jpg" alt="TEO Accesorios" class="img-fluid rounded shadow-lg" 
                     onerror="this.src='https://via.placeholder.com/600x400/5DA1A9/ffffff?text=TEO+Accesorios'">
            </div>
        </div>
    </div>
</section>

<!-- Categorías destacadas -->
<section class="categories-section py-5">
    <div class="container">
        <h2 class="text-center mb-5 section-title">
            <i class="fas fa-th-large me-2"></i>Categorías Destacadas
        </h2>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="category-card text-center p-4 rounded shadow-sm">
                    <div class="category-icon mb-3">
                        <i class="fas fa-briefcase fa-3x text-primary"></i>
                    </div>
                    <h5>Mochilas</h5>
                    <p class="text-muted">Estilo y funcionalidad en cada diseño</p>
                    <a href="index.php?page=productos&categoria=mochilas" class="btn btn-outline-primary btn-sm">
                        Ver Productos
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="category-card text-center p-4 rounded shadow-sm">
                    <div class="category-icon mb-3">
                        <i class="fas fa-mug-hot fa-3x text-primary"></i>
                    </div>
                    <h5>Materos</h5>
                    <p class="text-muted">Compañeros perfectos para tu mate</p>
                    <a href="index.php?page=productos&categoria=materos" class="btn btn-outline-primary btn-sm">
                        Ver Productos
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="category-card text-center p-4 rounded shadow-sm">
                    <div class="category-icon mb-3">
                        <i class="fas fa-handbag fa-3x text-primary"></i>
                    </div>
                    <h5>Carteras</h5>
                    <p class="text-muted">Elegancia y practicidad</p>
                    <a href="index.php?page=productos&categoria=carteras" class="btn btn-outline-primary btn-sm">
                        Ver Productos
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="category-card text-center p-4 rounded shadow-sm">
                    <div class="category-icon mb-3">
                        <i class="fas fa-bag-shopping fa-3x text-primary"></i>
                    </div>
                    <h5>Riñoneras</h5>
                    <p class="text-muted">Prácticas y versátiles</p>
                    <a href="index.php?page=productos&categoria=rinoneras" class="btn btn-outline-primary btn-sm">
                        Ver Productos
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Productos destacados -->
<section class="featured-products py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5 section-title">
            <i class="fas fa-star me-2"></i>Productos Destacados
        </h2>
        <div class="row">
            <?php if (!empty($featuredProducts)): ?>
                <?php foreach ($featuredProducts as $product): ?>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card product-card h-100 shadow-sm">
                            <img src="<?php echo $product['image_url'] ?? 'https://via.placeholder.com/300x300/5DA1A9/ffffff?text=Producto'; ?>" 
                                 class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
                            <div class="card-body text-center">
                                <h5 class="card-title product-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                                <p class="card-text product-price"><?php echo formatPrice($product['price']); ?></p>
                                <a href="index.php?page=producto&id=<?php echo $product['id']; ?>" 
                                   class="btn btn-primary btn-sm">Ver Producto</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Productos de ejemplo con imágenes ilustrativas -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card product-card h-100 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=300&h=300&fit=crop&crop=center" 
                             class="card-img-top" alt="Mochila Premium" 
                             onerror="this.src='https://via.placeholder.com/300x300/5DA1A9/ffffff?text=Mochila+Premium'">
                        <div class="card-body text-center">
                            <h5 class="card-title product-title">Mochila Premium</h5>
                            <p class="card-text product-price">$15.000</p>
                            <a href="#" class="btn btn-primary btn-sm">Ver Producto</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card product-card h-100 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=300&h=300&fit=crop&crop=center" 
                             class="card-img-top" alt="Matero Clásico" 
                             onerror="this.src='https://via.placeholder.com/300x300/5DA1A9/ffffff?text=Matero+Clásico'">
                        <div class="card-body text-center">
                            <h5 class="card-title product-title">Matero Clásico</h5>
                            <p class="card-text product-price">$8.500</p>
                            <a href="#" class="btn btn-primary btn-sm">Ver Producto</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card product-card h-100 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1584917865442-48f60103fc96?w=300&h=300&fit=crop&crop=center" 
                             class="card-img-top" alt="Cartera Elegante" 
                             onerror="this.src='https://via.placeholder.com/300x300/5DA1A9/ffffff?text=Cartera+Elegante'">
                        <div class="card-body text-center">
                            <h5 class="card-title product-title">Cartera Elegante</h5>
                            <p class="card-text product-price">$12.000</p>
                            <a href="#" class="btn btn-primary btn-sm">Ver Producto</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card product-card h-100 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1591561954557-26941169b49e?w=300&h=300&fit=crop&crop=center" 
                             class="card-img-top" alt="Riñonera Sport" 
                             onerror="this.src='https://via.placeholder.com/300x300/5DA1A9/ffffff?text=Riñonera+Sport'">
                        <div class="card-body text-center">
                            <h5 class="card-title product-title">Riñonera Sport</h5>
                            <p class="card-text product-price">$6.500</p>
                            <a href="#" class="btn btn-primary btn-sm">Ver Producto</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card product-card h-100 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1583485088034-697b5bc36b35?w=300&h=300&fit=crop&crop=center" 
                             class="card-img-top" alt="Cartuchera Organizadora" 
                             onerror="this.src='https://via.placeholder.com/300x300/5DA1A9/ffffff?text=Cartuchera+Organizadora'">
                        <div class="card-body text-center">
                            <h5 class="card-title product-title">Cartuchera Organizadora</h5>
                            <p class="card-text product-price">$3.500</p>
                            <a href="#" class="btn btn-primary btn-sm">Ver Producto</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card product-card h-100 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1611652022419-a9419f74343d?w=300&h=300&fit=crop&crop=center" 
                             class="card-img-top" alt="Accesorio Decorativo" 
                             onerror="this.src='https://via.placeholder.com/300x300/5DA1A9/ffffff?text=Accesorio+Decorativo'">
                        <div class="card-body text-center">
                            <h5 class="card-title product-title">Accesorio Decorativo</h5>
                            <p class="card-text product-price">$2.800</p>
                            <a href="#" class="btn btn-primary btn-sm">Ver Producto</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card product-card h-100 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?w=300&h=300&fit=crop&crop=center" 
                             class="card-img-top" alt="Porta Notebook 15" 
                             onerror="this.src='https://via.placeholder.com/300x300/5DA1A9/ffffff?text=Porta+Notebook+15'">
                        <div class="card-body text-center">
                            <h5 class="card-title product-title">Porta Notebook 15"</h5>
                            <p class="card-text product-price">$9.500</p>
                            <a href="#" class="btn btn-primary btn-sm">Ver Producto</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card product-card h-100 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1627123424574-724758594e93?w=300&h=300&fit=crop&crop=center" 
                             class="card-img-top" alt="Billetera Clásica" 
                             onerror="this.src='https://via.placeholder.com/300x300/5DA1A9/ffffff?text=Billetera+Clásica'">
                        <div class="card-body text-center">
                            <h5 class="card-title product-title">Billetera Clásica</h5>
                            <p class="card-text product-price">$4.500</p>
                            <a href="#" class="btn btn-primary btn-sm">Ver Producto</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="text-center mt-4">
            <a href="index.php?page=productos" class="btn btn-outline-primary btn-lg">
                <i class="fas fa-th-large me-2"></i>Ver Todos los Productos
            </a>
        </div>
    </div>
</section>

<!-- Sección de características -->
<section class="features-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 text-center">
                <div class="feature-icon mb-3">
                    <i class="fas fa-shipping-fast fa-3x text-primary"></i>
                </div>
                <h5>Envío Gratis</h5>
                <p class="text-muted">En compras superiores a $50.000</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 text-center">
                <div class="feature-icon mb-3">
                    <i class="fas fa-shield-alt fa-3x text-primary"></i>
                </div>
                <h5>Garantía</h5>
                <p class="text-muted">30 días de garantía en todos los productos</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 text-center">
                <div class="feature-icon mb-3">
                    <i class="fas fa-credit-card fa-3x text-primary"></i>
                </div>
                <h5>Pagos Seguros</h5>
                <p class="text-muted">Múltiples formas de pago disponibles</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 text-center">
                <div class="feature-icon mb-3">
                    <i class="fas fa-headset fa-3x text-primary"></i>
                </div>
                <h5>Atención 24/7</h5>
                <p class="text-muted">Soporte técnico disponible siempre</p>
            </div>
        </div>
    </div>
</section> 