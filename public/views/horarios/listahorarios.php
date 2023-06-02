<table id="" class="table" style="width:100%">
    <thead>
        <tr>
            <th colspan="10" style="background-color: #2a61cf;color:#ffffff;"><?= $anio->nombre ?></th>
        </tr>
        <tr>
            <?php foreach($data as $dia){ $dia = $dia['dias']; } ?>
            <th colspan="2"><?= $dia ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $n = 1; ?>
        <?php foreach($data as $hora): ?>
            <?php $query = $this->horarios->consulta("SELECT * FROM secciones WHERE id = {$hora['id_seccion']}"); ?>
                <?php foreach($query as $secciones){
                    $array[] = array("entrada" => $hora['entrada'], 'seccion' => $secciones['nombre'], "id" => $hora['id'], "columna" => $n);
                    $array2[] = array("salida" => $hora['salida'], "columna" => $n);
                    $n++;
                } 
                ?>
            <?php endforeach ?>
        <?php for($i=1; $i<=$data->num_rows; $i++): ?>
            <tr>
                <tr>
                    <?php foreach($array as $top): ?>
                        <?php if($top['columna'] == $i): ?>
                            <td class="horarios"><?= substr($top['entrada'], 0, 5) ?></td>
                            <td class="seccion" rowspan="2" style="vertical-align: middle;width:50%">
                                <a href="<?=url_global?>/horarios/editar?id=<?=base64_encode($top['id'])?>">
                                    <?= $top['seccion'] ?>
                                </a>
                            </td>
                        <?php endif ?>
                    <?php endforeach ?>
                </tr>
                <tr>
                <?php foreach($array2 as $bot): ?>
                    <?php if($bot['columna'] == $i): ?>
                        <td class="horarios"><?= substr($bot['salida'], 0, 5)?></td>
                    <?php endif ?>
                <?php endforeach ?>
                </tr>
            </tr>
            <tr>
        <?php endfor ?>
    </tbody>
</table>