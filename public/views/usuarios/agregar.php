<?php include("public/views/assets/header.php") ?>

<main class="body_data">
    <div class="options">
        <div class="titulo">
            <?= $titulo ?>
        </div>
        <div class="action">
            <a href="<?=url_global?>/usuarios" class="btn btn-warning btn-rounded">
                <i class="fa-regular fa-circle-left"></i> Atrás
            </a>
        </div>
    </div>
    <div id="textExample1" class="form-text text-danger msg_campos"></div>
    <form action="<?=url_global?>/usuarios/agregar" method="POST" class="form">
        <!-- 2 column grid layout with text inputs for the first and last names -->
       <!--  <div class="form-outline mb-4">
            <input type="text" id="form6Example3" class="form-control" name="ci" minlength="7" maxlength="10" onkeypress=
                  "return soloNumeros(event)" onkeyup="verify_user()"/>
            <label class="form-label" for="form6Example3">Cédula</label>
        </div> -->
        <div class="mb-4">
            <select class="select" data-mdb-filter="true" name="ci_personal" onchange="cedula()">
        	    <option value="" disabled selected>seleccione una cédula</option>
                <?php foreach($data as $perso): ?>
                <option value="<?=$perso['ci']?>"><?=$perso['ci']." - ".$perso['nombre']." ".$perso['apellido']?></option>
                <?php endforeach ?>
            </select>
            <label class="form-label select-label">Cédula</label>
        </div>
        <!-- <div class="row mb-4">
            <div class="col-lg-6 col-sm-12">
            <div class="form-outline">
                <input type="text" id="form6Example1" class="form-control" name="nombre" maxlength="20"onkeypress=
                  "return soloLetras(event)" onkeyup="verify_user()"/>
                <label class="form-label" for="form6Example1">Nombre</label>
            </div>
            </div>
            <div class="col-lg-6 col-sm-12">
            <div class="form-outline">
                <input type="text" id="form6Example2" class="form-control" name="apellido" maxlength="20" onkeypress=
                  "return soloLetras(event)" onkeyup="verify_user()"/>
                <label class="form-label" for="form6Example2">Apellido</label>
            </div>
            </div>
        </div> -->
        <div class="row mb-4">
            <div class="col-lg-6 col-sm-12">
                <div class="form-outline">
                    <input type="text" id="form6Example4" class="form-control" name="username" maxlength="15" onkeyup="verify_user()"/>
                    <label class="form-label" for="form6Example4">Nombre de Usuario</label>
                </div>
                <div id="textExample1" class="form-text text-danger usuarios-unique"></div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <select class="select" name="rol" onchange="verify_user()">
                    <?php
                    foreach($roles as $role):
                    ?>
                    <option value="<?= $role['id'] ?>"><?= ucfirst($role['rol']) ?></option>
                    <?php endforeach ?>
                </select>
                <label class="form-label select-label">Rol</label>
            </div>
        </div>

        <div class="user-data"></div>

        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">
            <div class="col-lg-6 col-sm-12">
            <div class="form-outline">
                <input type="password" id="form6Example5" class="form-control" name="password" maxlength="30" onkeyup="verify_user()"/>
                <label class="form-label" for="form6Example5">Contraseña</label>
            </div>
            <div id="textExample1" class="form-text text-danger msg_password"></div>
            </div>
            <div class="col-lg-6 col-sm-12">
            <div class="form-outline">
                <input type="password" id="form6Example6" class="form-control" name="rpassword" maxlength="30" onkeyup="verify_user()"/>
                <label class="form-label" for="form6Example6">Repetir Contraseña</label>
            </div>
            <div id="textExample1" class="form-text text-danger msg_rpassword"></div>
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-system btn-block mb-4 agregar"><i class="fa-solid fa-plus"></i> agregar usuario</button>
    </form>
</main>

<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/helpers.js"></script>
<script src="<?=url_global?>/public/recursos/js/usuarios.js"></script>
<?php include("public/views/assets/footer.php") ?>