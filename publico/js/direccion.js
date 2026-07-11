document.addEventListener('DOMContentLoaded', () => {
    const buscador = document.getElementById('buscarEstado');
    const selectEstado = document.getElementById('estado');

    if (buscador && selectEstado) {
        buscador.addEventListener('input', function() {
            // Convertimos el texto de búsqueda a minúsculas para comparar fácilmente
            const terminoBusqueda = this.value.toLowerCase();
            const opciones = selectEstado.options;

            for (let i = 0; i < opciones.length; i++) {
                const opcion = opciones[i];
                
                // Saltamos la primera opción ("Seleccione un estado") para que no se oculte
                if (opcion.disabled) continue; 

                const textoOpcion = opcion.text.toLowerCase();

                // Si el texto de la opción incluye lo que escribió el usuario, se muestra; si no, se oculta
                if (textoOpcion.includes(terminoBusqueda)) {
                    opcion.style.display = ""; // Muestra la opción
                } else {
                    opcion.style.display = "none"; // Oculta la opción
                }
            }
        });
    }
});