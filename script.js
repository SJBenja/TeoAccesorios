document.addEventListener('DOMContentLoaded', () => {
    console.log('Página TEO Accesorios cargada completamente.');

    // Ejemplo de funcionalidad JS básica:
    // Podrías añadir un efecto al pasar el ratón por los productos,
    // o una funcionalidad para abrir/cerrar un menú lateral si no usaras el navbar de Bootstrap.

    // Ejemplo: Alerta simple al hacer clic en un botón de "Añadir al Carrito" (simulado)
    const addToCartButtons = document.querySelectorAll('.btn-add-cart');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault(); // Evita que el enlace recargue la página
            const productName = button.closest('.product-card').querySelector('.product-title').textContent;
            alert(`"${productName}" agregado al carrito (simulación).`);
        });
    });

    // Pequeño script para el menú dropdown de Bootstrap (aunque Bootstrap ya lo maneja):
    // Esto es más para customizar o añadir lógica extra si lo necesitas.
    const dropdownToggle = document.getElementById('navbarDropdownProductos');
    if (dropdownToggle) {
        dropdownToggle.addEventListener('click', function() {
            // Lógica adicional si es necesaria cuando se abre/cierra el dropdown
            console.log('Dropdown de Productos clickeado');
        });
    }

});