<?php 
class reportes extends Controller{
    function __construct()
    {   
        parent::__construct("reportes_m");
    }
    function cargarReporte(){
        if(isset($_POST["cargar"]) && !empty($_POST["cargar"])){

        }
        else{
            $this->view="reports";
            include 'lib/resources/templates.php';
        }
    }

    function kardex(){
        $filtros="";
        if (isset($_POST['send'])){
            unset($_POST['send']);
            $filtros=$_POST;
        }
        $this->model->select_('kardex',$filtros);
        
        echo json_encode($this->model->data);  
    }

    function entradas(){
        $filtros="";
        if (isset($_POST['send'])){
            unset($_POST['send']);
            $filtros=$_POST;
        }
        $this->model->select_('entradas',$filtros);
        echo json_encode($this->model->data);  
    }

    
    function salidas(){
        $filtros="";
        if (isset($_POST['send'])){
            unset($_POST['send']);
            $filtros=$_POST;
        }
        $this->model->select_('salidasReporte',$filtros);
        echo json_encode($this->model->data);  
    }
    function masVendidos(){
        $filtros="";
        if (isset($_POST['send'])){
            unset($_POST['send']);
            $filtros=$_POST;
        }
        $this->model->select_('masVendidos',$filtros);
        echo json_encode($this->model->data);  
    }
    
}

?>