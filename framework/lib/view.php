<?php
// por  cada que se llame generara una estrucura preestablecida 

class view{
 public function __construct(){
    $this->header="resources/templates/header.php";
    $this->aside="resources/templates/aside.php";
    $this->footer="resources/templates/footer.php";
 }
 public function render($vista,$titulo){
    include $this->header;
    include $this->aside;
    include "resources/templates/".$vista.".php";
    include $this->footer;
   //  include $this->footer;
 }
}
?>