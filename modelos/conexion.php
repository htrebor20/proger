<?php

class Conexion{
    static public function conectar(){
        $conexion = new PDO("mysql:host=localhost;dbname=proger_sol", "root", "robert20");
        $conexion->exec("set names utf8");
        return $conexion;
    }
}