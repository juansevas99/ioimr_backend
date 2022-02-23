<?php
class pedido_m extends model {
    public $data=[];
    function __construct()
    {
        parent::__construct();
         $this->table="pedido";
         $this->columns=['id_pedido','estado_pedido_estado','fecha_creacion','fecha_efectiva'];
        
            
    }

   
   
}
?>