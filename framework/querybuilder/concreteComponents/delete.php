<?php

class delete extends operation {
    function __construct(model $model=null)
    {
        $this->model=$model;
        $this->function="delete";
        $this->mainOperation="delete";
        $this->table=$this->model->table;
        
        parent::__construct();
    }
    public function concatenate(): string
    {
        
       return $this->function." from ".$this->model->table;
    }
    
}

?>