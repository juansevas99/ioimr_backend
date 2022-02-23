<?php

class movimiento_entrada extends Controller{
    public function __construct(){
        Controller::__construct('movimiento_entrada_m');



    }

    public function getOne(){  
        $operation=new select($this->model);
        $operation=new columns($operation,[
            'stock'=>'Stock Actual',
            'pedido_entrada_pedido_id_pedido'=>'Pedido'            
        ]);
        
        $operation=new inner($operation,"movimiento",
        [
        'id_movimiento'=>'Movimiento',
        'cantidad'=>'Cantidad',
        'precio_unitario'=>'Precio',
        'hecho'=>'hecho',
        'producto_id_producto'=>'Producto Cod'
        ]);
        $operation= new where($operation,['pedido_entrada_pedido_id_pedido'=>$_GET['id']]);
        $operation->run();
        echo json_encode([$this->model->data]);
    
            
    
    }



    public function create(){

        // Creation of movimiento
        include_once 'app/controller/movimiento.php';
        $modelMovimiento=new movimiento();

        $operation=new insert($modelMovimiento->getModel(),
        [
            'producto_id_producto'=>$_POST['producto_id_producto'],
            'cantidad'=>$_POST['cantidad'],
            'precio_unitario'=>$_POST['precio_unitario'],
            'hecho'=>$_POST['cantidad'],
            'estado_id_estado'=>1
        ]);
        $operation->run();


        // I gets  the last mmovement just created
        
        $operation=new select($modelMovimiento->getModel());
        $operation=new columns($operation,[
            'id_movimiento'=>'id'            
        ]);
        $operation=new orderby($operation,['id_movimiento'],"DESC");
        $operation=new limit($operation,1);
        $operation->run();
        $movimiento=$modelMovimiento->getModel()->data[0]['id'];


        // it gest the last record of 'pedido ' table just created

        include_once 'app/controller/pedido.php';
        $modelPedido=new pedido();
        
        $operation=new select($modelPedido->getModel());
        $operation=new columns($operation,[
            'id_pedido'=>'id'            
        ]);
        $operation=new orderby($operation,['id_pedido'],"DESC");
        $operation=new limit($operation,1);
        $operation->run();
        $pedido=$modelPedido->getModel()->data[0]['id'];

        // CREATION OF entrada
        $operation=new insert($this->model,[
            'observaciones'=>$_POST['observaciones'],
            'pedido_entrada_pedido_id_pedido'=>$pedido,
            'stock'=>$_POST['cantidad'],
            'movimiento_id_movimiento'=>$movimiento
        ]);


        $operation->run();

       $vista=["input/displayFormMovEntrada","crearMovimientoEntrada"];
       include_once 'resources/templates/Prueba/vistas/plantilla.php';
    
    }


    public function displayInputs(){
        include "resources/templates/Prueba/vistas/pedido_entrada.php";

    }


}

?>