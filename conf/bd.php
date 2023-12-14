<?php

class DatosB{
    //acceso a base de datos
    private static $servidor="localhost";
    private static $bd="rrhh_db";
    private static $usuarioBd="root"; //se recomienda crear usuario especifico con permisos leer/escribir tablas
    private static $clavebd="";
    
    private static function conexion(){
        //cadena de conexion con informacion de adonde estan los datos
        $cadena = 'mysql:host='.self::$servidor.';dbname='.self::$bd;
        //objeto de conexion creado a partir de la instancia de PDO
        $cn = new PDO($cadena, self::$usuarioBd, self::$clavebd);
        //mysqli
        return $cn;
    }

    public static function crearUsuarios($datos){
        $resultado='';
        //servirá para decir si se inserto o no
        $cnx = self::conexion();
        $sql= "INSERT INTO `usuarios`(`userId`, `Nombre`, `correo`, `contraseña`, `rolId`, `estado`) 
        VALUES (:idusuario,:nombre,:correo,:clave,:rol,:estado)";
        $accion = $cnx->prepare($sql);
        
        try{
            $accion->execute($datos);
            $resultado=true;
        } catch (exception $e) {
            //validaciones
            $resultado=false;
        }

        return $resultado;
    }

    public static function listartipoCargo(){
        //cnx recibe el obj de conexion
        $cnx=self::conexion();
        //consulta tiene el scrip de la consulta a la bd
        $consulta="SELECT `id`,`tipo` FROM `tipos_cargos` WHERE `estado`=1";
        //cns recibe el objeto para realizar la consulta
        $cns = $cnx->prepare($consulta);
        //cns ejecuta la consulta
        $cns->execute();
        //resultado recibe un arreglo con el resultado del select
        $resultado=$cns->fetchAll(PDO::FETCH_ASSOC);
        //resultado se retorna
        return $resultado;
    }

    public static function crearCargos($datos){
        $resultado=''; //valor true / false
        //servirá para decir si se inserto o no
        $cnx = self::conexion();
        //asignar la consulta de insert
        $sql= "INSERT INTO `cargos`(`cargo`, `descripcion`, `tipo_cargo`, `estado`) VALUES (:cargo,:descr,:tipo,1)";
        //asignar el objeto con la consulta
        $accion = $cnx->prepare($sql);
        //control try para manejar errores y excepciones
        try{
            $accion->execute($datos);
            $resultado=true;
        } catch (exception $e) {
            //validaciones
            $resultado=false;
        }

        return $resultado;
    }

    public static function listarCargos(){
        //cnx recibe el obj de conexion
        $cnx=self::conexion();
        //consulta tiene el scrip de la consulta a la bd
        $consulta="SELECT c.idCargo, c.cargo, c.descripcion, t.tipo, c.estado FROM `cargos` as c inner join tipos_cargos as t on c.tipo_cargo=t.id order by c.idcargo";
        //cns recibe el objeto para realizar la consulta
        $accion = $cnx->prepare($consulta);
        //cns ejecuta la consulta
        $accion->execute();
        //resultado recibe un arreglo con el resultado del select
        $resultado=$accion->fetchAll(PDO::FETCH_ASSOC);
        //resultado se retorna
        return $resultado;
    }

    public static function buscarCargos($bsc){
        //cnx recibe el obj de conexion
        $cnx=self::conexion();
       
        //consulta tiene el scrip de la consulta a la bd
        $consulta="SELECT c.idCargo, c.cargo, c.descripcion, t.tipo, c.estado FROM `cargos` as c inner join tipos_cargos as t on c.tipo_cargo=t.id WHERE c.cargo like ? order by c.idcargo";
        //cns recibe el objeto para realizar la consulta
        //Prepara la sentencia e indicar que vamos a usar un cursor
        $accion = $cnx->prepare($consulta, [
            PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
            ]); 
        $accion->bindValue(1, "%fy", PDO::PARAM_STR);
        $parametros = ["%$bsc%"];     
        //cns ejecuta la consulta
        $accion->execute($parametros);
        //resultado recibe un arreglo con el resultado del select
        $resultado=$accion->fetchAll(PDO::FETCH_ASSOC);
        //resultado se retorna
        return $resultado;
    }

    public static function mostrarUsuario($u, $c){
         
        //cnx recibe el obj de conexion
         $cnx=self::conexion();
         //consulta tiene el scrip de la consulta a la bd
         $consulta="SELECT * FROM `usuarios` WHERE userid=:uss and contraseña = :psw limit 1";
         //cns recibe el objeto para realizar la consulta
         $accion = $cnx->prepare($consulta);
         $accion->bindParam('uss', $u);
         $accion->bindParam('psw', $c);
         //cns ejecuta la consulta
         $accion->execute();
         //resultado recibe un arreglo con el resultado del select
         //$rest=$accion->fetch(PDO::FETCH_ASSOC);
         $resultado=$accion->fetch(PDO::FETCH_ASSOC);
         
         //resultado se retorna
         return $resultado;
    }

    

    public static function validarUsuario($u, $c){
        $datoUs = self::mostrarUsuario($u, $c);
        //1- usuario y clave correctos, estado es 1
        //2- usuario y clave correecto, estado es 0
        //3- usuario correcto, clave incorrecta
        //0- usuario incorrecto
        $resp = 0;
        if($datoUs['userid']=$u){
            if($datoUs['contraseña']=$c){
                if($datoUs['estado']=1){
                    $resp=1;
                }else{
                    $resp=2;
                }
            } else {
                $resp=3;
            }
        }
        return $resp;
    }

    

}


?>