<?php

 class categoria extends Controller{
     public function __construct(){
         parent::__construct('categoria_m');
            
 
 
     }
     public function visualizar(){
        $operation=new select($this->model);
        $operation=new columns($operation,[
            'id_categoria'=>'COD',
            'categoria'=>'Categoria'
        ]);
        $operation->run();
        echo json_encode([$this->model->data]);
    }

    public function categoriaList(){
        $operation=new select($this->model);
        $operation=new columns($operation,[
            'id_categoria'=>'COD',
            'categoria'=>'Categoria'
        ]);
        tablas::paginate($operation,3,$_GET['id']);
        echo json_encode([$this->model->data,tablas::$pages]);

    }


     public function displaycategoriaview(){
        include "resources/templates/Prueba/vistas/categoria.php";

    }
    
    public function prepararCreacion(){
        include "resources/templates/crearProducto.php";
    }
    public function insertar(){
        $operation=new insert($this->model,$_POST);
        $operation->run();


        // category
        $operation=new select($this->model);
        $operation=new colums($operation,
        ['id_producto'=>'IdProducto']);
        $operation=new inner($operation,"categoria", 
        ['id_categoria'=>'Id']);
        $operation=new where($operation,['id_producto'=>$_POST['id_producto']]);
        $operation->run();
        $category=$this->model->data[0]["Id"];




        $this->view->render("producto_detalle",$category);

    }
    public function insertarForm(){
       $this->view->render("producto_detalle","Creacion de producto");
    }
 }

?>