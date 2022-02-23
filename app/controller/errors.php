<?php
class errors{
    public  $page;
    public  $message="undefined";
    public $title="undefined";

    public function error404(){
        $this->title="Error 404";
        $this->message="The resource does not exist !";
        ob_start();
        include_once 'resources/templates/errors.php';
        return ob_get_clean();
    }
    function error403(){
        $this->title="Error 403";
        $this->message="this page is forbidden";
        ob_start();
        include_once 'resources/templates/errors.php';
        return ob_get_clean();
    }
    function error400(){
        $this->title="Error 400";
        ob_start();
        include_once 'resources/templates/errors.php';
        return ob_get_clean();
    }
    function error500(){
        $this->title="Error 500";
        $this->message="something went wrong in the server";
        ob_start();
        include_once 'resources/templates/errors.php';
        return ob_get_clean();
    }
}

?>