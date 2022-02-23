<?php

class model extends conn implements iadministracion{
    public $data=[];

function update($query,$valores,$filtros){
    $query.=$formatear->update($valores,$filtros);
    

    $this->prepararSentencia_update($query,$valores,$filtros);
    if($this->stmt){
        $this->response=$this->stmt;
    }
    }

public function delete($query,$filtros){
    
  
    
    $this->prepararSentencia($query,$filtros);
        if($this->stmt){
            $this->response="Se borro exitosamente el dato";
         
        }
}
public function insert($query,$filtros){
    // $query.=$formatear->insert($filtros);
    // $query.=" )";

    
   
    
    $this->prepararSentencia($query,$filtros);
    $this->data=$this->stmt;
    

} 

public function select($table,$estructura,$filtros){
        $query=$formatear->select($table,$estructura,$filtros);
        
        $this->prepararSentencia($query,$filtros);
        
    
         if($this->stmt){
            $this->data=$this->stmt->fetchAll();            
        }
}

public function listar($query,$filtros){

    $this->prepararSentencia($query,$filtros);
   
    if($this->stmt){
        $this->data=$this->stmt->fetchAll();

        
    }
    
}
function actualizar($query,$filtros){
    
    $this->prepararSentencia($query,$filtros);
    if($this->stmt){
        $this->response=$this->stmt;
    }
    }


}

?>