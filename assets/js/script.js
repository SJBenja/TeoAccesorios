/**
 * TEO Accesorios - Script principal
 * Funcionalidades interactivas para la aplicación
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Inicializar todas las funcionalidades
    initNavbar();
    initScrollEffects();
    initProductCards();
    initContactForm();
    initSearchFunctionality();
    initCartFunctionality();
    initAnimations();
    
    console.log('TEO Accesorios - Aplicación cargada correctamente');
});

/**
 * Funcionalidades de la barra de navegación
 */
function initNavbar() {
    const navbar = document.querySelector('.navbar-header');
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    const menuSpacer = document.querySelector('.menu-spacer');
    
    // Efecto de scroll en la navbar
    window.addEventListener('scroll', function() {
        if (window.scrollY > 100) {
            navbar.classList.add('scrolled');
            navbar.style.position = 'fixed';
            navbar.style.top = '0';
            navbar.style.left = '0';
            navbar.style.right = '0';
            navbar.style.zIndex = '1030';
            
            // Agregar espaciador para compensar el header fijo
            if (menuSpacer) {
                menuSpacer.style.height = navbar.offsetHeight + 'px';
                menuSpacer.style.display = 'block';
            }
        } else {
            navbar.classList.remove('scrolled');
            navbar.style.position = 'relative';
            
            // Ocultar espaciador
            if (menuSpacer) {
                menuSpacer.style.display = 'none';
            }
        }
    });
    
    // Cerrar menú móvil al hacer clic en un enlace
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (navbarCollapse.classList.contains('show')) {
                navbarToggler.click();
            }
        });
    });
    
    // Dropdown hover en desktop
    const dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('mouseenter', function() {
            if (window.innerWidth > 992) {
                this.querySelector('.dropdown-menu').classList.add('show');
            }
        });
        
        dropdown.addEventListener('mouseleave', function() {
            if (window.innerWidth > 992) {
                this.querySelector('.dropdown-menu').classList.remove('show');
            }
        });
    });
}

/**
 * Efectos de scroll
 */
function initScrollEffects() {
    // Animación de elementos al hacer scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in-up');
            }
        });
    }, observerOptions);
    
    // Observar elementos para animación
    const animatedElements = document.querySelectorAll('.card, .category-card, .feature-icon');
    animatedElements.forEach(el => {
        observer.observe(el);
    });
}

/**
 * Funcionalidades de las tarjetas de productos
 */
function initProductCards() {
    const productCards = document.querySelectorAll('.product-card');
    
    productCards.forEach(card => {
        // Efecto hover
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
        
        // Lazy loading para imágenes
        const img = card.querySelector('img');
        if (img) {
            img.addEventListener('load', function() {
                this.style.opacity = '1';
            });
            
            img.addEventListener('error', function() {
                this.src = 'https://via.placeholder.com/300x300/5DA1A9/ffffff?text=Producto';
            });
        }
    });
}

/**
 * Funcionalidades del formulario de contacto
 */
function initContactForm() {
    const contactForm = document.querySelector('#contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validación básica
            const name = this.querySelector('#name').value.trim();
            const email = this.querySelector('#email').value.trim();
            const message = this.querySelector('#message').value.trim();
            
            if (!name || !email || !message) {
                showAlert('Por favor, completa todos los campos', 'warning');
                return;
            }
            
            if (!isValidEmail(email)) {
                showAlert('Por favor, ingresa un email válido', 'warning');
                return;
            }
            
            // Simular envío
            showAlert('Mensaje enviado correctamente. Te responderemos pronto.', 'success');
            this.reset();
        });
    }
}

/**
 * Funcionalidades de búsqueda
 */
function initSearchFunctionality() {
    const searchInput = document.querySelector('#searchInput');
    const searchButton = document.querySelector('#searchButton');
    
    if (searchInput && searchButton) {
        searchButton.addEventListener('click', function() {
            const query = searchInput.value.trim();
            if (query) {
                window.location.href = `index.php?page=productos&buscar=${encodeURIComponent(query)}`;
            }
        });
        
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchButton.click();
            }
        });
    }
}

/**
 * Funcionalidades del carrito
 */
function initCartFunctionality() {
    // Contador del carrito
    let cartCount = 0;
    const cartBadge = document.querySelector('.badge');
    
    // Botones de agregar al carrito
    const addToCartButtons = document.querySelectorAll('.btn-add-cart');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const productName = this.closest('.product-card').querySelector('.product-title').textContent;
            const productPrice = this.closest('.product-card').querySelector('.product-price').textContent;
            
            // Agregar al carrito
            cartCount++;
            if (cartBadge) {
                cartBadge.textContent = cartCount;
            }
            
            // Mostrar notificación
            showAlert(`${productName} agregado al carrito`, 'success');
            
            // Guardar en localStorage
            saveToCart(productName, productPrice);
        });
    });
}

/**
 * Animaciones generales
 */
function initAnimations() {
    // Contador animado para precios
    const priceElements = document.querySelectorAll('.product-price');
    
    priceElements.forEach(element => {
        const finalPrice = element.textContent;
        element.textContent = '$0';
        
        setTimeout(() => {
            animateNumber(element, 0, parseFloat(finalPrice.replace(/[^\d]/g, '')), 1000);
        }, 500);
    });
    
    // Efecto parallax en hero section
    const heroSection = document.querySelector('.hero-section');
    if (heroSection) {
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            heroSection.style.transform = `translateY(${rate}px)`;
        });
    }
}

/**
 * Utilidades
 */

// Validar email
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Mostrar alertas
function showAlert(message, type = 'info') {
    const alertContainer = document.createElement('div');
    alertContainer.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    alertContainer.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
    alertContainer.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    document.body.appendChild(alertContainer);
    
    // Auto-remover después de 5 segundos
    setTimeout(() => {
        if (alertContainer.parentNode) {
            alertContainer.remove();
        }
    }, 5000);
}

// Animación de números
function animateNumber(element, start, end, duration) {
    const startTime = performance.now();
    const difference = end - start;
    
    function updateNumber(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        const current = start + (difference * progress);
        element.textContent = formatPrice(Math.floor(current));
        
        if (progress < 1) {
            requestAnimationFrame(updateNumber);
        } else {
            element.textContent = formatPrice(end);
        }
    }
    
    requestAnimationFrame(updateNumber);
}

// Formatear precio
function formatPrice(price) {
    return '$ ' + price.toLocaleString('es-AR');
}

// Guardar en carrito (localStorage)
function saveToCart(name, price) {
    let cart = JSON.parse(localStorage.getItem('cart') || '[]');
    cart.push({
        name: name,
        price: price,
        date: new Date().toISOString()
    });
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Cargar carrito desde localStorage
function loadCart() {
    const cart = JSON.parse(localStorage.getItem('cart') || '[]');
    const cartBadge = document.querySelector('.badge');
    if (cartBadge) {
        cartBadge.textContent = cart.length;
    }
    return cart;
}

// Limpiar carrito
function clearCart() {
    localStorage.removeItem('cart');
    const cartBadge = document.querySelector('.badge');
    if (cartBadge) {
        cartBadge.textContent = '0';
    }
}

// API calls
const API = {
    async getProducts(category = null, search = null) {
        try {
            let url = '/api/v1/products';
            const params = new URLSearchParams();
            
            if (category) params.append('category', category);
            if (search) params.append('search', search);
            
            if (params.toString()) {
                url += '?' + params.toString();
            }
            
            const response = await fetch(url);
            return await response.json();
        } catch (error) {
            console.error('Error fetching products:', error);
            return [];
        }
    },
    
    async submitContact(formData) {
        try {
            const response = await fetch('/api/v1/contact', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            });
            return await response.json();
        } catch (error) {
            console.error('Error submitting contact form:', error);
            return { success: false, message: 'Error al enviar el formulario' };
        }
    }
};

// Exportar funciones para uso global
window.TEOApp = {
    showAlert,
    formatPrice,
    clearCart,
    loadCart,
    API
}; 