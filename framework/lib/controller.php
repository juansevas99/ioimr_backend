<?php

class Controller {
    protected $model;
    public function __construct($model)
    
    // llama al modelo asociado con el controlador
    // inicializa una vista
    // 

    {
        
        $modelRuta="app/model/".$model.".php";
        if (file_exists($modelRuta)){
            include $modelRuta;
            $this->model=new $model;
           
             
        }
        
        $this->view=new view();
        
         
    } 
    

    
}
?>