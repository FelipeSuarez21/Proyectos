<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "salud_mental";

$conexion=new mysqli($server, $user, $pass, $db);

if ($conexion->connect_errno) {
    die("Conexion fallida"  .  $conexion->connect_errno);
} else {
    echo "conectado";
}

$conexion->set_charset("utf8");
?>