<?php
class aggregation extends operation{
    
    
    function __construct(operation $operation)
    {   
        parent::__construct();
        $this->operation=$operation;
        $this->model=$this->operation->model;
        // $this->parametersSelectQuery=$this->operation->parametersSelectQuery;
        $this->table=$this->model->table;
        $this->filtros=$operation->filtros;
        $this->valores=$operation->valores;
        $this->mainOperation=$operation->mainOperation;
        $this->parametersSelectQuery=$operation->parametersSelectQuery;
    }
    
    
    // public function run(){

    // }

    
}
?>
