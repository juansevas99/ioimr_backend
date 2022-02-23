<?php

class pedido extends Controller{
    public function __construct(){
        Controller::__construct('pedido_m');



    }

    public function lista(){

            
        $operation=new select($this->model);
        $operation=new columns($operation,[
            'id_pedido' => 'Pedido',
           'estado_pedido_estado'=>'Estado',
           'fecha_creacion'=>'Fecha creacion',
           'fecha_efectiva'=>'Efectiva'
        ]);
        
        
        tablas::paginate($operation,3,$_GET['id']);
        echo json_encode([$this->model->data,tablas::$pages]);
            
    
            
    
    }

    public function getModel(){
        return $this->model;
    }


    
}

?>