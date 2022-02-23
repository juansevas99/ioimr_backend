<?php

class user extends Controller
{


    function __construct()
    {
        parent::__construct("user_m");
    }
    public function visualizar()
    {
        $operation=new select($this->model);
        $operation=new columns($operation,[
            'id_user'=>'COD',
            'email'=>'Correo',
            'contact_number'=>'Contacto',
            'user_name'=>'Usuario',
            'password'=>'pass'
            
        ]);
        $operation=new inner($operation,"roles", 
        ['rol_name'=>'rol']);
        tablas::paginate($operation,6,$_GET['id']);
        echo json_encode([$this->model->data,tablas::$pages]);
 }
    public function prepararCreacion(){
        include "resources/templates/crearusuario.php";
    }

    public function displayusuarioview(){
        include "resources/templates/Prueba/vistas/user.php";

    }

    public function displaycreateuser(){
        include "resources/templates/Prueba/vistas/crearusuario.php";

    }
    
    public function login()
    {

       
        unset($_POST['login']);

        
        $operation=new select($this->model);
        $operation=new all($operation);
        $operation=new where($operation,['email' => $_POST['email'],'password' => $_POST['password']]);
        $operation->run();
        
        if (isset($this->model->data) && !empty($this->model->data)) {
                $data = $this->model->data;
                
                $_SESSION['logged'] = "logged";
                $_SESSION['name_user'] = $data[0]['name_user'];
                $_SESSION['email_user'] = $data[0]['email'];
                $_SESSION['id_user'] = $data[0]['password'];
               

       
           
        }
        
        
    }


    function actualizar(){
        $operation=new select($this->model);
        $operation=new columns($operation,[
            'id_usuario'=>'id_usuario',
            'usuario' => 'usuario',
             'correo' => 'correo',]);
        $operation=new where($operation,['id_usuario'=>$_GET['id']]);
        $operation->run();
        $data=$this->model->data;
        
        include 'resources/templates/actualizarUsuario.php';
    }
    public function confirmarActualizar(){
            $operation=new update($this->model);
            $operation=new set($operation,$_POST);
            
            $operation=new where($operation,['id_usuario'=>$_POST['id']]);
            $operation->run();
            
            header("Location: ".URL."routes/settings");            
    }

    function delete(){
        $this->model->delete_(['id_usuario'=>$_GET['id']]);
        header("Location: ".URL."routes/admin");
    }

    public function cerrarSesion()
    {
        session_destroy();
        header("Location:".URL);
    }
    
    public function create(){
        $operation=new insert($this->model,$_POST);
        $operation->run();

        $vista=["user","usuario"];
        include_once 'resources/templates/Prueba/vistas/plantilla.php';

    }
}
