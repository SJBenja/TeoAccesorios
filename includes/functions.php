<?php
/**
 * Funciones auxiliares para la aplicación
 */

/**
 * Conectar a la base de datos
 */
function connectDatabase() {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    } catch (PDOException $e) {
        error_log("Error de conexión a la base de datos: " . $e->getMessage());
        return false;
    }
}

/**
 * Formatear precio en pesos argentinos
 */
function formatPrice($price) {
    return CURRENCY_SYMBOL . ' ' . number_format($price, 0, ',', '.');
}

/**
 * Obtener la página actual
 */
function getCurrentPage() {
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    return $page;
}

/**
 * Verificar si la página actual es activa
 */
function isActivePage($pageName) {
    return getCurrentPage() === $pageName ? 'active' : '';
}

/**
 * Sanitizar entrada de datos
 */
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Validar email
 */
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * Generar respuesta JSON para API
 */
function jsonResponse($data, $status = 200) {
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

/**
 * Obtener productos destacados
 */
function getFeaturedProducts($limit = 8) {
    $pdo = connectDatabase();
    if (!$pdo) {
        return [];
    }
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM products WHERE featured = 1 AND active = 1 ORDER BY created_at DESC LIMIT ?");
        $stmt->execute([$limit]);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        error_log("Error al obtener productos destacados: " . $e->getMessage());
        return [];
    }
}

/**
 * Obtener categorías de productos
 */
function getProductCategories() {
    $pdo = connectDatabase();
    if (!$pdo) {
        return [];
    }
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM categories WHERE active = 1 ORDER BY name ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        error_log("Error al obtener categorías: " . $e->getMessage());
        return [];
    }
}

/**
 * Obtener posts del blog
 */
function getBlogPosts($limit = 6) {
    $pdo = connectDatabase();
    if (!$pdo) {
        return [];
    }
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM blog_posts WHERE active = 1 ORDER BY created_at DESC LIMIT ?");
        $stmt->execute([$limit]);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        error_log("Error al obtener posts del blog: " . $e->getMessage());
        return [];
    }
}

/**
 * Generar slug para URLs
 */
function generateSlug($string) {
    $string = strtolower($string);
    $string = preg_replace('/[^a-z0-9\s-]/', '', $string);
    $string = preg_replace('/[\s-]+/', '-', $string);
    $string = trim($string, '-');
    return $string;
}

/**
 * Obtener información de la empresa
 */
function getCompanyInfo() {
    return [
        'name' => COMPANY_NAME,
        'email' => COMPANY_EMAIL,
        'location' => COMPANY_LOCATION,
        'phone' => COMPANY_PHONE,
        'year' => COMPANY_YEAR
    ];
}
?> 