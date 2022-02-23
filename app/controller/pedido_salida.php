<?php

class pedido_salida extends Controller{
    public function __construct(){
        Controller::__construct('pedido_salida_m');



    }

    public function visualizar(){

            
        $operation=new select($this->model);
        $operation=new columns($operation,[
            // 'movimiento_id_movimient o'=>'Movimiento',
            'pedido_id_pedido' => 'Pedido',
           'observaciones'=>'Observaciones',
           'destino'=>'Destino'
        ]);
        $operation=new inner($operation,"pedido", 
        [
        'estado_pedido_estado'=>'Estado',
        'fecha_creacion'=>'Creacion',
        'fecha_efectiva'=>'Fecha Efectiva']);
                
        tablas::paginate($operation,3,$_GET['id']);
        echo json_encode([$this->model->data,tablas::$pages]);
            
    
            
    
    }


    public function displayOutputs(){
        include "resources/templates/Prueba/vistas/pedido_salida.php";
    }
}

?>