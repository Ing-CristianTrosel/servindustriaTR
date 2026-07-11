
// Desplegar info de pago
document.getElementById('metodoPago').addEventListener('change', function() {
    const contenedor = document.getElementById('infoPagoMovil');
    if (this.value === 'pago_movil') {
        contenedor.classList.remove('d-none');
    } else {
        contenedor.classList.add('d-none');
    }
});

// Función de verificación (ejemplo)
function verificarPago() {
	const inputRef = document.getElementById('referencia');
	const valor = inputRef.value.trim();
	
	if (valor.length === 4 && /^\d+$/.test(valor)) {
		alert("Referencia registrada con éxito");
        contenedor.classList.remove('d-none');
	} else {
		alert("Error: Debe ingresar exactamente 4 dígitos numéricos.");
		inputRef.focus();
	}
}