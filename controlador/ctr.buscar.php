<?php
$busqueda = isset($_POST['busqueda'])?$_POST['busqueda']:"";
$user = isset($_POST['user'])?$_POST['user']:"";

if(empty($busqueda) && $user=="cliente"){
    header("location: ../vista/Inicio.php");
}elseif($user=="cliente"){
    header("location: ../vista/Inicio.php?busqueda=$busqueda");
}elseif(empty($busqueda) && $user=="admin"){
    header("location: ../vista/admin.php");
}elseif($user=="admin"){
    echo $user;
    header("location: ../vista/admin.php?busqueda=$busqueda");
}
?>