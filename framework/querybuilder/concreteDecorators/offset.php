<?php
class offset extends aggregation{
    public function __construct(operation $operation,$parameters)
    {   
        $this->function="offset";
        if($operation->function=="select" || $operation->function=="where" 
        || $operation->function=="*" || $operation->function=="all"
        || $operation->function=="order by" || $operation->function=="limit"){
            parent:: __construct($operation);
            
            $this->parameters=$parameters;// it will receive a number which  will defines how many records this query will return
        }
        else 
        {
            echo "The sql structure is wrong at '".$this->function."'";
            exit();

        }
        
    }
    public function concatenate(): string
    {

        $this->currentStringQuery=" offset ".$this->parameters;
        
        return $this->operation->concatenate()." ".$this->currentStringQuery;
    }
    // public function run(){

    // }
    
}

?>