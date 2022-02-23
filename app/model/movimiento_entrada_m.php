<?php
class movimiento_entrada_m extends model{
    function __construct(){

        parent::__construct();

         $this->table="entrada";
         $this->columns=[
            'movimiento_id_movimiento',
            'pedido_entrada_pedido_id_pedido',
           'observaciones',
           'stock'
         ];

         $this->manyToOne=[
            "movimiento"=>["movimiento_id_movimiento","id_movimiento"],
            "pedido"=>["pedido_entrada_pedido_id_pedido","id_pedido"]
        ];
    }

   
}

?>
