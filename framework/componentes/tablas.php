<?php

class tablas{

    public static $rows;
    public static $pages;
    function __construct(){
        
        
    }


    public static function paginate(operation $operation, $limit, $offset){
        
        $operation->run();
        // echo json_encode(count($operation->model->data));
        // exit();
        tablas::$rows=count($operation->model->data); 
        // Stmt should not be a public attribute. It should create a getter method to obtain this in one way
        tablas::$pages=ceil(tablas::$rows/$limit);
        // echo json_encode([tablas::$pages,tablas::$rows,$limit,ceil(tablas::$rows/$limit)]);
        // exit();
        
        
        
        $offset--;
        $offset=$offset*$limit;
        $operation= new limit($operation,$limit);
        $operation=new offset($operation,$offset);
        $operation->run();
        // echo  $operation->concatenate();
        // exit();

    }
}
?>