<?php include("public/views/assets/header.php") ?>

<main class="body_data">
    <div class="options">
        <div class="titulo">
            <?= $titulo ?>
        </div>
        <div class="action">
            <a href="<?=url_global?>/permisos" class="btn btn-warning btn-rounded">
                <i class="fa-regular fa-circle-left"></i> Atrás
            </a>
        </div>
    </div>
    <div id="textExample1" class="form-text text-danger msg_campos"></div>
    <form action="<?=url_global?>/permisos/agregar" method="POST" class="form">
        <div class="mb-4">
            <select class="select" data-mdb-filter="true" name="ci_personal" onchange="vpermiso()">
        	    <option value="" disabled selected>seleccione una cédula</option>
                <?php foreach($data as $perso): ?>
                <option value="<?=$perso['ci']?>"><?=$perso['ci']." - ".$perso['nombre']." ".$perso['apellido']?></option>
                <?php endforeach ?>
            </select>
            <label class="form-label select-label">Cédula</label>
        </div>
        <div class="row mb-4">
            <div class="col-lg-6 col-sm-12">
                <div class="form-outline datepicker-inicio" id="fechas" data-mdb-format="dd-mm-yyyy" data-mdb-toggle-button="false">
                    <input type="text" class="form-control" name="fecha_inicio" id="exampleDatepicker1" data-mdb-toggle="datepicker" onblur="vpermiso()">
                    <label class="form-label" for="form6Example4">Fecha Inicio</label>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">    
                <div class="form-outline datepicker-fin" id="fechas" data-mdb-format="dd-mm-yyyy" data-mdb-toggle-button="false">
                    <input type="text" class="form-control" name="fecha_fin" id="exampleDatepicker2" data-mdb-toggle="datepicker" onblur="vpermiso()">
                    <label class="form-label" for="form6Example4">Fecha Fin</label>
                </div>
            </div>
        </div>

        <div class="user-data"></div>

        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">
            <div class="col-sm-12">
                <div class="form-outline">
                    <textarea class="form-control" name="motivo" id="textAreaExample" rows="4" onkeyup="Mayus(this);vpermiso()" maxlength="500"></textarea>
                    <label class="form-label" for="textAreaExample">Motivo</label>
                </div>
            </div>
            
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-system btn-block mb-4 agregar"><i class="fa-solid fa-plus"></i> agregar permiso</button>
    </form>
</main>

<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/helpers.js"></script>
<script src="<?=url_global?>/public/recursos/js/permisos.js"></script>
<?php include("public/views/assets/footer.php") ?>