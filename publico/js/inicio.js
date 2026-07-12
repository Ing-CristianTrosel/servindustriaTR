const totalPagado = document.getElementById('totalPagado');
if (totalPagado) {
    totalPagado.textContent = '$1500';
}

document.addEventListener('DOMContentLoaded', function () {
    const rows = document.querySelectorAll('.clickable-row');
    const productoInput = document.getElementById('productoCompra');
    const precioInput = document.getElementById('precioCompra');
    const areaInput = document.getElementById('areaCompra');
    const cantidadInput = document.getElementById('cantidadCompra');
    const totalInput = document.getElementById('totalCompra');
    const form = document.getElementById('formCompra');
    const modalElement = document.getElementById('modalCompra');

    if (!productoInput || !precioInput || !areaInput || !cantidadInput || !totalInput || !form || !modalElement) {
        return;
    }

    const modal = window.bootstrap?.Modal?.getOrCreateInstance(modalElement);
    let selectedPrice = 0;

    function updateTotal() {
        const cantidad = parseInt(cantidadInput.value, 10) || 1;
        totalInput.textContent = '$' + (selectedPrice * cantidad).toFixed(2);
    }

    function fillModal(row) {
        selectedPrice = parseFloat(row.dataset.price || 0);
        productoInput.textContent = row.dataset.product || '';
        precioInput.textContent = '$' + selectedPrice.toFixed(2);
        areaInput.textContent = row.dataset.area || '';
        cantidadInput.value = row.dataset.quantity = '1';
        updateTotal();
    }

    cantidadInput.addEventListener('input', updateTotal);

    rows.forEach(function (row) {
        row.addEventListener('click', function () {
            fillModal(row);
            modal.show();
        });

        row.addEventListener('keydown', function (event) {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                fillModal(row);
                modal.show();
            }
        });
    });

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        alert('Añadido al carrito.');
        modal.hide();
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('sidebar-toggle');
    const sidebar = document.getElementById('sidebar-menu');
    const backdrop = document.getElementById('sidebar-backdrop');
    const closeBtn = document.getElementById('sidebar-close');

    if (toggleBtn && sidebar && backdrop) {
        const openSidebar = function () {
            sidebar.classList.add('active');
            backdrop.classList.add('active');
            toggleBtn.setAttribute('aria-expanded', 'true');
            document.body.style.overflow = 'hidden';
        };

        const closeSidebar = function () {
            sidebar.classList.remove('active');
            backdrop.classList.remove('active');
            toggleBtn.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        };

        toggleBtn.addEventListener('click', openSidebar);
        if (closeBtn) {
            closeBtn.addEventListener('click', closeSidebar);
        }
        backdrop.addEventListener('click', closeSidebar);
        sidebar.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', closeSidebar);
        });
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && sidebar.classList.contains('active')) {
                closeSidebar();
            }
        });
    }

    const openFormBtn = document.getElementById('open-form-btn');
    const closeFormBtn = document.getElementById('close-form-btn');
    const formOverlay = document.getElementById('service-form-overlay');
    const actualForm = document.getElementById('actual-service-form');

    if (!openFormBtn || !closeFormBtn || !formOverlay || !actualForm) {
        return;
    }

    openFormBtn.addEventListener('click', function (event) {
        event.preventDefault();
        formOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    });

    const closeForm = function () {
        formOverlay.classList.remove('active');
        document.body.style.overflow = '';
    };

    closeFormBtn.addEventListener('click', closeForm);

    formOverlay.addEventListener('click', function (e) {
        if (e.target === formOverlay) {
            closeForm();
        }
    });

    actualForm.addEventListener('submit', function () {
        closeForm();
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Buscamos todos los select dentro del formulario de servicio
    const nativeSelects = document.querySelectorAll("#actual-service-form .form-select");

    nativeSelects.forEach((nativeSelect) => {
        // 1. Ocultar el select nativo de forma segura
        nativeSelect.style.display = "none";

        // 2. Crear el contenedor principal del Dropdown de Bootstrap
        const dropdownContainer = document.createElement("div");
        dropdownContainer.className = "dropdown w-100";

        // 3. Crear el botón principal que abrirá el menú
        const dropdownButton = document.createElement("button");
        dropdownButton.className = "btn dropdown-toggle dropdown-toggle-custom";
        dropdownButton.type = "button";
        dropdownButton.setAttribute("data-bs-toggle", "dropdown");
        dropdownButton.setAttribute("aria-expanded", "false");

        // Span interno para manejar texto largo y puntos suspensivos (...)
        const buttonText = document.createElement("span");
        
        // Obtener la opción inicialmente seleccionada (en este caso las predeterminadas con disabled)
        const initialSelected = nativeSelect.querySelector('option[selected]');
        buttonText.textContent = initialSelected ? initialSelected.text : "Seleccione una opción";
        dropdownButton.appendChild(buttonText);

        // 4. Crear la lista desplegable (UL)
        const dropdownMenu = document.createElement("ul");
        dropdownMenu.className = "dropdown-menu custom-dropdown-menu";

        // 5. Clonar las opciones ignorando las que posean el atributo 'disabled'
        Array.from(nativeSelect.options).forEach((option) => {
            // Si la opción está deshabilitada (el marcador de posición), no la agregamos al menú visual
            if (option.disabled) return;

            const li = document.createElement("li");
            const btnItem = document.createElement("button");
            btnItem.className = "dropdown-item";
            btnItem.type = "button";
            btnItem.textContent = option.text;
            btnItem.setAttribute("data-value", option.value);

            // Si por algún motivo una opción válida ya viniera seleccionada por defecto
            if (option.selected && !option.disabled) {
                btnItem.classList.add("active");
            }

            // Evento al elegir una opción de la lista
            btnItem.addEventListener("click", function () {
                // Sincronizar valor con el select oculto para procesarlo con PHP
                nativeSelect.value = option.value;
                nativeSelect.dispatchEvent(new Event("change"));

                // Actualizar texto en la cabecera del botón principal
                buttonText.textContent = option.text;

                // Modificar el estado visual activo de las opciones
                dropdownMenu.querySelectorAll(".dropdown-item").forEach(item => item.classList.remove("active"));
                btnItem.classList.add("active");
            });

            li.appendChild(btnItem);
            dropdownMenu.appendChild(li);
        });

        // Ensamblar e insertar el nuevo dropdown al lado de su respectivo select original
        dropdownContainer.appendChild(dropdownButton);
        dropdownContainer.appendChild(dropdownMenu);
        nativeSelect.parentNode.insertBefore(dropdownContainer, nativeSelect.nextSibling);
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const fechaInput = document.getElementById("fecha_visita");
    const openFormBtn = document.getElementById("open-form-btn");

    // Función para calcular y establecer la fecha y hora mínima permitida
    function actualizarFechaMinima() {
        if (!fechaInput) return;
        
        const ahora = new Date();
        
        // Obtener los componentes de la fecha local ajustando los ceros a la izquierda si es necesario
        const año = ahora.getFullYear();
        const mes = String(ahora.getMonth() + 1).padStart(2, '0');
        const dia = String(ahora.getDate()).padStart(2, '0');
        const horas = String(ahora.getHours()).padStart(2, '0');
        const minutos = String(ahora.getMinutes()).padStart(2, '0');
        
        // El formato requerido por datetime-local es: YYYY-MM-DDTHH:MM
        const formatoMinimo = `${año}-${mes}-${dia}T${horas}:${minutos}`;
        
        // Aplicar la restricción al atributo min
        fechaInput.min = formatoMinimo;
    }

    // Ejecutar al cargar la página por primera vez
    actualizarFechaMinima();

    // Volver a calcular cada vez que se hace clic en "Solicitar Servicio" 
    // para garantizar precisión con los minutos exactos al abrir el formulario
    if (openFormBtn) {
        openFormBtn.addEventListener("click", function () {
            actualizarFechaMinima();
        });
    }

    // Validación extra preventiva al cambiar el valor manualmente o escribirlo
    if (fechaInput) {
        fechaInput.addEventListener("input", function () {
            const fechaSeleccionada = new Date(this.value);
            const ahora = new Date();

            // Si por algún motivo el navegador permite la entrada de una fecha pasada, limpiamos el campo
            if (fechaSeleccionada < ahora) {
                this.value = "";
                alert("No puedes seleccionar una fecha u hora anterior al momento actual.");
            }
        });
    }
});