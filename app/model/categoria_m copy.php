<?php
class categoria_m extends model{
    function __construct(){

        parent::__construct();

         $this->table="categoria";
         $this->columns=[
            'id_categoria',
            'categoria',
           'descripcion'
         ];

        
    }

   
}

?>
