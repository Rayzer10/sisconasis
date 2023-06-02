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
        .rif, .titulo{
            font-weight: bold;
            text-align: center;
        }
        .titulo{
            font-size: 22px;
            margin: 20px 0px;
        }
        .table{
            border-collapse: collapse;
            margin: auto;
            text-align: center;
            margin-bottom: 16px;
        }
        .motivo{
            width: 500px;
        }
        .table td, .table th{
            padding: 0px 10px;
        }
        .check{
            width: 10px;
        }
    </style>
    <?php if(!is_null($query)): ?>
        <div class="logo">
            <img src="public/recursos/imagenes/logo.png" alt="">
        </div>
        <div class="titulo">
            Permisos Vigentes
        </div>
        <?php $cont = 1; ?>
            <?php foreach($query as $rows): ?>
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $rows['ci'] ?></td>
                            <td><?= $rows['nombre'] ?> <?= $rows['apellido'] ?></td>
                            <td><?= $rows['inicio'] ?></td>
                            <td><?= $rows['fin'] ?></td>
                        </tr>
                        <tr>
                            <th colspan="4">Motivo</th>
                        </tr>
                        <tr>
                            <td class="motivo" colspan="4"><?= $rows['motivo'] ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php endforeach ?>
    <?php else: ?>
        <div style="margin: 20px 0px; text-align: center">
            <h1>No hay datos para mostrar</h1>
        </div>
    <?php endif ?>
</page>