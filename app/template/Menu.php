<?php
//include("../../conf/config.php");
$rolv=$_SESSION['rol'];
?>


<!-- Inicio menú dinámico -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="m-2">
        <a class="navbar-brand" href="<?php Base::url(); ?>">LOGO</a>
    </div>
    <div class="m-2">        
        <a href="<?php Base::url(); ?>app/usuarios/usuarios.php">Usuario</a>        
    </div>
    <div class="m-2">
        <?php if($rolv==1){ ?>
        <a href="<?php Base::url(); ?>app/cargos/lista.php">Cargos</a>
        <?php } ?>
    </div>
    <div class=" m-2 text-end">
        <a href="<?php Base::url(); ?>app/usuarios/sesiones.php"> <?php echo $nomb; ?></a>
    </div>
    </nav>
    <!-- cierre menú dinámico -->
