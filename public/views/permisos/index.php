<?php include("public/views/assets/header.php") ?>
<style>
    .modal-body {
        max-height: 300px;
        overflow-y: auto;
        overflow-x: hidden;
        text-align: justify;
    }
</style>
<main class="body_data">
    <?php include("public/views/assets/asisgroup.php") ?>
    <div class="options">
        <div class="titulo">
            <?= $titulo ?>
        </div>
        <div class="action">
            <?php if($_SESSION['rol'] == 1 || ($_SESSION['rol'] == 2 && $_SESSION['agregar'] == 1) || ($_SESSION['rol'] == 3 && $_SESSION['agregar'] == 1)): ?>
                <a href="<?=url_global?>/permisos/formulario" class="btn btn-system btn-rounded btn-width">
                <i class="fa-solid fa-plus"></i> Agregar Permiso</a>
            <?php endif ?>
        </div>
    </div>
    <div class="mb-2">
        <div class="col-3">
            <select class="select" name="filtro" onchange="filtro()">
                <option value="1">Vigente</option>
                <option value="2">Vencido</option>
            </select>
            <label class="form-label select-label">Filtrar por:</label>
        </div>
    </div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody class="result">
        </tbody>
        <tfoot>
            <tr>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Detalles</th>
            </tr>
        </tfoot>
    </table>
</main>

<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/permisos.js"></script>
<?php include("public/views/assets/footer.php") ?>