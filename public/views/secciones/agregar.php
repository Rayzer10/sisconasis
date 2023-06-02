<?php include("public/views/assets/header.php") ?>

<main class="body_data">
    <div class="options">
        <div class="titulo">
            <?= $titulo ?>
        </div>
        <div class="action">
            <a href="<?=url_global?>/secciones" class="btn btn-warning btn-rounded">
                <i class="fa-regular fa-circle-left"></i> Atrás
            </a>
        </div>
    </div>
    <div id="textExample1" class="form-text text-danger msg_campos"></div>
    <form action="<?=url_global?>/usuarios/agregar" method="POST" class="form">
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="periodo_escolar">
                    Periodo Escolar: <?= current(explode("-", $p_escolar->inicio)) ?> - <?= current(explode("-", $p_escolar->cierre)) ?>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-6 col-sm-12">
                <select class="select" name="aescolar" onchange="">
                    <option value="" disabled selected>Seleccione</option>
                    <?php foreach($data as $rows): ?>
                    <option value="<?=$rows['id']?>"><?=ucwords($rows['nombre'])?></option>
                    <?php endforeach ?>
                </select>
                <label class="form-label select-label">Año Escolar</label>
            </div>
            <div class="col-lg-6 col-sm-12">
                <select class="select secciones" name="secciones" multiple="" onchange="">
                </select>
                <label class="form-label select-label">Secciones</label>
            </div>
        </div>

        <div class="user-data"></div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-system btn-block mb-4 agregar"><i class="fa-solid fa-plus"></i> agregar secciones</button>
    </form>
</main>

<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/helpers.js"></script>
<script src="<?=url_global?>/public/recursos/js/secciones.js"></script>
<?php include("public/views/assets/footer.php") ?>