<?php include("public/views/assets/header.php") ?>
<?php ($_SESSION['rol'] == 1 && $_SESSION['ci']!=$data->ci) ? $col = 6 : $col = 12 ?>
<main class="body_data">
    <div class="options">
        <div class="titulo">
            <?= $titulo ?>
        </div>
        <div class="action">
            <a href="<?=url_global?>/usuarios/perfil?cl=<?=$ci[1]?>" class="btn btn-warning btn-rounded">
                <i class="fa-regular fa-circle-left"></i> Atrás
            </a>
        </div>
    </div>
    <div id="textExample1" class="form-text text-danger msg_campos"></div>
    <form action="<?=url_global?>/usuarios/actualizar" method="POST" class="form">
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">
            <div class="col-lg-<?=$col?> col-sm-12">
                <div class="form-outline">
                    <input type="text" id="form6Example4" class="form-control" name="username" value="<?=$data->username?>" onkeyup="verify_usere()"/>
                    <label class="form-label" for="form6Example4">Nombre de Usuario</label>
                </div>
            </div>
            <div class="col-lg-<?=$col?> col-sm-12">    
            <?php if($_SESSION['rol'] == 1 && $_SESSION['ci']!=$data->ci): ?>
                <select class="select" name="rol" onchange="verify_usere()">
                    <?php
                    $rol = ["Administrador" => 1, "Operador" => 2];
                    foreach($rol as $role => $option):
                        ($option == $data->rol) ? $selected = "selected" : $selected = "";
                        ($option == $data->rol) ? $disabled = "disabled" : $disabled = "";
                    ?>
                    <option value="<?=$option?>" <?=$selected?> <?=$disabled?>><?=$role?></option>
                    <?php endforeach ?>
                </select>
                <label class="form-label select-label">Rol</label>
            <?php endif ?>
            </div>
        </div>
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">
            <div class="col-lg-6 col-sm-12">
            <div class="form-outline">
                <input type="password" id="form6Example5" class="form-control" name="password" onkeyup="verify_usere()"/>
                <label class="form-label" for="form6Example5">Cambiar Contraseña</label>
            </div>
            <div id="textExample1" class="form-text text-danger msg_password"></div>
            </div>
            <div class="col-lg-6 col-sm-12">
            <div class="form-outline">
                <input type="password" id="form6Example6" class="form-control" name="rpassword" onkeyup="verify_usere()"/>
                <label class="form-label" for="form6Example6">Repetir Contraseña</label>
            </div>
            <div id="textExample1" class="form-text text-danger msg_rpassword"></div>
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-system btn-block mb-4 actualizar"><i class="fa-regular fa-circle-check"></i> Guardar Cambios</button>
        <input type="hidden" name="ci_hidden" value="<?=$ci[1]?>">
    </form>
</main>

<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/helpers.js"></script>
<script src="<?=url_global?>/public/recursos/js/usuarios.js"></script>
<?php include("public/views/assets/footer.php") ?>