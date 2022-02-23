<?php

class user_m extends model{
   
    function __construct()
    {
        parent::__construct();
        $this->table="user";
        $this->columns=["id_user","email","password","contact_number","user_name","roles_Id_rol"];

        
        $this->manyToOne=[
            "roles"=>["roles_Id_rol","Id_rol"]
            
        ];
        
    } 


}