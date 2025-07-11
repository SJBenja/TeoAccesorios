# 🚀 TEO Accesorios - Tu Estilo, Tu Camino

Este repositorio contiene el código fuente de la página web de **TEO Accesorios**, una marca dedicada a ofrecer diseños únicos que marcan tu camino en accesorios. El proyecto está construido con PHP, HTML5, CSS3, JavaScript y utiliza las últimas tecnologías web.

## ✨ Características

* **Diseño Moderno y Responsivo:** Adaptable a todos los dispositivos (escritorio, tabletas y móviles)
* **Header Fijo:** Navegación que permanece visible durante el scroll
* **Footer Diferenciado:** Información organizada por secciones con enlaces útiles
* **API RESTful:** Backend preparado para consumo de base de datos
* **Docker Ready:** Configuración completa con Nginx, PHP-FPM y MySQL
* **Bootstrap 5:** Framework CSS más reciente para componentes UI
* **Font Awesome 6:** Librería de íconos moderna
* **Precios en Pesos Argentinos:** Formato de moneda local
* **Configuración Dinámica:** Footer y header no hardcodeados para fácil mantenimiento

## 🛠️ Tecnologías Utilizadas

### Frontend
* **HTML5:** Estructura semántica de la página web
* **CSS3:** Estilos personalizados con variables CSS y diseño responsivo
* **JavaScript (ES6+):** Funcionalidades interactivas y animaciones
* **Bootstrap 5.3.3:** Framework CSS para componentes y grid system
* **Font Awesome 6.5.2:** Librería de íconos

### Backend
* **PHP 8.2:** Lenguaje de programación del lado del servidor
* **MySQL 8.0:** Base de datos relacional
* **PDO:** Acceso seguro a la base de datos
* **API RESTful:** Endpoints para productos, categorías, blog y contacto

### DevOps
* **Docker:** Contenedores para desarrollo y producción
* **Nginx:** Servidor web de alto rendimiento
* **PHP-FPM:** Procesador PHP optimizado
* **Docker Compose:** Orquestación de servicios

## 📂 Estructura del Proyecto

```
TeoAccesorios/
├── api/                          # API RESTful
│   ├── controllers/              # Controladores de la API
│   │   ├── ProductController.php
│   │   ├── CategoryController.php
│   │   ├── ContactController.php
│   │   └── BlogController.php
│   └── index.php                 # Punto de entrada de la API
├── assets/                       # Archivos estáticos
│   ├── css/
│   │   └── style.css            # Estilos personalizados
│   ├── js/
│   │   └── script.js            # JavaScript principal
│   └── images/                   # Imágenes del sitio
├── includes/                     # Archivos PHP incluidos
│   ├── config.php               # Configuración principal
│   ├── functions.php            # Funciones auxiliares
│   ├── header.php               # Header de la página
│   ├── footer.php               # Footer de la página
│   └── home.php                 # Página de inicio
├── docker/                       # Configuración de Docker
│   ├── nginx/
│   │   ├── nginx.conf           # Configuración principal de Nginx
│   │   └── conf.d/
│   │       └── default.conf     # Configuración del sitio
│   ├── php/
│   │   ├── Dockerfile           # Dockerfile para PHP
│   │   └── php.ini              # Configuración de PHP
│   └── mysql/
│       └── init.sql             # Script de inicialización de BD
├── database/                     # Scripts de base de datos
├── index.php                     # Punto de entrada principal
├── docker-compose.yml           # Configuración de Docker Compose
├── LICENSE                       # Licencia MIT
└── README.md                     # Este archivo
```

## 🚀 Instalación y Configuración

### Prerrequisitos
* Docker y Docker Compose instalados
* Git para clonar el repositorio

### Pasos de Instalación

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/tu-usuario/teo-accesorios.git
   cd teo-accesorios
   ```

2. **Configurar variables de entorno (opcional)**
   ```bash
   cp includes/config.php.example includes/config.php
   # Editar includes/config.php con tus configuraciones
   ```

3. **Levantar los servicios con Docker**
   ```bash
   docker-compose up -d
   ```

4. **Verificar que los servicios estén funcionando**
   ```bash
   docker-compose ps
   ```

5. **Acceder a la aplicación**
   - **Sitio web:** http://localhost
   - **phpMyAdmin:** http://localhost:8080
   - **API:** http://localhost/api/v1/

### Configuración de Base de Datos

La base de datos se inicializa automáticamente con:
- **Host:** localhost (desde contenedor: mysql)
- **Puerto:** 3306
- **Base de datos:** teo_accesorios
- **Usuario:** teo_user
- **Contraseña:** teo_password
- **Root password:** root_password

## 📱 Páginas y Funcionalidades

### Páginas Principales
* **Inicio (Home):** Hero section, productos destacados, categorías
* **Productos y Servicios:** Catálogo completo con filtros
* **Quiénes Somos:** Información sobre la empresa
* **Blog:** Artículos y noticias
* **Contacto:** Formulario de contacto funcional
* **Política de Privacidad:** Información legal

### Funcionalidades
* **Navegación Responsiva:** Menú adaptativo para móviles
* **Búsqueda de Productos:** Filtrado por categoría y texto
* **Carrito de Compras:** Gestión de productos (localStorage)
* **Formulario de Contacto:** Validación y envío de mensajes
* **API RESTful:** Endpoints para productos, categorías, blog
* **Animaciones CSS:** Efectos visuales suaves
* **Lazy Loading:** Carga optimizada de imágenes

## 🔧 Configuración de Desarrollo

### Variables de Configuración

Edita `includes/config.php` para personalizar:
- Información de la empresa
- Configuración de base de datos
- Configuración de API
- Configuración de moneda

### Personalización de Estilos

Los estilos principales están en `assets/css/style.css` con variables CSS para fácil personalización:
```css
:root {
    --primary-color: #26a69a;
    --secondary-color: #00796b;
    --accent-color: #ffc107;
    /* ... más variables */
}
```

## 🐳 Comandos Docker Útiles

```bash
# Levantar servicios
docker-compose up -d

# Ver logs
docker-compose logs -f

# Parar servicios
docker-compose down

# Reconstruir contenedores
docker-compose up -d --build

# Acceder al contenedor PHP
docker-compose exec php sh

# Acceder a MySQL
docker-compose exec mysql mysql -u root -p
```

## 📊 API Endpoints

### Productos
- `GET /api/v1/products` - Listar productos
- `GET /api/v1/products/{id}` - Obtener producto específico
- `POST /api/v1/products` - Crear producto
- `PUT /api/v1/products/{id}` - Actualizar producto
- `DELETE /api/v1/products/{id}` - Eliminar producto

### Categorías
- `GET /api/v1/categories` - Listar categorías
- `GET /api/v1/categories/{id}` - Obtener categoría específica

### Contacto
- `POST /api/v1/contact` - Enviar mensaje de contacto

### Blog
- `GET /api/v1/blog` - Listar posts del blog
- `GET /api/v1/blog/{id}` - Obtener post específico

## 🎨 Personalización

### Colores y Estilos
Los colores principales se pueden modificar en las variables CSS del archivo `assets/css/style.css`.

### Información de la Empresa
Edita las constantes en `includes/config.php`:
```php
define('COMPANY_NAME', 'TEO Accesorios');
define('COMPANY_EMAIL', 'info@teoaccesorios.com');
define('COMPANY_LOCATION', 'Corrientes, Argentina');
```

### Contenido
- **Productos:** Modifica la base de datos o usa la API
- **Blog:** Gestiona posts desde la base de datos
- **Categorías:** Configura desde la base de datos

## 🔒 Seguridad

* **Headers de Seguridad:** Configurados en Nginx
* **Validación de Entrada:** Sanitización de datos en PHP
* **Prepared Statements:** Consultas SQL seguras
* **CORS Configurado:** Para la API
* **Archivos Sensibles Protegidos:** Configuración en Nginx

## 📈 Rendimiento

* **OPcache Habilitado:** Para PHP
* **Gzip Compression:** En Nginx
* **Lazy Loading:** Para imágenes
* **CDN:** Bootstrap y Font Awesome desde CDN
* **Caching:** Headers de cache para archivos estáticos

## 🤝 Contribuciones

Este es un proyecto de código abierto. Si deseas contribuir:

1. Fork el repositorio
2. Crea una rama para tu feature (`git checkout -b feature/nueva-funcionalidad`)
3. Commit tus cambios (`git commit -am 'Agregar nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Crea un Pull Request

### Reportar Bugs
Abre un "Issue" para reportar bugs o proponer nuevas características.

## 📄 Licencia

Este proyecto está licenciado bajo la **Licencia MIT** - ver el archivo [LICENSE](LICENSE) para más detalles.

```
MIT License

Copyright (c) 2025 TEO Accesorios

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

## 📞 Contacto

* **Email:** info@teoaccesorios.com
* **Ubicación:** Corrientes, Argentina
* **Sitio Web:** [TEO Accesorios](http://localhost)

---

**Desarrollado con ❤️ en Argentina**
