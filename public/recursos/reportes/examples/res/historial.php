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
            Historial de Usuarios
        </div>
        <?php $cont = 1; ?>
        <table class="table" border="1">
            <thead>
            <tr>
                <th>N°</th>
                <th>Usuario</th>
                <th>Acción</th>
                <th>Fecha</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($data as $rows): ?>
                <?php ($cont%2!=0) ? $color = "background-color: #e5e5e5" : $color = "background-color: transparent"; ?>
                    <tr>
                        <td style="<?= $color ?>"><?= $cont ?></td>
                        <td style="<?= $color ?>"><?= $rows['username'] ?></td>
                        <td style="<?= $color ?>"><?= $rows['accion'] ?></td>
                        <td style="<?= $color ?>"><?= $rows['fecha'] ?></td>
                    </tr>

                <?php $cont++; endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <th>N°</th>
                <th>Usuario</th>
                <th>Acción</th>
                <th>Fecha</th>
            </tr>
            </tfoot>
        </table>
    <?php else: ?>
        <div style="margin: 20px 0px; text-align: center">
            <h1>No hay datos para mostrar</h1>
        </div>
    <?php endif ?>
</page>