<?php
Class CargarPlantilla{
    public function cargarPlantilla(){
        if (isset($_SESSION["autorizarIngreso"])) {
            include "vistas/plantilla.php";
          }else{
            include "vistas/login.php";
          }
    }
}