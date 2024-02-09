<?php
// Aqui van todos los controladores que se van a usar en la aplicacion
session_start();

require_once "controladores/plantilla.php";
require_once "controladores/personas.php";
require_once "controladores/login.php";

require_once "modelos/conexion.php";
require_once "modelos/personas.php";
require_once "modelos/login.php";

$conexion = Conexion::conectar();

$plantilla = new CargarPlantilla();
$plantilla->cargarPlantilla();
