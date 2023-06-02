<?php include("public/views/assets/header.php") ?>
<style>
    td.seccion{
        background-color: #EAEAEA;
        border-color: #2a61cf;
    }
    td.horarios{
        background-color: #D3D3D3;
        border-color: #2a61cf;
    }
    div.mensaje{
        text-align: center;
        color: #A4A4A4;
    }
</style>
<main class="body_data">
    <?php include("public/views/assets/persogroup.php") ?>
    <div class="options">
        <div class="titulo">
            <?= $titulo ?>
        </div>
        <div class="action">
            <a href="<?=url_global?>/horarios/formulario" class="btn btn-system btn-rounded btn-width">
            <i class="fa-solid fa-plus"></i> Asignar Horario</a>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-4">
            <select class="select" data-mdb-filter="true" name="ci_personal" onchange="obt_anio()">
        	    <option value="" disabled selected>seleccione una cédula</option>
                <?php foreach($doce as $perso): ?>
                <option value="<?=$perso['ci']?>"><?=$perso['ci']." - ".$perso['nombre']." ".$perso['apellido']?></option>
                <?php endforeach ?>
            </select>
            <label class="form-label select-label">Docentes</label>
        </div>
        <div class="col-lg-4">
            <select class="select" data-mdb-filter="true" name="anios" onchange="obt_dias()">
            <option value="" disabled selected>Sin resultados</option>
            </select>
            <label class="form-label select-label">Años</label>
        </div>
        <div class="col-lg-4">
            <select class="select" name="dias" onchange="filtro_result()">
                <option value="" disabled selected>Sin resultados</option>
            </select>
            <label class="form-label select-label">Días</label>
        </div>
    </div>
    <div class="listahorarios">
        <div class="mensaje">
            <h2>Esperando Parámetros</h2>
        </div>
    </div>
</main>

<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/horarios.js"></script>
<?php include("public/views/assets/footer.php") ?>