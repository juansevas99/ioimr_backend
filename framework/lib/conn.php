<?php
include_once 'constantes.php';
class conn {

    private $dsn;
    protected $dbo;
    protected $stmt;
    // conecta a la Base de datos
    // gestiona los errores de la base de datos

    function __construct()
    {
        try {

            $this->dsn = "mysql:host=" . HOST_LOCAL.";port=".PORT. ";dbname=" . DBNAME;
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Permite generar un fatal error o manejar los errores de conexion a SQL
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,// permite recuperar los datos por defaul como arrray asociativo
                PDO::ATTR_PERSISTENT=>true
            );
            $this->dbo = new PDO($this->dsn, USER_LOCAL, PASSWORD_LOCAL, $options); //Crea una conexion mysql a la base de datos
            
        } catch (PDOException $e) {

           
            $variable="Error SQL:".$e->getMessage();
            echo ($variable);
            exit();
            
            
        }
    }
    public function prepararSentencia($sqlquery, $filtros)
    {
        
        try {
            
            $this->stmt = $this->dbo->prepare($sqlquery);
            if ($filtros) {

                foreach ($filtros as $key => $value) { 
                  
                    if (isset($value)) {
                        if (is_numeric($value)) {
                            
                            $this->stmt->bindValue(':' . $key, $value, PDO::PARAM_INT);
                            // echo "Entero :: LLave : ".$key."::  Valor : ".$value;
                            

                            continue;

                        }
                        if (is_string($value)) {

                            
                            $this->stmt->bindValue(':' . $key, $value, PDO::PARAM_STR);
                            // echo "String :: LLave : ".$key."::  Valor : ".$value. " \t";
                            

                            
                            continue; 

                        }
                    }
                    
                }
            }
            $this->stmt->execute();
            
            
            
        } catch (PDOException $e) {
            $variable="Error SQL:".$e->getMessage();
            echo ($variable);
            exit();
        }
    }
    public function prepararSentencia_update($sqlquery, $valores,$filtros)
    {
        
        try {
            $this->stmt = $this->dbo->prepare($sqlquery);
            if ($filtros) {

                foreach ($filtros as $key => $value) { 
                    // var_dump($filtros);
                    // exit();
                    if (isset($value)) {
                        if (is_numeric($value)) {
                            
                            $this->stmt->bindValue(':' . $key."__", $value, PDO::PARAM_INT);
                            
                            continue;

                        }
                        if (is_string($value)) {

                            
                            $this->stmt->bindValue(':' . $key."__", $value, PDO::PARAM_STR);
                            
                            continue; 

                        }
                    }
                    
                }
            }
            if ($valores){
                foreach ($valores as $key => $value) { 
                    // var_dump($filtros);
                    // exit();
                    if (isset($value)) {
                        if (is_numeric($value)) {
                            
                            $this->stmt->bindValue(':' . $key."_", $value, PDO::PARAM_INT);
                           
                            
                            continue;

                        }
                        if (is_string($value)) {

                            
                            $this->stmt->bindValue(':' . $key."_", $value, PDO::PARAM_STR);
                            
                            
                            continue; 

                        }
                    }
                }
            }
            
            // echo "::::::///";
            
            $this->stmt->execute();
            
        } catch (PDOException $e) {
            $variable="Error SQL:".$e->getMessage();
            echo ($variable);
            exit();
        }
    }
}
