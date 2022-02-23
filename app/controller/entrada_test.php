<?php

class entrada_test extends movimiento_test{
    public function __construct(){
        Controller::__construct('entrada_test_m');



    }

    public function lista(){

        $operation=new select($this->model);
        $operation=new columns($operation,[
            // 'movimiento_id_movimient o'=>'Movimiento',
            'pedido_entrada_pedido_id_pedido' => 'Pedido',
           'stock'=>'Cantidad',
           'observaciones'=>'Observaciones'
        ]);
        $operation=new inner($operation,"movimiento_test", 
        [
        'cantidad'=>'Cantidad',
        'precio_unitario'=>'Precio Unitario',
        'hecho'=>'Hecho']);
        
        tablas::paginate($operation,3,$_GET['id']);
        echo json_encode([$this->model->data,tablas::$pages]);
            
    
    }
}

?>