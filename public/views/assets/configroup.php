<center>
    <div class="btn-group" role="group" aria-label="Basic example">
        <?php if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2): ?>
            <a href="<?=url_global?>/usuarios" class="btn btn-outline-link" data-mdb-color="dark" data-value="usuarios">
                <i class="fa-solid fa-users"></i>
                Usuarios
            </a>
            <a href="<?=url_global?>/roles" class="btn btn-outline-link" data-mdb-color="dark" data-value="roles">
                <i class="fa-solid fa-star"></i>
                Roles
            </a>
        <?php endif ?>
        <a href="<?=url_global?>/historial" class="btn btn-outline-link" data-mdb-color="dark" data-value="historial">
            <i class="fa-solid fa-clock-rotate-left"></i>
            Historial
        </a>
    </div>
</center>