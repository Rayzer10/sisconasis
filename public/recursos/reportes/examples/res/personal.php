<page style="font-size:13pt">
    <style>
        .logo{
            margin: auto;
            width: 250px;
            height: 250px;
        }
        .logo img{
            width: 100%;
            height: 100%;
        }
        .titulo{
            font-weight: bold;
            text-align: center;
            font-size: 22px;
            margin: 20px 0px;
        }
        .table{
            border-collapse: collapse;
            margin: auto;
            text-align: center;
        }
        .table td, .table th{
            padding: 0px 10px;
        }
    </style>
    <?php if(!is_null($query)): ?>
        <div class="logo">
            <img src="public/recursos/imagenes/logo.png" alt="">
        </div>
        <div class="titulo">
            Lista del Personal
        </div>
        <?php $cont = 1; ?>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Horas Totales</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php $num = 1; ?>
                <?php foreach($query as $rows): ?>
                <?php ($num%2!=0) ? $color = "background-color: #e5e5e5" : $color = "background-color: transparent"; ?>
                <?php 
                    if($rows['estado'] == 1){
                        $estado = "Activo";
                        $class="bg-success";
                    }else {
                        $estado = "Inactivo";
                        $class="bg-danger";
                    }?>
                    <tr>
                        <td style="<?= $color ?>"><?= $num ?></td>
                        <td style="<?= $color ?>"><?= $rows['ci'] ?></td>
                        <td style="<?= $color ?>"><?= $rows['nombre']." ".$rows['apellido'] ?></td>
                        <td style="<?= $color ?>"><?= $rows['horas_totales'] ?></td>
                        <td style="<?= $color ?>"><?= $estado ?></td>
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
                </tr>
            </tfoot>
        </table>
    <?php else: ?>
        <div style="margin: 20px 0px; text-align: center">
            <h1>No hay datos para mostrar</h1>
        </div>
    <?php endif ?>
</page>