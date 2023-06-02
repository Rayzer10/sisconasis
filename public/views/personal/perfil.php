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
    <div class="perfil">
        <div class="row mb-4">
            <div class="col-lg-4 col-sm-6">
                <div style="font-weight:bold">Nombre</div>
                <?= $data->nombre ?> <?= $data->apellido ?>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div style="font-weight:bold">Cédula</div>
                <?= $data->ci ?>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div style="font-weight:bold">Teléfono</div>
                <?= preg_replace('/^(\d{4})/', '${1}-$2', $data->telefono); ?>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-4 col-sm-12">
                <div style="font-weight:bold">Correo</div>
                <?= $data->correo ?>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div style="font-weight:bold">Estado</div>
                <?php 
                    if($data->estado == 1){
                        $estado = "Activo";
                        $class="bg-success";
                    }else {
                        $estado = "Inactivo";
                        $class="bg-danger";
                    }
                ?>
                <span class="status <?=$class?>"><?= $estado ?></span>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div style="font-weight:bold">Horas Totales</div>
                <?= $data->horas_totales ?>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <div style="font-weight:bold">Grado Instruccional</div>
                <?= $data->grado_instruccional ?>
            </div>
        </div>
        <div class="row">
            <hr>
        </div>
        <div class="row"> 
            <div class="col-12">
                <?php if($_SESSION['rol'] == 1 || ($_SESSION['rol'] == 2 && $_SESSION['editar'] == 1) || ($_SESSION['rol'] == 3 && $_SESSION['editar'] == 1)): ?>
                    <form action="<?=url_global?>/personal/editar" method="GET" style="display:initial">
                        <button type="submit" class="btn btn-rounded btn-system">
                            <i class="fa-solid fa-user-pen"></i> Editar
                        </button>
                        <input type="hidden" name="ci" value="<?=$ci[1]?>">
                    </form>
                <?php endif ?>
                <?php 
                    if($data->estado == 1){
                        $estado = "Desactivar";
                        $background = "btn-danger";
                        $ico = "fa-xmark";
                    }else{
                        $estado = "Activar";
                        $background = "btn-success";
                        $ico = "fa-check";
                    }
                ?>
                <?php if($_SESSION['rol']!=2): ?>
                    <?php if($data->ci!=$_SESSION['ci']): ?>
                        <button type="submit" class="btn btn-rounded <?=$background?> btn-estado">
                            <i class="fa-solid <?=$ico?> fa-lg"></i> <?=$estado?>
                        </button>
                        <input type="hidden" name="cod_resistro" value="<?=$data->estado?>">
                        <input type="hidden" name="cedula" value="<?=$data->ci?>">
                    <?php endif ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</main>
<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/personal.js"></script>
<?php include("public/views/assets/footer.php") ?>