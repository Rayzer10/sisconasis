<?php include("public/views/assets/header.php") ?>
<style>
    .table{
        text-align: left !important;
    }
    .table tbody th {
        text-align: left !important;
        width: 160px;
    }
    .table th{
        background: #214C93;
        color: #ffffff;
    }
    .table td{
        text-align: center;
    }
</style>

<main class="body_data">
    <?php include("public/views/assets/acadegroup.php") ?>
    <div class="options">
        <div class="titulo">
            <?= $titulo ?>
        </div>
        <div class="action">
            <a href="<?=url_global?>/secciones/formulario" class="btn btn-system btn-rounded btn-width">
            <i class="fa-solid fa-plus"></i> Agregar Secciones</a>
        </div>
    </div>
    <table class="table" style="width:100%">
        <thead>
            <tr>
                <th colspan="10">Secciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $cont = 0 ?>
            <?php foreach($data as $aescolar): ?>
            <?php $query = $this->secciones->consulta("SELECT * FROM secciones WHERE id_pba='{$aescolar['id']}' ORDER BY nombre"); ?>
            <tr>
                <?php if($query->num_rows > 0): ?>  
                    <th><?=$aescolar['nombre']?></th>
                    <?php foreach($query as $secciones): ?>
                        <?php 
                        $cont++ ?>
                        <?php if($query->num_rows == $cont): ?>
                            <td><a href="<?=$secciones['id']?>" onclick="eliminar(event)"><?=$secciones['nombre']?></a></td>
                        <?php else: ?>
                            <td><?=$secciones['nombre']?></td>
                        <?php endif?>
                    <?php endforeach ?>
                    <?php $cont = 0 ?>
                <?php endif ?>
            </tr>
            <?php endforeach ?>
        </tbody> 
    </table>
</main>

<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/secciones.js"></script>
<?php include("public/views/assets/footer.php") ?>