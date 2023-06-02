<?php include("public/views/assets/header.php") ?>

<main class="body_data">
    <?php include("public/views/assets/persogroup.php") ?>
    <div class="options">
        <div class="titulo">
            <?= $titulo ?>
        </div>
        <div class="action">
            <!-- <a href="#" class="btn btn-info btn-rounded btn-width">
                <i class="fa-solid fa-book-bookmark"></i> Asignar Materia
            </a> -->
            <a href="<?=url_global?>/personal/formulario" class="btn btn-system btn-rounded btn-width">
                <i class="fa-solid fa-plus"></i> Agregar persona
            </a>
        </div>
    </div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>N°</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Horas Totales</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $num = 1; ?>
            <?php foreach($data as $rows): ?>
            <?php 
                if($rows['estado'] == 1){
                    $estado = "Activo";
                    $class="bg-success";
                }else {
                    $estado = "Inactivo";
                    $class="bg-danger";
                }?>
                <tr>
                    <td><?= $num ?></td>
                    <td><?= $rows['ci'] ?></td>
                    <td><?= $rows['nombre']." ".$rows['apellido'] ?></td>
                    <td><?= $rows['horas_totales'] ?></td>
                    <td><span class="status <?=$class?>"><?= $estado ?></span></td>
                    <td>
                        <a href="<?=url_global?>/personal/perfil?ci=<?=urlencode(base64_encode($rows['ci']))?>" title="Ver datos">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </td>
                </tr>
            <?php $num++ ?>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th>N°</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Horas Totales</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </tfoot>
    </table>
</main>

<?php include("public/views/assets/scripts.php") ?>
<?php include("public/views/assets/footer.php") ?>