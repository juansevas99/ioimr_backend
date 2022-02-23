<?php

class all extends aggregation {
    function __construct(operation $operation)
    {
        $this->function="*";
        if ($operation->function=="select")
        {
            parent::__construct($operation);
        }
        else {
            echo "Sql structure is wrong at '".$this->function."'";
            exit();
        }
    }
    
    public function concatenate(): string
    {
        $this->currentStringQuery.=$this->function." from ".$this->operation->model->table;
        $this->queryString=$this->operation->concatenate()." ".$this->currentStringQuery;
        return $this->queryString;
    }
   
}

?>