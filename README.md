# TEO Accesorios - Tu Estilo, Tu Camino

Sitio web profesional para TEO Accesorios, una empresa argentina especializada en accesorios de calidad. Desarrollado con PHP, Bootstrap 5, y Docker.

## 🚀 Características

### Diseño y UX
- **Diseño responsivo** que se adapta a todos los dispositivos
- **Header fijo** con menú que se ajusta al hacer scroll
- **Paleta de colores personalizada** con tonos azure-web, light-blue, moonstone
- **Footer diferenciado** con información de contacto y redes sociales
- **Animaciones suaves** y transiciones elegantes

### Productos y Categorías
- **Categorías destacadas** con imágenes ilustrativas:
  - Mochilas
  - Materos (productos regionales argentinos)
  - Carteras
  - Riñoneras
- **Productos destacados** con imágenes reales de Unsplash
- **Precios en pesos argentinos** (ARS)
- **Productos regionales** como bolsos para mate

### Redes Sociales
- **Iconos actualizados** en el footer:
  - Instagram
  - Facebook
  - WhatsApp
  - TikTok
  - Twitter

### Tecnologías Utilizadas
- **Backend**: PHP 8.2 con FPM
- **Frontend**: HTML5, CSS3, JavaScript
- **Framework CSS**: Bootstrap 5.3.3
- **Iconos**: Font Awesome 7.0.0
- **Servidor Web**: Nginx
- **Base de Datos**: MySQL 8.0
- **Contenedores**: Docker y Docker Compose

## 🛠️ Instalación

### Prerrequisitos
- Docker
- Docker Compose
- Git

### Pasos de instalación

1. **Clonar el repositorio**
```bash
git clone https://github.com/SJBenja/TeoAccesorios.git
cd TeoAccesorios
```

2. **Levantar los contenedores**
```bash
docker compose up -d
```

3. **Verificar que los servicios estén funcionando**
```bash
docker compose ps
```

## 🌐 Acceso a los servicios

- **Sitio web**: http://localhost
- **phpMyAdmin**: http://localhost:8080
  - Usuario: `root`
  - Contraseña: `root_password`
- **Base de datos MySQL**: localhost:3306
  - Base de datos: `teo_accesorios`
  - Usuario: `teo_user`
  - Contraseña: `teo_password`

## 📁 Estructura del proyecto

```
TeoAccesorios/
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── js/
│   │   └── script.js
│   ├── images/
│   └── logo.jpeg
├── includes/
│   ├── config.php
│   ├── functions.php
│   ├── header.php
│   ├── footer.php
│   └── home.php
├── docker/
│   ├── nginx/
│   ├── php/
│   └── mysql/
├── docker-compose.yml
├── Dockerfile
└── index.php
```

## 🔧 Configuración

### Variables de entorno
Las configuraciones principales se encuentran en `includes/config.php`:

```php
$config = [
    'company_name' => 'TEO Accesorios',
    'company_email' => 'info@teoaccesorios.com',
    'company_location' => 'Corrientes, Argentina',
    'company_year' => '2025',
    'currency' => 'ARS',
    'currency_symbol' => '$'
];
```

### Base de datos
La base de datos se inicializa automáticamente con:
- Tabla de productos
- Datos de ejemplo
- Configuración de categorías

## 🎨 Personalización

### Colores
Los colores principales están definidos en CSS variables:

```css
:root {
    --azure-web: #EDFCFD;
    --light-blue: #C1E0E3;
    --moonstone: #5DA1A9;
    --dark-color: #2C5A61;
}
```

### Imágenes
- **Logo**: `assets/logo.jpeg`
- **Productos**: Imágenes de Unsplash con fallbacks
- **Categorías**: Imágenes ilustrativas para cada categoría

## 🚀 Comandos útiles

### Docker
```bash
# Levantar servicios
docker compose up -d

# Detener servicios
docker compose down

# Ver logs
docker compose logs

# Reconstruir imágenes
docker compose build --no-cache
```

### Desarrollo
```bash
# Verificar estado de contenedores
docker compose ps

# Acceder al contenedor PHP
docker compose exec php sh

# Ver logs en tiempo real
docker compose logs -f
```

## 📝 Mejoras implementadas

### Versión actual (v1.2)
- ✅ **Emoji de Argentina** 🇦🇷 en el footer
- ✅ **Footer fijo** sin problemas de salto
- ✅ **Imágenes ilustrativas** para categorías y productos
- ✅ **Productos regionales argentinos** (bolsos para mate)
- ✅ **Redes sociales actualizadas** (TikTok, Twitter, sin YouTube)
- ✅ **Font Awesome 7.0.0** para iconos más completos
- ✅ **Archivo .gitignore** completo
- ✅ **Docker Compose optimizado** (sin version obsoleta)

### Características técnicas
- **Layout flexbox** para footer fijo
- **Imágenes responsivas** con object-fit
- **Fallbacks** para imágenes que no cargan
- **CSS variables** para fácil personalización
- **Animaciones CSS** suaves y profesionales

## 🤝 Contribución

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto está bajo la Licencia MIT - ver el archivo [LICENSE](LICENSE) para más detalles.

## 👨‍💻 Desarrollado con ❤️ en Argentina 🇦🇷

**TEO Accesorios** - Tu Estilo, Tu Camino

---

*Última actualización: Julio 2025*
