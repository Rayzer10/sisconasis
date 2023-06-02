<?php include("public/views/assets/header.php") ?>
<style>
    .info-table{
        display: flex;
        justify-content: space-between;
    }
    input.fecha {
        padding-left: 5px;
    }
</style>
<main class="body_data">
    <?php include("public/views/assets/asisgroup.php") ?>
    <div class="options">
        <div class="titulo">
            <?= $titulo ?>
        </div>
        <div class="action">
            <a href="<?=url_global?>/asistencias/formulario" class="btn btn-system btn-rounded btn-width">
            <i class="fa-solid fa-plus"></i> Agregar Asistencia</a>
        </div>
    </div>
    <div class="row mb-2">
            <?php 
                $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']; 
                $mes = $meses[date('m') - 1];
            ?>
    <div class="info-table mb-2">
        <div>Filtrar por: <input type="date" data-date="" name="fecha" class="fecha" onchange="filtro()"></div>
        <div><b>Fecha:</b> <span class="fechacomp"><?= date("d") . " de " . $mes . " del " . date("Y") ?></span></div>
    </div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Entrada</th>
                <th>Salida</th>
            </tr>
        </thead>
        <tbody class="result">
        </tbody>
        <tfoot>
            <tr>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Entrada</th>
                <th>Salida</th>
            </tr>
        </tfoot>
    </table>
</main>

<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/asistencia.js"></script>
<?php include("public/views/assets/footer.php") ?>