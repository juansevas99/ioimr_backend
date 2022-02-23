<?php



class columns extends aggregation{
    public function __construct(operation $operation, $parameters)
    {
        
        if ($operation->function=="select")
        {
            parent:: __construct($operation);
            $this->function="column";
            // $this->model=$operation->model;
            $this->parametersSelect=$parameters;
            // $this->filtros="";
            $keys=array_keys($parameters);
            for ($i=0; $i <count($keys) ; $i++) { 
                if(!in_array($keys[$i],$operation->model->columns)){
                    echo "The columns specified for this query have not been defined yet";

                   exit(); 
                }
                

            }

            $this->validateFields();
            
        }
        else {
            echo "The SQL structure at fields clausure is wrong. Verify and try again!";
            exit();
        }        
    }
    public function concatenate(): string
    {
        

        
            
           
        return $this->operation->concatenate()." from ".$this->operation->model->table;
        

    }

     private function validateFields(){
        if ($this->parametersSelect)
        {


        $columns=array_map(function($keys,$valores){
            return $keys." as '".$valores."'";
        },array_keys($this->parametersSelect),array_values($this->parametersSelect));
        
        
        $this->parametersSelectQuery=implode(",",$columns);
    }
    else{
        return "";
    }
     }
    // public function run(){

    // }
    
}

?>