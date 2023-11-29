<?php

class Base{
    //valor del host/ip o servidor
    //host externo podria ser 'http://www.misitio.net/';
    private static $servidor='http://localhost';
    private static $puerto = '';
    //variabe con el nombre de la carpeta raiz
    private static $proyecto='dpwebrrhh';
    //variable para construir la direccion url
    private static $direccion;
    //variable para llevar el nombre de ubicacion de archivos
    private static $archivos='assets';

    private static function asignarDireccion(){
        self::$direccion = self::$servidor;
        if (self::$puerto != ''){
            self::$direccion .= ':' . self::$puerto . '/' . self::$proyecto . '/';
        } else {
            self::$direccion .= '/' . self::$proyecto . '/';
        }

        return self::$direccion;
    } 

    //funcion a llamar para obtener la direccion url
    public static function url(){
        //variable interna
        $direccion = self::asignarDireccion();        

        echo $direccion;
    }

    public static function construirEstilos(){
        $direccion = self::asignarDireccion(); 
        $paraCss = $direccion . self::$archivos . '/css/bootstrap.min.css';

        echo $paraCss;
    }

    public static function construirJS(){
        $direccion=self::asignarDireccion();
        $paraJS = $direccion . self::$archivos . '/js/bootstrap.bundle.js';

        echo $paraJS;
    }
    //llamar enviando archivo y tipo ejemplo      Base::imagenes('logo.png');
    public static function imagenes($nombre){
        $paraImgs = self::$direccion . self::$archivos . '/imgs/' . $nombre;
        echo $paraImgs;
    }



}

?>
