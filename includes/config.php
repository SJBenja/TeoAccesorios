<?php
// Configuración de la aplicación
define('APP_NAME', 'TEO Accesorios');
define('APP_VERSION', '1.0.0');
define('APP_URL', 'http://localhost');

// Configuración de la empresa
define('COMPANY_NAME', 'TEO Accesorios');
define('COMPANY_EMAIL', 'info@teoaccesorios.com');
define('COMPANY_LOCATION', 'Corrientes, Argentina');
define('COMPANY_YEAR', '2025');
define('COMPANY_PHONE', '+54 9 379 123-4567');

// Configuración de moneda
define('CURRENCY', 'ARS');
define('CURRENCY_SYMBOL', '$');

// Configuración de base de datos
define('DB_HOST', 'localhost');
define('DB_NAME', 'teo_accesorios');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Configuración de API
define('API_VERSION', 'v1');
define('API_BASE_URL', '/api/' . API_VERSION);

// Configuración de rutas
define('ROOT_PATH', dirname(__DIR__));
define('INCLUDES_PATH', ROOT_PATH . '/includes');
define('ASSETS_PATH', ROOT_PATH . '/assets');

// Configuración de sesión
session_start();

// Configuración de zona horaria
date_default_timezone_set('America/Argentina/Buenos_Aires');

// Configuración de errores (solo en desarrollo)
if ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_NAME'] === '127.0.0.1') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}
?> 