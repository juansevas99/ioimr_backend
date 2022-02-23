<?php

 class producto extends Controller{
     public function __construct(){
         parent::__construct('producto_m');
 
 
 
     }
     public function visualizar(){
        $operation=new select($this->model);
        $operation=new columns($operation,[
            'id_producto'=>'Id',
            'precio_unitario' => 'Precio Unitario',
           'stock_inicial' => 'Stock Inicial',
           'fecha_creacion'=>'Creacion',
           'producto'=>'producto',
           'proveedor_id_proveedor'=>'Proveedor',
        ]);
        tablas::paginate($operation,3,$_GET['id']);
        echo json_encode([$this->model->data,tablas::$pages]);
    }

    public function visualizarEstadoActivo(){
        $operation=new select($this->model);
        $operation=new columns($operation,[
            'id_producto'=>'Id',
            'producto'=>'Producto',
            'precioUnitario' => 'Precio Unitario',
           'stock_inicial' => 'Stock Inicial',
           'stock_actual'=>'Stock Actual',
           'fecha_creacion'=>'Creacion'
        ]);
        $operation=new inner($operation,"categoria", 
        ['categoria'=>'Categoria']);
        $operation=new orderby($operation,['fecha_creacion']);
        // $operation=new where($operation,['estado_id_estado'=>1]);

        
        $operation->run();
        echo json_encode($this->model->data);

    }

    public function getProductos(){
        $operation=new select($this->model);
        $operation=new columns($operation,[
            'id_producto'=>'Id',
            'producto'=>'Producto',
            
        ]);
       
        $operation->run();
        echo json_encode([$this->model->data]);

    }


     public function displayproductoview(){
        include "resources/templates/Prueba/vistas/producto.php";

    }
    
    public function prepararCreacion(){
        include "resources/templates/crearProducto.php";
    }
    public function create(){
        $operation=new insert($this->model,$_POST);
        $operation->run();


        // // category
        // $operation=new select($this->model);
        // $operation=new colums($operation,
        // ['id_producto'=>'IdProducto']);
        // $operation=new inner($operation,"categoria", 
        // ['id_categoria'=>'Id']);
        // $operation=new where($operation,['id_producto'=>$_POST['id_producto']]);
        // $operation->run();
        // $category=$this->model->data[0]["Id"];




        // $this->view->render("producto_detalle",$category);
       $vista=["producto","producto"];
        include_once 'resources/templates/Prueba/vistas/plantilla.php';

    }
    public function displaycreateProduct(){
        include "resources/templates/Prueba/vistas/producto_detalle.php";
    }

    
 }

?>