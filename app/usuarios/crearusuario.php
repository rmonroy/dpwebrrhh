<?php
include_once('../../conf/bd.php');
//validar campos antes de insertar
if(isset($_POST['btn-registro'])){
     //incluir validacion de campos (campos vacios js y contenido con php)
    $nombre=$_POST['uname'];
    $correo=$_POST['umail'];
    $contraseña=$_POST['pswd1'];

    $regData=[
        'nombre'=>$nombre,
        'correo'=>$correo,
        'clave'=>$contraseña,
    ];

    if(DatosB::crearUsuarios($regData)){
        header('location:usuarios.php');
    } else {  }



    //solo parqa validar
    //echo ('<div><h3>'.$nombre.', '.$correo.', '.$contraseña.'</h3></div>');
    //header('location:index.php');
}
?>