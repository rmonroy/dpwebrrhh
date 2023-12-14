<?php

include_once('../../conf/config.php');
session_start();

session_destroy();
$direccion = "location:" . Base::url() . "login.php";
header($direccion);
?>