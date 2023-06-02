<?php include("public/views/assets/header.php") ?>
<style>
    .form-check {
        align-items: unset;
    }
</style>
<main class="body_data">
    <?php include("public/views/assets/acadegroup.php") ?>
    <br>
    <div class="options">
        <div class="titulo">
            <?= $titulo ?>
        </div>
        <div class="action"></div>
    </div>
    <div id="textExample1" class="form-text mb-4">
        <b>Aviso:</b> aquí se cambiar el periodo escolar, por eso es solo recomendable hacerlo cuando realmente sea necesario, ya que el cambio hecho es irreversible.
    </div>
    <!-- <div id="textExample1" class="form-text text-danger msg_campos"></div> -->
    <form action="<?=url_global?>/usuarios/actualizar" method="POST" class="form">
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">
            <div class="col-lg-6 col-sm-12">
                <div class="form-outline datepicker-inicio" id="fechas" data-mdb-format="dd-mm-yyyy" data-mdb-toggle-button="false">
                    <input type="text" class="form-control" name="fechai" value="<?=$data->inicio?>" id="exampleDatepicker1" data-mdb-toggle="datepicker">
                    <label class="form-label" for="form6Example4">Inicio</label>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">    
                <div class="form-outline datepicker-cierre" id="fechas" data-mdb-format="dd-mm-yyyy" data-mdb-toggle-button="false">
                    <input type="text" class="form-control" name="fechac" value="<?=$data->cierre?>" id="exampleDatepicker2" data-mdb-toggle="datepicker">
                    <label class="form-label" for="form6Example4">Cierre</label>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col col-lg-12">
                <center>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="check" value="" id="flexCheckDefault" />
                        <label class="form-check-label" for="flexCheckDefault">Acepto los cambios</label>
                    </div>
                </center>
            </div>
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-system btn-block mb-4 actualizar"><i class="fa-regular fa-circle-check"></i> Guardar Cambios</button>
        <input type="hidden" name="id_periodoesc" value="<?=$data->id?>">
    </form>
</main>

<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/helpers.js"></script>
<script src="<?=url_global?>/public/recursos/js/pescolar.js"></script>
<?php include("public/views/assets/footer.php") ?>