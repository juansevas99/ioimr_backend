<?php

class select extends operation {
    private $table;
    function __construct(model $model=null)
    {
        $this->model=$model;
        $this->function="select";
        $this->mainOperation="select";
        $this->table=$this->model->table;
        
        parent::__construct();
    }
    
    public function concatenate(): string
    {
        // $this->currentStringQuery=$this->function;
        // $this->queryString=$this->currentStringQuery;
        return $this->queryString;
    }
    public function run(){

    }
}

?>