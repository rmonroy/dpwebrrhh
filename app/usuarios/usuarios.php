<?php
include_once('../../conf/config.php');
include_once('../../conf/bd.php');

session_start();
$nomb;
if(!isset($_SESSION['usr'])) { 
    header('location:login.php');
} else {
    $nomb=$_SESSION['usr'];
}

include('../template/Cabecera.php');

include('../template/Menu.php');
?>

<div class="container-md">
    <div class="row p-3 mt-5">
        <div class="col col-sm-12 col-md-10 col-lg-6">
            <div class="input-group mb-5">
                <input type="text" class="form-control" placeholder="Ej. Salvador Aquino">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">Buscar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>correo</th>
                        <th>estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // por cada usuario de bd imprimir 

                    ?>
                    <tr>
                        <td>John</td>                        
                        <td>john@example.com</td>
                        <td><span class="text-success">Activo</span></td>
                        <td>
                            <a href="">Editar </a> | <a href=""> detalles</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>mary@example.com</td>
                        <td><span class="text-danger">Inactivo</span></td>
                        <td>
                            <a href="">Editar </a> | <a href=""> detalles</a>
                        </td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>july@example.com</td>
                        <td><span class="text-success">Activo</span></td>
                        <td>
                            <a href="">Editar </a> | <a href=""> detalles</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('../template/pie.php');?>