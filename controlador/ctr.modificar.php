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

if(empty($codigo) || empty($nombre) || empty($descripcion)){
    header("location: ../vista/modificarProducto.php?producto=$codigo&error_log=1");
}else{
    move_uploaded_file($rutaImg,$destino);
    if(!empty($nombreImg)){
        $pro->setURL($nombreImg);
    }else{
        $pro->setProducto($codigo);
        $pro->setURL($pro->getImg());
    }
    $pro->setNombre($nombre);
    $pro->setDescripcion($descripcion);
    $pro->setCategoria($categoria);
    $pro->setPrecio($precio);
    $pro->setExistencias($existencias);
    $pro->modificarProducto($codigo);
    header("location: ../vista/admin.php?modificar=true");
}
?>