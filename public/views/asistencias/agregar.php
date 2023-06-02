<?php include("public/views/assets/header.php") ?>
<style>
    .col-lg-6.col-sm-12,.col-sm-12 {
        text-align: center;
    }
</style>
<main class="body_data">
    <div class="options">
        <div class="titulo">
            <?= $titulo ?>
        </div>
        <div class="action">
            <a href="<?=url_global?>/asistencias" class="btn btn-warning btn-rounded">
                <i class="fa-regular fa-circle-left"></i> Atrás
            </a>
        </div>
    </div>
    <div id="textExample1" class="form-text text-danger msg_campos"></div>
    <form action="<?=url_global?>/asistencias/agregar" method="POST" class="form">
        <div class="mb-4">
            <select class="select" data-mdb-filter="true" name="ci_personal" onchange="cedula(this)">
        	    <option value="" disabled selected>seleccione una cédula</option>
                <?php foreach($data as $perso): ?>
                <option value="<?=$perso['ci']?>"><?=$perso['ci']." - ".$perso['nombre']." ".$perso['apellido']?></option>
                <?php endforeach ?>
            </select>
            <label class="form-label select-label">Cédula</label>
        </div>
        <div class="body-asis" style="display:none">
            <div class="row mb-4 info-asis"></div>
            <button type="submit" class="btn btn-system btn-block mb-4 agregar"></button>
        </div>
    </form>
</main>

<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/helpers.js"></script>
<script src="<?=url_global?>/public/recursos/js/asistencia.js"></script>
<?php include("public/views/assets/footer.php") ?>