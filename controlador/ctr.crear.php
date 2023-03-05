<?php
require_once("../modelo/class.producto.php");
require_once("../modelo/class.validaciones.php");
$val = new Validacion();
$pro = new Producto();

$codigo = isset($_POST['codigo'])?$_POST['codigo']:"";
$nombre = isset($_POST['nombre'])?$_POST['nombre']:"";
$descripcion = isset($_POST['descripcion'])?$_POST['descripcion']:"";
$categoria = isset($_POST['categoria'])?$_POST['categoria']:"";
$precio = isset($_POST['precio'])?$_POST['precio']:"";
$existencias = isset($_POST['existencias'])?$_POST['existencias']:"";
//Imagen
$img = isset($_FILE['img'])?$_POST['img']:"";
$nombreImg = $_FILES['img']['name'];
$rutaImg = $_FILES['img']['tmp_name'];
$destino = "../server/img/$nombreImg";

if(empty($codigo)||empty($nombre)||empty($descripcion)){
    header('location: ../vista/crearProducto.php?error_log=1');
}elseif(!$val->valCod($codigo)){
    header('location: ../vista/crearProducto.php?error_log=2');
}elseif($precio<0 || $existencias<0){
    header('location: ../vista/crearProducto.php?error_log=3');
}else{
    move_uploaded_file($rutaImg,$destino);
    $pro->setCod($codigo);
    $pro->setNombre($nombre);
    $pro->setDescripcion($descripcion);
    $pro->setURL($nombreImg);
    $pro->setCategoria($categoria);
    $pro->setPrecio($precio);
    $pro->setExistencias($existencias);
    $pro->crearProducto();
    header("location: ../vista/admin.php?crear=true");
}
?>
