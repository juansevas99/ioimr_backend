<?php
class salida_test_m extends model {
    public $data=[];
    function __construct()
    {
        parent::__construct();
         $this->table="salida";
         $this->columns=["movimiento_id_movimiento","pedido_salida_pedido_id_pedido","observaciones"];
        
         $this->manyToOne=[
            "movimiento"=>["movimiento_id_movimiento","id_movimiento"]
            // "marca"=>["marca_id_marca","id_marca"]
            
        ];
    }

   
   
}
?>