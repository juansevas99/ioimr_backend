<?php

class pedido_entrada extends Controller{
    public function __construct(){
        Controller::__construct('pedido_entrada_m');



    }

    public function visualizarProveedor_pedido(){
        $operation=new select($this->model);
        $operation=new columns($operation,[
            'observaciones'=>'Observaciones',
            'pedido_id_pedido'=>'Pedido',
            'proveedor_id_proveedor'=>'IdProveedor'
            
        ]);
        $operation=new inner($operation,"pedido", 
        [
        // 'estado_pedido_estado'=>'Estado',
        // 'fecha_creacion'=>'Creacion',
        'fecha_efectiva'=>'FechaEfectiva']);
        $operation=new inner($operation,"proveedor",
        [
        'contacto'=>'Proveedor'
        ]);
        $operation= new where($operation,["pedido_id_pedido"=>$_GET['id']]);
        $operation->run();
        echo json_encode([$this->model->data]);
            
    
    }

    public function visualizar(){

            
        $operation=new select($this->model);
        $operation=new columns($operation,[
            'observaciones'=>'Observaciones',
            'pedido_id_pedido'=>'Pedido'
            // 'proveedor_id_proveedor'=>'Proveedor'
            
        ]);
        $operation=new inner($operation,"pedido", 
        [
        'estado_pedido_estado'=>'Estado',
        'fecha_creacion'=>'Creacion',
        'fecha_efectiva'=>'Fecha Efectiva']);
        $operation=new inner($operation,"proveedor",
        [
        'contacto'=>'Proveedor'
        ]);
        tablas::paginate($operation,3,$_GET['id']);
        echo json_encode([$this->model->data,tablas::$pages]);
            
    
            
    
    }

    public function displayFormCreate(){
        include "resources/templates/Prueba/vistas/crearEntrada.php";

    }
    public function displayInputs(){
        include "resources/templates/Prueba/vistas/pedido_entrada.php";

    }

    public function create(){

        // Creation of pedido
        include_once 'app/controller/pedido.php';
        $modelPedido=new pedido();

        $operation=new insert($modelPedido->getModel(),
        [
            
            'estado_pedido_estado'=>1,
            'entrada_salida'=>'E'

        ]);
        $operation->run();
        
        $operation=new select($modelPedido->getModel());
        $operation=new columns($operation,[
            'id_pedido'=>'id'
            // 'proveedor_id_proveedor'=>'Proveedor'
            
        ]);
        $operation=new orderby($operation,['id_pedido'],"DESC");
        $operation=new limit($operation,1);
        $operation->run();
        $pedido=$modelPedido->getModel()->data[0]['id'];

        // CREATION OF PEDIDO_ENTRADA
        $operation=new insert($this->model,[
            'pedido_id_pedido'=>$pedido
        ]);


        $operation->run();

        echo json_encode(["id"=>$pedido]);

      
    
    }
    public function displayFormMovEntrada(){
        
        include "resources/templates/Prueba/vistas/crearMovimientoEntrada.php";
    }

    public function actualizar(){
        include_once 'app/controller/pedido.php';
        $modelPedido=new pedido();
        $operation=new update($modelPedido);
        $operation=new set($operation,['fecha_efectiva'=>$_POST['fecha_efectiva']]);
        
        $operation=new where($operation,['id_pedido'=>$_GET['id']]);
        $operation->run();


        $operation=new update($this->model);
        $operation=new set($operation,[
            'observaciones'=>$_POST['observaciones'],
            'proveedor_id_proveedor'=>$_POST['proveedor_id_proveedor']
        
        ]);
        
        $operation=new where($operation,['id_pedido'=>$_GET['id']]);
        $operation->run();


    }

}

?>