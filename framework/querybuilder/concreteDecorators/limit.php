<?php
class limit extends aggregation{
    public function __construct(operation $operation,$parameters)
    {   
        $this->function="limit";
        if($operation->function=="select" || $operation->function=="where" 
        || $operation->function=="*" || $operation->function=="all" 
        || $operation->function=="order by" || $operation->function=="column"
        || $operation->function=="left join"){
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

        $this->currentStringQuery=" limit ".$this->parameters;
        
        return $this->operation->concatenate()." ".$this->currentStringQuery;
    }
    // public function run(){

    // }
    
}

?>