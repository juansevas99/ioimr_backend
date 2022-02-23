<?php

    class movimiento_m extends model{
        function __construct(){
            parent::__construct();
             $this->table="movimiento";
             $this->columns=[
                'id_movimiento',
                'cantidad',
                'precio_unitario',
                'estado_id_estado',
                'producto_id_producto',
                'hecho' ];

                $this->manyToOne=[
                    "producto"=>["producto_id_producto","id_producto"]
                    
                ];
    
        }

    }
    
?>