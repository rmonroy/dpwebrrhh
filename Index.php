<?php
//llaando funciones de uso general ( clase Base)
include_once('conf/config.php');

session_start();
$nomb;
if(!isset($_SESSION['usr'])) { 
    header('location:app/usuarios/login.php');
} else {
    $nomb=$_SESSION['usr'];
}



//llamando componentes de página
include('app/template/Cabecera.php');
include('app/template/Menu.php');
?>

 <!-- inicio de la seccion general de contenido -->
 <div class="container-lg">
        <!-- inicio de rotulo h1 de la página style="margin: 5px; padding: 5px"-->
        <div class="container-md mx-2 py-5">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8 col-xl-8"><h1>Principal</h1></div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                    <?php
                    //obtener valores contados de la BD
                    $emp=14; //traer de bd
                    $jef=3;
                    $asg=11;

                    echo "<b>Empleados: </b>".$emp."<br>";
                    echo "<b>Jefaturas: </b>".$jef."<br>";
                    echo "<b>Asignados: </b>".$asg."/".$emp;
                    ?>
                </div>
            </div>
            
        </div>
        <!-- cierre de rotulo h1 de la página -->
        <!-- inicio de fila de contenido organizado por columnas -->
        <div class="row">            
            <!-- Inicio imagen tipo boton -->
            <div class="col-md-4">
                <article class="img-fluid">
                    <a href="<?php Base::url(); ?>">
                        <img class="img-thumbnail" src="<?php Base::imagenes('personal1.png'); ?>" alt="Personal">
                    </a>
                    <p>Personal</p>
                </article>
            </div>
            <!-- cierre imagen tipo boton -->
            <div class="col-md-4">
                <article class="img-fluid">
                    <a href="formulario.html">
                        <img class="img-thumbnail" src="<?php Base::imagenes('personal1.png'); ?>" alt="Jefatura">
                    </a>
                    <p>Jefaturas</p>
                </article>
            </div>
            <div class="col-md-4">
                <article class="img-fluid">
                    <a href="pruebajs.html">
                        <img class="img-thumbnail" src="<?php Base::imagenes('personal1.png'); ?>" alt="Asignaciones">
                    </a>
                    <p>Asignaciones</p>
                </article>
            </div>
        </div>
        <!-- cierre de fila de contenido organizado por columnas -->
        
    </div>
</div>
<!-- cierre de la seccion general de contenido -->

<?php include('app/template/Pie.php'); ?>