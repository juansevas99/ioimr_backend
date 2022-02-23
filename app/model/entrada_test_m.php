<?php
class entrada_test_m extends model {
    public $data=[];
    function __construct()
    {
        parent::__construct();
         $this->table="entrada";
         $this->columns=["movimiento_id_movimiento","pedido_entrada_pedido_id_pedido","producto_id_producto","stock","observaciones"];
        
         $this->manyToOne=[
            "movimiento"=>["movimiento_id_movimiento","id_movimiento"]
            // "marca"=>["marca_id_marca","id_marca"]
            
        ];
    }

    
   
}
?>