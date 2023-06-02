<?php include("public/views/assets/header.php") ?>
<style>
    .allreportes{
        display: flex;
        width: max-content;
        gap: 10px;
        margin: auto;
    }.modal-body {
        display: flex;
        justify-content: space-evenly;
    }
</style>
<main class="body_data">
    <div class="allreportes">
        <div>
            <a href="<?=url_global?>/reportes/asistencias" target="_blank" class="btn btn-rounded btn-danger">
                <i class="fa-regular fa-file-pdf"></i> Asistencias
            </a>
        </div>
        <div>
            <button type="button" class="btn btn-rounded btn-danger" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop">
                <i class="fa-regular fa-file-pdf"></i> Permisos
            </button>
        </div>
        <div>
            <a href="<?=url_global?>/reportes/personal" target="_blank" class="btn btn-rounded btn-danger">
                <i class="fa-regular fa-file-pdf"></i> Personal
            </a>
        </div>
    </div>

    <!--  MODAL -->
    <div class="modal fade" id="staticBackdrop" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><b>Tipo de permisos</b></h5>
                <button type="button" class="btn-close reloaded" data-mdb-dismiss="modal" aria-label="Close" onclick=""></button>
            </div>
            <div class="modal-body">
                <a href="<?=url_global?>/reportes/vigentes" class="btn btn-success" target="_blank" rel="noopener noreferrer">Vigentes</a>
                <a href="<?=url_global?>/reportes/vencidos" class="btn btn-danger" target="_blank" rel="noopener noreferrer">Vencidos</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger reloaded" data-mdb-dismiss="modal" onclick="">Cerrar</button>
            </div>
            </div>
        </div>
    </div>
</main>

<?php include("public/views/assets/scripts.php") ?>
<?php include("public/views/assets/footer.php") ?>