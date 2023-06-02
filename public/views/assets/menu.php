<div class="menu">
    <ul>
        <li>
            <a href="<?=url_global?>/home">
                <div class="logo">
                    <img src="<?= url_global ?>/public/recursos/imagenes/logo.png" alt="" srcset="">
                </div>
            </a>
        </li>
        <li data-name="home">
            <a href="<?=url_global?>/home">
                <span class="icon"><i class="fa-solid fa-house"></i></span>
                <span class="title">INICIO</span>
            </a>
        </li>
        <?php if($_SESSION['rol'] != 3): ?>
            <li data-name="academico">
                <a href="<?=url_global?>/pescolar">
                    <span class="icon"><i class="fa-solid fa-graduation-cap"></i></span>
                    <span class="title">ACADÉMICO</span>
                </a>
            </li>
        <?php endif ?>
        <?php if($_SESSION['rol'] == 1 || ($_SESSION['rol'] == 2 && $_SESSION['asistencias'] == 1) || ($_SESSION['rol'] == 3 && $_SESSION['asistencias'] == 1)): ?>
        <li data-name="asistencias">
            <a href="<?=url_global?>/asistencias">
                <span class="icon"><i class="fa-solid fa-file-pen"></i></span>
                <span class="title">ASISTENCIAS</span>
            </a>
        </li>
        <?php endif ?>
        <li data-name="personal">
            <a href="<?=url_global?>/personal">
                <span class="icon"><i class="fa-solid fa-user-group"></i></span>
                <span class="title">PERSONAL</span>
            </a>
        </li>
        <li data-name="reportes">
            <a href="<?=url_global?>/reportes">
                <span class="icon"><i class="fa-solid fa-file-pdf"></i></span>
                <span class="title">REPORTES</span>
            </a>
        </li>
        <li data-name="configuracion">
            <a href="<?=url_global?>/usuarios">
                <span class="icon"><i class="fa-solid fa-gears"></i></span>
                <span class="title">CONFIGURACIÓN</span>
            </a>
        </li>
</div>