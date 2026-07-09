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

    