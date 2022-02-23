<?php
class proveedor_m extends model{
    function __construct(){

        parent::__construct();

         $this->table="proveedor";
         $this->columns=[
            'id_proveedor',
            'contacto',
           'telefono'
           
         ];

       
    }

   
}

?>
