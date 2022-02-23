<?php

class from extends aggregation{
    public function __construct(operation $operation)
    {
        parent:: __construct($operation);
        
    }
    public function concatenate(): string
    {
       return parent::concatenate();
    }
    public function run(){

    }
    
}

?>