<?php
include_once('../../conf/config.php');
include_once('../../conf/bd.php');

session_start();
$nomb;
if(!isset($_SESSION['usr'])) { 
    header('location:../usuarios/login.php');
} else {
    $nomb=$_SESSION['usr'];
}

include('../template/Cabecera.php');

include('../template/Menu.php');
?>

<div class="container-sm">
    <div class="row text-center mt-3">
        <div class="col"><h1>Crear un nuevo cargo de la empresa</h1></div>
    </div>
    <div class="row mt-2 text-center">
        <div class="col">
            <form method="post" action="">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Cargo</span>
                    </div>
                    <input name="txCargo" type="text" class="form-control" value="<?php echo 'jefe'; ?>"
                    placeholder="Ej. Jefatura" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Descripción</span>
                    </div>
                    <input name="txdesc" type="text" class="form-control"
                    placeholder="Descripción de funciones..." required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Tipo de cargo:</span>
                    </div>
                    <select name="so-tipo" class="form-control" id="exampleFormControlSelect1">
                        <option selected> -- Seleccione una opción del menú -- </option>
                        <?php
                        //echo DatosB::listarCargos();
                        try{
                            $lista = DatosB::listartipoCargo();
                            foreach($lista as $data){
                                echo '<option value="'.$data['id'].'">'.$data['tipo'].'</option>';
                            }
                        } catch (exception $ex){
                            echo '<option value="0"> No hay datos </option>';
                        }
                        ?>
                    </select>                    
                </div>
                <div class="d-grid mt-5 mb-3">
                    <button type="submit" name="btn-crearcargo" class="btn btn-primary form-control"> Guardar </button>
                </div>
                <?php
                if (isset($_POST['btn-crearcargo'])){
                    $cargo=$_POST['txCargo'];                    
                    $descrp=$_POST['txdesc'];
                    $tipoC=$_POST['so-tipo'];
                    $datosCargo=[
                        'cargo'=>$cargo,
                        'descr'=>$descrp,
                        'tipo'=>$tipoC,
                    ];

                    if(DatosB::crearCargos($datosCargo)){
                        header('location:lista.php');
                    } else {
                        echo '<diV class="alert alert-danger mt-3 mb-5">';
                        echo '<div class="form-group">';
                        echo '<p> No se pudo completar el registro </p>';
                        echo "</diV> </div>";
                    }
                
                }

                ?>
            </form>
        </div>
    </div>
</div>


<?php include('../template/pie.php');?>

