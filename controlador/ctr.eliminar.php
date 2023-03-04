<?php
    $codigo = $_GET["cod"];
    $productos = simplexml_load_file("../server/productos.xml");
    $index = 0;
    $i=0;
    foreach($productos->producto as $produc){
        if($produc->codigo==$codigo){
            $index=$i;
            break;
        }
        $i++;
    }

    unset($productos->producto[$index]);
    file_put_contents("../server/productos.xml", $productos->asXML());
    header('location: ../vista/admin.php');
?>
