<?php
class test extends Controller{
    function __construct()
    {
        parent::__construct("");
    }
    public function run(){
        include "resources/templates/Prueba/vistas/test.php";

    }
}