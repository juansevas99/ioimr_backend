<?php
class atributo_m extends model{
    function __construct(){

        parent::__construct();

         $this->table="atributo";
         $this->columns=[
            'id_atributo',
            'atributo',
           'medida_id_medida'
           
         ];

         $this->manyToOne=[
            "medida"=>["medida_id_medida","id_medida"]
            
        ];
    }

   
}

?>
