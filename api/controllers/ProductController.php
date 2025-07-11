<?php
/**
 * Controlador de Productos
 * Maneja todas las operaciones CRUD para productos
 */

class ProductController {
    
    public function getProducts($params = []) {
        try {
            $pdo = connectDatabase();
            if (!$pdo) {
                throw new Exception('Error de conexión a la base de datos');
            }
            
            $sql = "SELECT p.*, c.name as category_name 
                    FROM products p 
                    LEFT JOIN categories c ON p.category_id = c.id 
                    WHERE p.active = 1";
            $params_array = [];
            
            // Filtros
            if (isset($params['category'])) {
                $sql .= " AND c.slug = ?";
                $params_array[] = $params['category'];
            }
            
            if (isset($params['search'])) {
                $sql .= " AND (p.name LIKE ? OR p.description LIKE ?)";
                $search_term = "%{$params['search']}%";
                $params_array[] = $search_term;
                $params_array[] = $search_term;
            }
            
            if (isset($params['featured'])) {
                $sql .= " AND p.featured = ?";
                $params_array[] = $params['featured'];
            }
            
            // Ordenamiento
            $sql .= " ORDER BY p.created_at DESC";
            
            // Paginación
            $limit = isset($params['limit']) ? (int)$params['limit'] : 20;
            $offset = isset($params['offset']) ? (int)$params['offset'] : 0;
            $sql .= " LIMIT ? OFFSET ?";
            $params_array[] = $limit;
            $params_array[] = $offset;
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params_array);
            $products = $stmt->fetchAll();
            
            // Contar total de productos
            $count_sql = "SELECT COUNT(*) as total FROM products p 
                         LEFT JOIN categories c ON p.category_id = c.id 
                         WHERE p.active = 1";
            $count_stmt = $pdo->prepare($count_sql);
            $count_stmt->execute();
            $total = $count_stmt->fetch()['total'];
            
            return [
                'success' => true,
                'data' => $products,
                'total' => $total,
                'limit' => $limit,
                'offset' => $offset
            ];
            
        } catch (Exception $e) {
            throw new Exception('Error al obtener productos: ' . $e->getMessage());
        }
    }
    
    public function getProduct($id) {
        try {
            $pdo = connectDatabase();
            if (!$pdo) {
                throw new Exception('Error de conexión a la base de datos');
            }
            
            $sql = "SELECT p.*, c.name as category_name 
                    FROM products p 
                    LEFT JOIN categories c ON p.category_id = c.id 
                    WHERE p.id = ? AND p.active = 1";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $product = $stmt->fetch();
            
            if (!$product) {
                throw new Exception('Producto no encontrado', 404);
            }
            
            return [
                'success' => true,
                'data' => $product
            ];
            
        } catch (Exception $e) {
            throw new Exception('Error al obtener producto: ' . $e->getMessage());
        }
    }
    
    public function createProduct($data) {
        try {
            $pdo = connectDatabase();
            if (!$pdo) {
                throw new Exception('Error de conexión a la base de datos');
            }
            
            // Validar datos requeridos
            $required_fields = ['name', 'price', 'category_id'];
            foreach ($required_fields as $field) {
                if (!isset($data[$field]) || empty($data[$field])) {
                    throw new Exception("Campo requerido: {$field}");
                }
            }
            
            $sql = "INSERT INTO products (name, description, price, category_id, image_url, featured, active, created_at) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $data['name'],
                $data['description'] ?? '',
                $data['price'],
                $data['category_id'],
                $data['image_url'] ?? '',
                $data['featured'] ?? 0,
                $data['active'] ?? 1
            ]);
            
            $product_id = $pdo->lastInsertId();
            
            return [
                'success' => true,
                'message' => 'Producto creado exitosamente',
                'data' => ['id' => $product_id]
            ];
            
        } catch (Exception $e) {
            throw new Exception('Error al crear producto: ' . $e->getMessage());
        }
    }
    
    public function updateProduct($id, $data) {
        try {
            $pdo = connectDatabase();
            if (!$pdo) {
                throw new Exception('Error de conexión a la base de datos');
            }
            
            // Verificar que el producto existe
            $check_sql = "SELECT id FROM products WHERE id = ?";
            $check_stmt = $pdo->prepare($check_sql);
            $check_stmt->execute([$id]);
            
            if (!$check_stmt->fetch()) {
                throw new Exception('Producto no encontrado', 404);
            }
            
            // Construir query de actualización
            $update_fields = [];
            $params = [];
            
            $allowed_fields = ['name', 'description', 'price', 'category_id', 'image_url', 'featured', 'active'];
            
            foreach ($allowed_fields as $field) {
                if (isset($data[$field])) {
                    $update_fields[] = "{$field} = ?";
                    $params[] = $data[$field];
                }
            }
            
            if (empty($update_fields)) {
                throw new Exception('No hay campos para actualizar');
            }
            
            $update_fields[] = "updated_at = NOW()";
            $params[] = $id;
            
            $sql = "UPDATE products SET " . implode(', ', $update_fields) . " WHERE id = ?";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            
            return [
                'success' => true,
                'message' => 'Producto actualizado exitosamente'
            ];
            
        } catch (Exception $e) {
            throw new Exception('Error al actualizar producto: ' . $e->getMessage());
        }
    }
    
    public function deleteProduct($id) {
        try {
            $pdo = connectDatabase();
            if (!$pdo) {
                throw new Exception('Error de conexión a la base de datos');
            }
            
            // Soft delete - marcar como inactivo
            $sql = "UPDATE products SET active = 0, updated_at = NOW() WHERE id = ?";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            
            if ($stmt->rowCount() === 0) {
                throw new Exception('Producto no encontrado', 404);
            }
            
            return [
                'success' => true,
                'message' => 'Producto eliminado exitosamente'
            ];
            
        } catch (Exception $e) {
            throw new Exception('Error al eliminar producto: ' . $e->getMessage());
        }
    }
}
?> 