<?php
class set extends aggregation{
    public function __construct(operation $operation, $parameters)
    {
        $this->function="set";
        if($operation->function=='update'){
            
        
        parent:: __construct($operation);
        unset($parameters["id"]);
        $this->parameters=$parameters;
        $this->valores=$parameters;
        
        $keys=array_keys($this->parameters);
            for ($i=0; $i <count($keys) ; $i++) { 
                if(!in_array($keys[$i],$operation->model->columns)){
                    echo "The columns specified for this query have not been defined yet";

                   exit(); 
                }
                

            }
    }
    else {
        echo "SQL structure is wrong at ".$this->function;
        exit();
    }
        
    }
    public function concatenate(): string
    {


        if ($this->parameters){
            

            $set="";
            $i=0;
            foreach ($this->parameters as $key => $value) {
                if(!empty($value)){

                    if($i==0){
                        $set.=$key."= :".$key;
                    }
                    else{
                        $set.=" , ".$key."= :".$key;
                    }
                    $i++;
                }
            }
            $this->currentStringQuery=$this->function." ".$set;
            return $this->operation->concatenate()." ".$this->currentStringQuery;
        }
        else{
            return "";
        }
    }
    public function run(){

    }
    
}

?>