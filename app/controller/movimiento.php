<?php

class movimiento extends Controller{
    
    public function __construct(){
        parent::__construct('movimiento_m');



    }
    public function buscarpedido(){
        $operation=new select($this->model);
        $operation=new columns($operation,[
            'observaciones'=>'Observaciones',
            'pedido_id_pedido'=>'Pedido',
            'producto_id_producto'=>'Producto Cod'            
        ]);
        
    }
    public function create(){
        
    }

    public function getModel(){
        return $this->model;
    }
}

?>