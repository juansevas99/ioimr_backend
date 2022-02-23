<?php

class roles extends Controller
{


    function __construct()
    {
        parent::__construct("roles_m");
    }
    public function visualizar()
    {
        $operation=new select($this->model);
        $operation=new columns($operation,[
            'Id_rol'=>'Id',
            'rol_name'=>'Rol'
            
            
        ]);
        
        $operation->run();
        echo json_encode([$this->model->data]);
 }

 public function displayList()
    {
        $operation=new select($this->model);
        $operation=new columns($operation,[
            'Id_rol'=>'Id',
            'rol_name'=>'Rol',
            'description'=>'Descripcion'
            
            
        ]);
        
        tablas::paginate($operation,3,$_GET['id']);
        echo json_encode([$this->model->data,tablas::$pages]);
 }

 
 public function displayrolesview(){
    include "resources/templates/Prueba/vistas/roles.php";

}


public function create(){
    $operation=new insert($this->model,$_POST);
    $operation->run();
   $vista=["roles","roles"];
    include_once 'resources/templates/Prueba/vistas/plantilla.php';

}
public function displaycreateroles(){
    include "resources/templates/Prueba/vistas/crearrole.php";
}

}