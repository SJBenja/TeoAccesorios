<?php
/**
 * API TEO Accesorios
 * Punto de entrada principal para todas las peticiones API
 */

// Configuración de CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Content-Type: application/json');

// Manejar preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Incluir configuración
require_once '../includes/config.php';
require_once '../includes/functions.php';

// Obtener la ruta de la petición
$request_uri = $_SERVER['REQUEST_URI'];
$base_path = '/api/v1/';
$path = str_replace($base_path, '', parse_url($request_uri, PHP_URL_PATH));

// Dividir la ruta en segmentos
$segments = explode('/', trim($path, '/'));
$resource = $segments[0] ?? '';
$id = $segments[1] ?? null;

// Obtener el método HTTP
$method = $_SERVER['REQUEST_METHOD'];

// Obtener datos de la petición
$input = json_decode(file_get_contents('php://input'), true);
$query_params = $_GET;

try {
    // Enrutamiento básico
    switch ($resource) {
        case 'products':
            require_once 'controllers/ProductController.php';
            $controller = new ProductController();
            
            switch ($method) {
                case 'GET':
                    if ($id) {
                        $response = $controller->getProduct($id);
                    } else {
                        $response = $controller->getProducts($query_params);
                    }
                    break;
                    
                case 'POST':
                    $response = $controller->createProduct($input);
                    break;
                    
                case 'PUT':
                    $response = $controller->updateProduct($id, $input);
                    break;
                    
                case 'DELETE':
                    $response = $controller->deleteProduct($id);
                    break;
                    
                default:
                    throw new Exception('Método no permitido', 405);
            }
            break;
            
        case 'categories':
            require_once 'controllers/CategoryController.php';
            $controller = new CategoryController();
            
            switch ($method) {
                case 'GET':
                    if ($id) {
                        $response = $controller->getCategory($id);
                    } else {
                        $response = $controller->getCategories();
                    }
                    break;
                    
                case 'POST':
                    $response = $controller->createCategory($input);
                    break;
                    
                default:
                    throw new Exception('Método no permitido', 405);
            }
            break;
            
        case 'contact':
            require_once 'controllers/ContactController.php';
            $controller = new ContactController();
            
            switch ($method) {
                case 'POST':
                    $response = $controller->submitContact($input);
                    break;
                    
                default:
                    throw new Exception('Método no permitido', 405);
            }
            break;
            
        case 'blog':
            require_once 'controllers/BlogController.php';
            $controller = new BlogController();
            
            switch ($method) {
                case 'GET':
                    if ($id) {
                        $response = $controller->getPost($id);
                    } else {
                        $response = $controller->getPosts($query_params);
                    }
                    break;
                    
                default:
                    throw new Exception('Método no permitido', 405);
            }
            break;
            
        default:
            throw new Exception('Recurso no encontrado', 404);
    }
    
    // Enviar respuesta
    jsonResponse($response);
    
} catch (Exception $e) {
    $status_code = $e->getCode() ?: 500;
    jsonResponse([
        'error' => true,
        'message' => $e->getMessage()
    ], $status_code);
}
?> 