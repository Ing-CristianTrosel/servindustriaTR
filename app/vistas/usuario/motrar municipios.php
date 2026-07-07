<?php
// Ejemplo de cómo luciría tu variable de PHP extraída de la base de datos
// (Puede ser un array simple o un array asociativo con ID y Nombre)
$municipios = [
    ["id" => 1, "nombre" => "Valencia"],
    ["id" => 2, "nombre" => "Puerto Cabello"],
    ["id" => 3, "nombre" => "Naguanagua"],
    ["id" => 4, "nombre" => "San Diego"],
];
?>

<div class="mb-3">
    <label for="municipioInput" class="form-label">Selecciona o busca un municipio</label>
    
    <input 
        class="form-control" 
        list="listaMunicipios" 
        id="municipioInput" 
        name="municipio" 
        placeholder="Escribe para buscar..."
        autocomplete="off"
    >
    
    <datalist id="listaMunicipios">
        <?php foreach ($municipios as $municipio): ?>
            <option value="<?php echo htmlspecialchars($municipio['nombre']); ?>">
        <?php endforeach; ?>
    </datalist>
</div>