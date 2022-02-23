<?php
class rutas extends Controller{
    function __construct()
    {
        parent::__construct("");
    }
    public function ajustes(){
        $variable="This was passed as a variable";
        $this->view->render("test_ioimr_s/ajustes",$variable);
    }
    public function productos(){
        $variable="This was passed as a variable";
        $this->view->render("producto",$variable);
    }

    public function home(){
        $variable="This was passed as a variable";
        include "resources/templates/Prueba/vistas/plantilla.php";
    }
    public function inventario(){
        include "resources/templates/Prueba/vistas/inventario.php";
    }
    public function planeacion(){
        $variable="Planeacion de compra";
        $this->view->render("planeacion",$variable);
    }
    public function ordenCompra(){
        $variable="Gestion de inventario";
        $this->view->render("gestionInventario",$variable);
    }
    public function opcionOfManagement(){
        $variable="Opciones";
        $this->view->render("opcionOfManagement",$variable);
    }
    
    public function test(){
        $variable="Test";
        $this->view->render("test",$variable);
    }
    public function error(){
        $titulo="ERROR 404";
        include "resources/templates/error/404.php";
    }

    public function errorSQL(){
        
        
        include "resources/templates/error/errorSQL.php";
    }


    public function apps(){
        $variable="Applicationts";
        include "resources/templates/Prueba/vistas/plantilla.php";
    }


    public function login(){
        $variable="login";
        $this->view->render("login",$variable);
    }
   

}
?>