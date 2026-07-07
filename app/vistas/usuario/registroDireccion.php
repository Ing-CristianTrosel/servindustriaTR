<?php
use app\modelo\ModeloCliente;

$mostrar = new ModeloCliente();
$estados = $mostrar->mostrarEstados();

$estadoSeleccionado = $_POST['estado_id'];
$municipios = [];

if ($estadoSeleccionado) {
    $municipios = $mostrar->mostrarMunicipios($estadoSeleccionado);
}
?>

<div class="container mt-4">
    <form action="" method="POST" id="formGeografico">
        
        <div class="mb-3">
            <label for="estadoSelect" class="form-label">Estado</label>
            <select class="form-select" id="estadoSelect" name="estado_id" onchange="this.form.submit()">
                <option value="" selected disabled>Selecciona un estado...</option>
                <?php foreach ($estados as $estado): ?>
                    <option value="<?php echo $estado['id']; ?>" <?php echo ($estadoSeleccionado == $estado['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($estado['nombre_estado']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="municipioSelect" class="form-label">Municipio</label>
            <select class="form-select" id="municipioSelect" name="municipio_id" <?php echo empty($municipios) ? 'disabled' : ''; ?>>
                <?php if (empty($municipios)): ?>
                    <option value="" selected disabled>Selecciona primero un estado...</option>
                <?php else: ?>
                    <option value="" selected disabled>Selecciona un municipio...</option>
                    <?php foreach ($municipios as $municipio): ?>
                        <option value="<?php echo $municipio['nombre_municipio']; ?>">
                            <?php echo htmlspecialchars($municipio['nombre_municipio']); ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>        
    </form>
</div>
