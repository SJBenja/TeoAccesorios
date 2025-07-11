-- TEO Accesorios Database Initialization
-- Create database and tables

USE teo_accesorios;

-- Create categories table
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) UNIQUE NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create products table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    category_id INT,
    image_url VARCHAR(255),
    featured TINYINT(1) DEFAULT 0,
    active TINYINT(1) DEFAULT 1,
    stock INT DEFAULT 0,
    sku VARCHAR(50) UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

-- Create blog_posts table
CREATE TABLE IF NOT EXISTS blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    content TEXT,
    excerpt TEXT,
    image_url VARCHAR(255),
    author VARCHAR(100),
    active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create contact_messages table
CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    subject VARCHAR(255),
    message TEXT NOT NULL,
    status ENUM('new', 'read', 'replied') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert default categories
INSERT INTO categories (name, slug, description) VALUES
('Mochilas', 'mochilas', 'Mochilas de alta calidad para todos los usos'),
('Materos', 'materos', 'Materos tradicionales y modernos'),
('Carteras', 'carteras', 'Carteras elegantes y funcionales'),
('Riñoneras', 'rinoneras', 'Riñoneras prácticas y versátiles'),
('Cartucheras y Neceseres', 'cartucheras', 'Organizadores y neceseres'),
('Accesorios y Complementos', 'accesorios', 'Accesorios para complementar tu estilo'),
('Porta Notebook', 'porta-notebook', 'Fundas y organizadores para notebooks'),
('Billeteras y Monederos', 'billeteras', 'Billeteras y monederos de calidad');

-- Insert sample products
INSERT INTO products (name, description, price, category_id, image_url, featured, stock, sku) VALUES
('Mochila Premium', 'Mochila de alta calidad con múltiples compartimentos', 15000.00, 1, 'https://via.placeholder.com/300x300/26a69a/ffffff?text=Mochila+Premium', 1, 10, 'MOCH-001'),
('Matero Clásico', 'Matero tradicional con diseño argentino', 8500.00, 2, 'https://via.placeholder.com/300x300/26a69a/ffffff?text=Matero+Clásico', 1, 15, 'MATE-001'),
('Cartera Elegante', 'Cartera elegante para ocasiones especiales', 12000.00, 3, 'https://via.placeholder.com/300x300/26a69a/ffffff?text=Cartera+Elegante', 1, 8, 'CART-001'),
('Riñonera Sport', 'Riñonera deportiva y práctica', 6500.00, 4, 'https://via.placeholder.com/300x300/26a69a/ffffff?text=Riñonera+Sport', 1, 20, 'RIN-001'),
('Cartuchera Organizadora', 'Cartuchera con múltiples compartimentos', 3500.00, 5, 'https://via.placeholder.com/300x300/26a69a/ffffff?text=Cartuchera+Organizadora', 0, 25, 'CARTU-001'),
('Accesorio Decorativo', 'Accesorio para complementar tu estilo', 2800.00, 6, 'https://via.placeholder.com/300x300/26a69a/ffffff?text=Accesorio+Decorativo', 0, 30, 'ACC-001'),
('Porta Notebook 15"', 'Funda protectora para notebook de 15 pulgadas', 9500.00, 7, 'https://via.placeholder.com/300x300/26a69a/ffffff?text=Porta+Notebook+15', 0, 12, 'NOTE-001'),
('Billetera Clásica', 'Billetera de cuero genuino', 4500.00, 8, 'https://via.placeholder.com/300x300/26a69a/ffffff?text=Billetera+Clásica', 0, 18, 'BILL-001');

-- Insert sample blog posts
INSERT INTO blog_posts (title, slug, content, excerpt, author) VALUES
('Cómo elegir la mochila perfecta', 'como-elegir-mochila-perfecta', 'Contenido completo del artículo sobre cómo elegir la mochila perfecta...', 'Guía completa para elegir la mochila ideal según tus necesidades', 'TEO Accesorios'),
('Tendencias en accesorios 2025', 'tendencias-accesorios-2025', 'Contenido completo sobre las tendencias en accesorios para 2025...', 'Descubre las últimas tendencias en accesorios para este año', 'TEO Accesorios'),
('Cuidado y mantenimiento de materos', 'cuidado-mantenimiento-materos', 'Contenido completo sobre el cuidado y mantenimiento de materos...', 'Consejos para mantener tu matero en perfectas condiciones', 'TEO Accesorios');

-- Create indexes for better performance
CREATE INDEX idx_products_category ON products(category_id);
CREATE INDEX idx_products_featured ON products(featured);
CREATE INDEX idx_products_active ON products(active);
CREATE INDEX idx_categories_active ON categories(active);
CREATE INDEX idx_blog_posts_active ON blog_posts(active);
CREATE INDEX idx_contact_messages_status ON contact_messages(status); 