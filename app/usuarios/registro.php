<?php
include_once('../../conf/config.php');
include_once('../../conf/bd.php');

include('../template/Cabecera.php');

include('../template/Menu.php');
?>

<div class="container-lg my-4">
    <div class="container-md">
        <div class="row">
            <div class="col col-lg-8 col-xl-6">
                <h1>Registro de usuarios</h1>
                <form action="registro.php" method="post" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="uname">Nombre:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
                        <div class="valid-feedback">Valido.</div>
                        <div class="invalid-feedback">Este campo no puede quedar vacio.</div>
                    </div>
                    <div class="form-group">
                        <label for="uname">Correo:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Enter username" name="umail" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="uname">Nombre de usuario:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Enter username" name="usnickn" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Contraseña:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd1" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Confirmar contraseña:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd2" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember" required> Acepto, <a target="_blank" href="https://support.google.com/chrome/answer/6130773?hl=es">terminos y condiciones de acceso</a>.
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">debe aceptar términos y condiciones para continuar</div>
                        </label>
                    </div>
                    <button type="submit" name="btn-registro" class="btn btn-primary">Registrar</button>
                    </form> 
                    <?php
                      //validar campos antes de insertar
                      if(isset($_POST['btn-registro'])){
                          //incluir validacion de campos (campos vacios js y contenido con php)
                          $nombre=$_POST['uname'];
                          $correo=$_POST['umail'];
                          $usuario=$_POST['usnickn'];
                          $contraseña=$_POST['pswd1'];

                          //solo parqa validar
                          //echo ('<div class="alert alert-success"><h3>'.$nombre.', '.$correo.', '.$contraseña.'</h3></div>');
                          
                          //data--> enviar como parametros para insertar
                          $data = [
                            'idusuario'=> $usuario,
                            'nombre'=>$nombre,
                            'correo'=>$correo,
                            'clave'=>$contraseña,//podria usar funcion sha1 encrypt--> encriptar clave
                            'rol'=>3,
                            'estado'=>0, //0: esta deshabilitado, 1: habilitado
                          ];
                          
                          if (DatosB::crearUsuarios($data)) {
                            echo ('<div class="alert alert-success"><h3>Agregado correctamente</h3></div>');
                          } else {
                            echo ('<div class="alert alert-danger"><h3>No se pudo insertar</h3></div>');
                          }

                      }
                      ?>                   
            </div>
            <div class="col"></div>
        </div>
    </div>
</div>

<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
<?php include('../template/pie.php');?>