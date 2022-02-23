<?php

class pedidos extends Controller{
    public function __construct(){
        Controller::__construct('pedidos_m');



    }

    public function visualizar(){

            
        $operation=new select($this->model);
        $operation=new columns($operation,[
            // 'movimiento_id_movimient o'=>'Movimiento',
            'id_pedido' => 'Id',
           'estado_pedido_estado'=>'Estado',
           'entrada_salida'=>'Entrada/Salida',
           'fecha_creacion'=>'Fecha creacion',
           'fecha_efectiva'=>'fecha efectiva'
        ]);
        
                
        tablas::paginate($operation,3,$_GET['id']);
        echo json_encode([$this->model->data,tablas::$pages]);
            
    
            
    
    }


    public function displayOutputs(){
        include "resources/templates/Prueba/vistas/pedido_salida.php";
    }
}

?>