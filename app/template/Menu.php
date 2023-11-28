<?php
//include("../../conf/config.php");
?>


<!-- Inicio menú dinámico -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="<?php Base::url(); ?>">LOGO</a>
        <a href="<?php Base::url(); ?>app/usuarios/usuarios.php">Usuario</a> &nbsp;
        <a href="<?php Base::url(); ?>app/cargos/lista.php">Cargos</a> &nbsp;
        <div class="text-end">
            <a href="<?php Base::url(); ?>app/usuarios/Login.php">LOGIN</a>
        </div>
    </nav>
    <!-- cierre menú dinámico -->
