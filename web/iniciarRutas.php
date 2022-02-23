<?php


$ruta=explode("/",$_SERVER['REQUEST_URI']);
//$clase=!empty($ruta[2])?$ruta[2]:"";
//$metodo=!empty($ruta[3])?$ruta[3]:"";
//$_GET["id"]=!empty($ruta[4])?$ruta[4]:"";
$clase=!empty($ruta[1])?$ruta[1]:"";
$metodo=!empty($ruta[2])?$ruta[2]:"";
$_GET["id"]=!empty($ruta[3])?$ruta[3]:"";

unset($_GET["var"]);
$ruta=$clase."/".$metodo;
    
// rutas para API
web::registrarRutas("producto/","producto","visualizarEstadoActivo");
web::registrarRutas("producto/s","producto","displayproductoview");
web::registrarRutas("crearProducto/","producto","displaycreateProduct");
web::registrarRutas("producto/create","producto","create");

web::registrarRutas("producto/listForMov","producto","getProductos");



web::registrarRutas("user/login","user","login");
web::registrarRutas("user/close","user","cerrarSesion");
web::registrarRutas("user/","user","displayusuarioview");
web::registrarRutas("user/list","user","visualizar");
web::registrarRutas("crearuser/","user","displaycreateuser");
web::registrarRutas("user/create","user","create");




