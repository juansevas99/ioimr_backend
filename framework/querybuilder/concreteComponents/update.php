<?php

class update extends operation {
    function __construct(model $model)
    {
        $this->model=$model;
        $this->function="update";
        $this->table=$this->model->table;
        $this->mainOperation="update";
        parent::__construct();
        
    }
    public function concatenate(): string
    {
        return $this->function." ".$this->model->table;
    }
    public function run(){

    }
}

?>