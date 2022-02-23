<?php
class pedido_salida_m extends model {
    public $data=[];
    function __construct()
    {
        parent::__construct();
         $this->table="pedido_salida";
         $this->columns=["pedido_id_pedido","observaciones","destino"];
        
         $this->manyToOne=[
            "pedido"=>["pedido_id_pedido","id_pedido"]
            
        ];
    }

   
   
}
?>