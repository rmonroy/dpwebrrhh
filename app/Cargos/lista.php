<?php
include_once('../../conf/config.php');
include_once('../../conf/bd.php');

include('../template/Cabecera.php');

include('../template/Menu.php');
?>

<div class="container-md">
    <div class="row text-center mt-5">
        <div class="col"><h1>Cargos</h1></div>
    </div>
    <div class="row text-center mt-2">
        <button class="btn btn-success">
        <a style="color: white;" href="<?php Base::url(); ?>app/cargos/crear.php">Nuevo tipo cargo</a>
        </button>
       
    </div>
    <div class="row p-3">
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
                        <th>id</th>
                        <th>cargo</th>
                        <th>descripción</th>
                        <th>tipo</th>
                        <th>estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // por cada usuario de bd imprimir 
                        try{
                            $lista = DatosB::listarCargos();
                            foreach($lista as $data){
                                
                                //c.idCargo, c.cargo, c.descripcion, t.tipo, c.estado
                                echo '<tr>';
                                echo '   <td>' . $data['idCargo'] . '</td>';
                                echo '   <td>' . $data['cargo'] . '</td>';
                                echo '   <td>' . $data['descripcion'] . '</td>';
                                echo '   <td>' . $data['tipo'] . '</td>';
                               
                                if ($data['estado']==1){
                                    echo '   <td><span class="text-success">Activo</span></td>';
                                } else {
                                    echo '   <td><span class="text-danger">Inactivo</span></td>';
                                }                                
                                echo '   <td>';
                                echo '       <a href="">Editar </a> | <a href=""> detalles</a>';
                                echo '   </td>';
                                echo '</tr>';
                            }
                        } catch (exception $ex){
                            echo '<tr><td class="text-center" colspan"6"> NO hay datos para mostrar... </td></tr>';
                        }
                    ?>                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('../template/pie.php');?>