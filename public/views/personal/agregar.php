<?php include("public/views/assets/header.php") ?>

<main class="body_data">
    <div class="options">
        <div class="titulo">
            <?= $titulo ?>
        </div>
        <div class="action">
            <a href="<?=url_global?>/personal" class="btn btn-warning btn-rounded">
                <i class="fa-regular fa-circle-left"></i> Atrás
            </a>
        </div>
    </div>
    <div id="textExample1" class="form-text text-danger msg_campos"></div>
    <form action="<?=url_global?>/personal/agregar" method="POST" class="form">
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">
            <div class="col-lg-6 col-sm-12">
            <div class="form-outline">
                <input type="text" id="form6Example1" class="form-control" name="nombre" maxlength="20"onkeypress=
                  "return soloLetras(event)" onkeyup="Mayus(this);verify_perso()"/>
                <label class="form-label" for="form6Example1">Nombre</label>
            </div>
            </div>
            <div class="col-lg-6 col-sm-12">
            <div class="form-outline">
                <input type="text" id="form6Example2" class="form-control" name="apellido" maxlength="20" onkeypress=
                  "return soloLetras(event)" onkeyup="Mayus(this);verify_perso()"/>
                <label class="form-label" for="form6Example2">Apellido</label>
            </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-6 col-sm-12">
                <div class="form-outline">
                    <input type="text" id="form6Example3" class="form-control" name="ci" minlength="7" maxlength="10" onkeypress=
                        "return soloNumeros(event)" onkeyup="verify_perso()"/>
                    <label class="form-label" for="form6Example3">Cédula</label>
                </div>
                <div id="textExample1" class="form-text text-danger personal-unique"></div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="form-outline">
                    <input type="email" id="form6Example4" class="form-control" name="correo" maxlength="25" onkeyup="verify_perso()"/>
                    <label class="form-label" for="form6Example4">Correo</label>
                </div>
                <div id="textExample1" class="form-text text-danger msg_email"></div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-6 col-sm-12">
                <div class="form-outline">
                    <input type="tel" id="form6Example5" class="form-control" name="telefono" maxlength="12" onkeyup="verify_perso()"/>
                    <label class="form-label" for="form6Example5">Teléfono</label>
                </div>
                <div id="textExample1" class="form-text text-danger msg_email"></div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="form-outline">
                    <input type="numeric" id="form6Example5" class="form-control" name="horas_totales" maxlength="3" onkeypress="return soloNumeros(event)" onkeyup="verify_perso()"/>
                    <label class="form-label" for="form6Example5">Horas Totales</label>
                </div>
            </div>
        </div>
        <div class="form-outline mb-4">
            <input type="text" id="form6Example5" class="form-control" name="grado_instruccional" maxlength="50" onkeypress="return soloLetras(event)" onkeyup="Mayus(this);verify_perso()"/>
            <label class="form-label" for="form6Example5">Grado Instruccional</label>
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-system btn-block mb-4 agregar"><i class="fa-solid fa-plus"></i> agregar persona</button>
    </form>
</main>

<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/helpers.js"></script>
<script src="<?=url_global?>/public/recursos/js/personal.js"></script>
<?php include("public/views/assets/footer.php") ?>
<script>
    /* const t = document.querySelector("[name=telefono]")
    t.addEventListener("keyup", (e) =>{
        let value = e.target.value;
        console.log(e.target.value = value.replace(/^(\d{4})/, '$1-').replace(/(.{3})/g, '$1 ');)
    }) */
</script>