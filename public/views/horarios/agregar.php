<?php include("public/views/assets/header.php") ?>

<main class="body_data">
    <div class="options">
        <div class="titulo">
            <?= $titulo ?>
        </div>
        <div class="action">
            <a href="<?=url_global?>/horarios" class="btn btn-warning btn-rounded">
                <i class="fa-regular fa-circle-left"></i> Atrás
            </a>
        </div>
    </div>
    <div id="textExample1" class="form-text text-danger msg_campos"></div>
    <form action="<?=url_global?>/horarios/agregar" method="POST" class="form">
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="periodo_escolar">
                    Periodo Escolar: <?= current(explode("-", $p_escolar->inicio)) ?> - <?= current(explode("-", $p_escolar->cierre)) ?>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <select class="select" data-mdb-filter="true" name="ci_personal" onchange="horarios_vali()">
        	    <option value="" disabled selected>seleccione una cédula</option>
                <?php foreach($data as $perso): ?>
                <option value="<?=$perso['ci']?>"><?=$perso['ci']." - ".$perso['nombre']." ".$perso['apellido']?></option>
                <?php endforeach ?>
            </select>
            <label class="form-label select-label">Docentes</label>
        </div>
        <div class="row mb-4">
            <div class="col-lg-6 col-sm-12">
                <select class="select" data-mdb-filter="true" name="seccion" onchange="horarios_vali()">
                    <option value="" disabled selected>Seleccione</option>
                    <?php foreach($secc as $rows): ?>
                    <option value="<?=$rows['id']?>"><?=ucwords($rows['nombre'])." - ".ucfirst($rows['nombre_s'])?></option>
                    <?php endforeach ?>
                </select>
                <label class="form-label select-label">Años - Secciones</label>
            </div>
            <div class="col-lg-6 col-sm-12">
                <select class="select" name="diasemanas" onchange="horarios_vali()">
                    <option value="" disabled selected>Seleccione</option>
                    <?php foreach($diase as $rows): ?>
                    <option value="<?=$rows['id']?>"><?=ucwords($rows['dias'])?></option>
                    <?php endforeach ?>
                </select>
                <label class="form-label select-label">Días de la Semana</label>
            </div>
        </div>

        <!-- 2 column grid layout with text inputs for the first and last names -->
                        
        <div class="row mb-4">
            <div class="col-lg-6 col-sm-12">
                <div class="form-outline timepicker1 time" data-timepicker-format24="true">
                    <input type="text" name="entrada" class="form-control" id="form1" data-toggle="timepicker" onkeypress="return soloNumeros(event)" required>
                    <label class="form-label" for="form1">Entrada</label>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="form-outline timepicker2 time" data-timepicker-format24="true">
                    <input type="text" name="salida" class="form-control" id="form2" data-toggle="timepicker" onkeypress="return soloNumeros(event)" required>
                    <label class="form-label" for="form2">Salida</label>
                </div>
            </div>
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-system btn-block mb-4 agregar_horarios"><i class="fa-solid fa-plus"></i> agregar</button>
    </form>
</main>

<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/helpers.js"></script>
<script src="<?=url_global?>/public/recursos/js/horarios.js"></script>
<?php include("public/views/assets/footer.php") ?>