<?php

 class proveedor extends Controller{
     public function __construct(){
         parent::__construct('proveedor_m');
 
 
 
     }
     public function visualizar(){
        $operation=new select($this->model);
        $operation=new columns($operation,[
            'id_proveedor'=>'Id',
            'contacto' => 'Proveedor',
           'telefono' => 'Telefono',
           
        ]);
        tablas::paginate($operation,3,$_GET['id']);
        echo json_encode([$this->model->data,tablas::$pages]);
    }
    public function visualizarProveedor(){
        $operation=new select($this->model);
        $operation=new columns($operation,[
            'id_proveedor'=>'Id',
            'contacto' => 'Proveedor',
           
        ]);
        $operation->run();
        echo json_encode([$this->model->data]);
    }

   


     public function displayproveedorview(){
        include "resources/templates/Prueba/vistas/proveedor.php";

    }

    public function create(){
        $operation=new insert($this->model,$_POST);
        $operation->run();
       $vista=["proveedor","proveedor"];
        include_once 'resources/templates/Prueba/vistas/plantilla.php';

    }
    public function displaycreateProveedor(){
        include "resources/templates/Prueba/vistas/crearproveedor.php";
    }

    
 }

?>