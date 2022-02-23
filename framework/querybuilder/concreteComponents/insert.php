<?php

class insert extends operation {
    function __construct(model $model=null,$filtros)
    {
        $this->model=$model;
        $this->function="insert";
        $this->mainOperation="insert";
        $this->filtros=$filtros;
        $this->table=$this->model->table;
        $this->operation=$this;
        parent::__construct();
    }
    public function concatenate(): string
    {
       return $this->function." into ".$this->model->table.$this->validarCampos();
    }
    

    function validarCampos(){
        $values=" values(";
        $keys=array_keys($this->filtros);
        $columns=" (";
        $columns.=implode(",",$keys);
        for ($i=0; $i< count($keys); $i++) { 
            $values.=":".$keys[$i];
            if ($i+1!=count($keys)){
                $values.=",";
            }     
        }
        $columns.=")";
        $values.=") ";
        return $columns.$values;



    }
}

?>