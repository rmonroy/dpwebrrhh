<?php
include_once('../../conf/config.php');
include_once('../../conf/bd.php');

//llamado encabezado
include('../template/Cabecera.php');
?>

<!-- contenedor general -->
<div class="container w-75 mt-4 rounded shadow" style="background-color: #ffff;">
        <div class="row align-items-stretch">
            <!-- col izquierda, a ocultar -->
            <div class="col p-0 bg-primary d-none d-lg-block col-lg-4 col-xl-6">
                    <img src="<?php Base::imagenes('personal2.png'); ?>" alt="personal rrhh" height="100%" width="100%">
            </div>
            <!-- col derecha, form login -->
            <div class="col p-5 col-sm-12 col-md-12 col-lg-8 col-xl-6">
                <div class="text-center">
                    <img src="<?php Base::imagenes('logoRH.png'); ?>" width="65px" alt="Logo RRHH">
                </div>
                <h2 class="fw-bold text-center py-2">Iniciar Sesión</h2>
                <form action="login.php" method="post">
                    <div class="mb-4">
                        <div class="form-group">
                            <label for="user" class="form-label">Usuario: </label>
                            <input type="text" class="form-control" name="user" id="user" placeholder="Usuario" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="password" name="passwd" id="passwd" class="form-control" placeholder="*******" aria-label="passwd" aria-describedby="basic-addon1">
                            </div>                              
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="form-group">
                            <input type="checkbox" name="ckconnect" id="ckconnect" class="form-check-input">
                            <label for="ckconnect" class="form-check-label"> Mantenerme conectado </label>
                        </div>
                    </div>
                    <?php

                    session_start();

                    if (isset($_POST['btn-ingresar'])){
                        //header("location:http://localhost/rrhh/");
                        //capturamos el momento de clic del button
                        $us=$_POST['user'];
                        $ps=$_POST['passwd'];
                        
                        $datousr = DatosB::mostrarUsuario($us, $ps);
                        //capturando datos recuperados de la BD
                        $nmb = $datousr['Nombre'];
                        $rol = $datousr['rolId'];

                        $rsp = DatosB::validarUsuario($us, $ps);

                        
                        if($rsp==1){    
                            $_SESSION['usr']=$nmb;
                            $_SESSION['rol']=$rol;

                            //$direccion = 'location:' . Base::url() . '';
                            header('location:http://localhost/dpwebrrhh-main/'); //$direccion);
                        } elseif($rsp==2){
                            echo '<diV class="alert alert-danger">';
                            echo '<div class="form-group">';
                            echo '<p>El usuario no esta activo,comuniquese con soporte</p>';
                            echo "</diV> </div>";
                        } elseif($rsp==3){
                            echo '<diV class="alert alert-danger">';
                            echo '<div class="form-group">';
                            echo '<p>El usuario y la contraseña no coinciden, comuniquese con soporte</p>';
                            echo "</diV> </div>";
                        } else {
                            
                            echo '<diV class="alert alert-danger">';
                            echo '<div class="form-group">';
                            echo '<p>El usuario no se pudo encontrar, comuniquese con soporte</p>';
                            echo "</diV> </div>";
                        }
                    
                    }

                    ?>                    
                    <div class="d-grid">
                        <button type="submit" name="btn-ingresar" class="btn btn-primary form-control"> Iniciar sesión </button>
                    </div>
                    <div class="my-3 text-center">
                        <span>¿No tienes cuenta? <a href="<?php Base::url(); ?>app/usuarios/registro.php">Regístrate</a></span>
                        <br>
                        <span><a href="#">Recuperar contraseña</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include('../template/Pie.php'); ?>