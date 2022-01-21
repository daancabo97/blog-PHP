<?php

//Conexion base de datos
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$basededatos = 'blog_master';

$db = mysqli_connect($servidor , $usuario , $password , $basededatos);


//Consulta para pasar la base de datos
mysqli_query($db, "SET NAMES 'utf8'");


// Iniciar la sesion
if(!isset($_SESSION)){
    session_start();
}


?>