<?php include("public/views/assets/header.php") ?>

<main class="body_data">
    <?php include("public/views/assets/configroup.php") ?>
    <br>
    <div class="options">
        <div class="titulo">
            <?= $titulo ?>
        </div>
        <div class="action"></div>
    </div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Rol</th>
                <th>Agregar</th>
                <th>Mostrar</th>
                <th>Editar</th>
                <th>Reportes</th>
                <th>Asistencias</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $rows): ?>
                <?php ($rows['rol'] == "director") ? $disabled = "disabled" : $disabled = ""  ?>
                <?php ($rows['agregar'] == 1) ? $checked = "checked" : $checked = ""  ?>
                <?php ($rows['mostrar'] == 1) ? $checked2 = "checked" : $checked2 = ""  ?>
                <?php ($rows['editar'] == 1) ? $checked3 = "checked" : $checked3 = ""  ?>
                <?php ($rows['reportes'] == 1) ? $checked4 = "checked" : $checked4 = ""  ?>
                <?php ($rows['asistencias'] == 1) ? $checked5 = "checked" : $checked5 = ""  ?>
                <tr>
                    <td><?= $rows['rol'] ?></td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="agregar" value="<?=$rows['id']."/".$rows['agregar']?>" id="flexCheckChecked" <?= $checked ?> <?= $disabled ?>/>
                    </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="mostrar" value="<?=$rows['id']."/".$rows['mostrar']?>" id="flexCheckChecked" <?= $checked2 ?> <?= $disabled ?>/>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="editar" value="<?=$rows['id']."/".$rows['editar']?>" id="flexCheckChecked" <?= $checked3 ?> <?= $disabled ?>/>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="reportes" value="<?=$rows['id']."/".$rows['reportes']?>" id="flexCheckChecked" <?= $checked4 ?> <?= $disabled ?>/>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="asistencias" value="<?=$rows['id']."/".$rows['asistencias']?>" id="flexCheckChecked" <?= $checked5 ?> <?= $disabled ?>/>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Rol</th>
                <th>Agregar</th>
                <th>Mostrar</th>
                <th>Editar</th>
                <th>Reportes</th>
                <th>Asistencias</th>
            </tr>
        </tfoot>
    </table>
</main>

<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/roles.js"></script>
<?php include("public/views/assets/footer.php") ?>