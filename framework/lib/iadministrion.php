<?php
interface iadministracion{
    public  function select($table,$estructura,$filtros);
    public  function update($query,$valores,$filtros);
    public  function delete($query,$filtros);
    public  function insert($query,$valores);


}
?>