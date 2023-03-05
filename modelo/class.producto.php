<?php
class Producto{
    private $codigo;
    private $nombre;
    private $descripcion;
    private $imgURL;
    private $categoria;
    private $precio;
    private $existencias;

    public function setCod($cod){
        $this->codigo = $cod;   
    }

    public function setNombre($nom){
        $this->nombre = $nom;   
    }

    public function setDescripcion($des){
        $this->descripcion = $des;   
    }

    public function setURL($imgurl){
        $this->imgURL = $imgurl;   
    }

    public function setCategoria($cat){
        $this->categoria = $cat;   
    }

    public function setPrecio($pre){
        $this->precio = $pre;   
    }

    public function setExistencias($ext){
        $this->existencias = $ext;   
    }


    public function crearProducto(){
        $xml = "..\server\productos.xml";
        $add = simplexml_load_file($xml);
        $producto=$add->addChild("producto");
        $producto->addChild("codigo",$this->codigo)."<br>";
        $producto->addChild("nombre",$this->nombre)."\n";
        $producto->addChild("descripcion",$this->descripcion)."\n";
        $producto->addChild("img",$this->imgURL)."\n";
        $producto->addChild("categoria",$this->categoria)."\n";
        $producto->addChild("precio",$this->precio)."\n";
        $producto->addChild("existencias",$this->existencias)."\n";
        file_put_contents($xml, $add->asXML());
    }

    public function verProductos($user){
        $xml = "..\server\productos.xml";
        $add = simplexml_load_file($xml);
        //Impresion de datos
        $string = "<div class=\"productos\">";
        foreach($add->producto as $pro){
            //Impresion de los productos
            $string .= "<div class=\"producto\">";
            $string .= "<h3 class='bg-dark'>$pro->nombre</h3>";
            $string .= "<img src=\"../server/img/$pro->img\">";
            if($user==1){
                $string .= "<p class=\"productoTexto\"><b>Codigo:</b> $pro->codigo</p>";
            }
            $string .= "<p class=\"productoTexto\"><b>Categoria:</b> $pro->categoria</p>";
            if($user == 1){
                $string .= "<p><b>Descripción:</b> $pro->descripcion</p>";
            }

            if($pro->existencias == 0){
                $string .= "<p class=\"alert alert-danger\"><b>Sin Existencias</b></p>";
            }else{
                $string .= "<p class=\"productoTexto\"><b>Existencias:</b> $pro->existencias</p>";
            }
            $string .= "<p class=\"productoTexto precio\"><b>$</b> $pro->precio</p>";
            if($user == 1){
            $string .= "<div class=\"edicion\">";
                $string .= "<a href=\"modificarProducto.php?producto=$pro->codigo\"><button class=\"btn btn-primary\">Modificar producto</button></a>";
                $string .= "<button class=\"btn btn-danger\" data-toggle=\"modal\"  data-target=\"#delete_$pro->codigo\">Eliminar Producto</button>";
            $string .= "</div>";
            }else{
                $string .= "<div class=\"edicion\">";
                $string .= "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal_$pro->codigo'>Más información</button>";
                $string .= "</div>";
            }
            $string .= "</div>";
            $string .= "<div class=\"modal fade\" id=\"exampleModal_$pro->codigo\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">";
            $string .= "<div class=\"modal-dialog\" role=\"document\">";
            $string .= "<div class=\"modal-content\">";
            $string .= " <div class=\"modal-header\">";
            $string .= " <h5 class=\"modal-title\" id=\"exampleModalLabel\">Información completa</h5>";
            $string .= "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">";
            $string .= " <span aria-hidden=\"true\">&times;</span></button>";
            $string .= "</div>";
            $string .= "<div class=\"modal-body\">";
            $string .= "<p><b>Codigo:</b> $pro->codigo</p>";
            $string .= "<p><b>Nombre:</b> $pro->nombre</p>";
            $string .= "<p><b>Categoria:</b> $pro->categoria</p>";
            $string .= "<p><b>Descripción:</b> $pro->descripcion</p>";
            if($pro->existencias == 0){
                $string .= "<p class=\"alert alert-danger\"><b>Sin Existencias</b></p>";
            }else{
                $string .= "<p class=\"productoTexto\"><b>Existencias:</b> $pro->existencias</p>";
            }
            $string .= "<p class=\"productoTexto precio\"><b>Precio $</b> $pro->precio</p>";
            $string .= "<img src=\"../server/img/$pro->img\">";
            $string .= "</div>";
            $string .= "<div class=\"modal-footer\">";
            $string .= "<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>";
            $string .= "</div>";
            $string .= "</div>";
            $string .= "</div>";
            $string .= "</div>";

            $string .= "<div class=\"modal fade\" id=\"delete_$pro->codigo\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">";
            $string .= "<div class=\"modal-dialog\" role=\"document\">";
            $string .= "<div class=\"modal-content\">";
            $string .= " <div class=\"modal-header\">";
            $string .= " <h5 class=\"modal-title\" id=\"exampleModalLabel\">Información completa</h5>";
            $string .= "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">";
            $string .= " <span aria-hidden=\"true\">&times;</span></button>";
            $string .= "</div>";
            $string .= "<div class=\"modal-body\">";
            $string .= "<h4>Esta seguro de eliminar este articulo</h4>";
            $string .= "<p>Nombre: $pro->nombre</p>";
            $string .= "<p>Codigo: $pro->codigo</p>";
            $string .= "<img src=\"../server/img/$pro->img\">";
            $string .= "</div>";
            $string .= "<div class=\"modal-footer\">";
            $string .= "<button type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Cancelar</button>";
            $string .= "<a href='../controlador/ctr.eliminar.php?cod=$pro->codigo'><button type=\"button\" class=\"btn btn-danger\">Confirmar</button></a>";
            $string .= "</div>";
            $string .= "</div>";
            $string .= "</div>";
            $string .= "</div>";
        }
        return $string;
    }

    public function buscarProducto($cod,$user){
        $xml = "../server/productos.xml";
        $add = simplexml_load_file($xml);
        $index = "";
        $i = 0;
        $string = "<div class=\"productos\">";
        foreach($add->producto as $pro){
            if($pro->codigo == $cod || $pro->nombre == $cod){
                $index=$pro->codigo;
                $string .= "<div class=\"producto\">";
            $string .= "<h3 class='bg-dark'>$pro->nombre</h3>";
            $string .= "<img src=\"../server/img/$pro->img\">";
            if($user==1){
                $string .= "<p class=\"productoTexto\"><b>Codigo:</b> $pro->codigo</p>";
            }
            $string .= "<p class=\"productoTexto\"><b>Categoria:</b> $pro->categoria</p>";
            if($user == 1){
                $string .= "<p><b>Descripción:</b> $pro->descripcion</p>";
            }

            if($pro->existencias == 0){
                $string .= "<p class=\"alert alert-danger\"><b>Sin Existencias</b></p>";
            }else{
                $string .= "<p class=\"productoTexto\"><b>Existencias:</b> $pro->existencias</p>";
            }
            $string .= "<p class=\"productoTexto precio\"><b>$</b> $pro->precio</p>";
            if($user == 1){
            $string .= "<div class=\"edicion\">";
                $string .= "<a href=\"modificarProducto.php?producto=$pro->codigo\"><button class=\"btn btn-primary\">Modificar producto</button></a>";
                $string .= "<button class=\"btn btn-danger\" data-toggle=\"modal\"  data-target=\"#delete_$pro->codigo\">Eliminar Producto</button>";
            $string .= "</div>";
            }else{
                $string .= "<div class=\"edicion\">";
                $string .= "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal_$pro->codigo'>Más información</button>";
                $string .= "</div>";
            }
            $string .= "</div>";
            $string .= "<div class=\"modal fade\" id=\"exampleModal_$pro->codigo\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">";
            $string .= "<div class=\"modal-dialog\" role=\"document\">";
            $string .= "<div class=\"modal-content\">";
            $string .= " <div class=\"modal-header\">";
            $string .= " <h5 class=\"modal-title\" id=\"exampleModalLabel\">Información completa</h5>";
            $string .= "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">";
            $string .= " <span aria-hidden=\"true\">&times;</span></button>";
            $string .= "</div>";
            $string .= "<div class=\"modal-body\">";
            $string .= "<p><b>Codigo:</b> $pro->codigo</p>";
            $string .= "<p><b>Nombre:</b> $pro->nombre</p>";
            $string .= "<p><b>Categoria:</b> $pro->categoria</p>";
            $string .= "<p><b>Descripción:</b> $pro->descripcion</p>";
            if($pro->existencias == 0){
                $string .= "<p class=\"alert alert-danger\"><b>Sin Existencias</b></p>";
            }else{
                $string .= "<p class=\"productoTexto\"><b>Existencias:</b> $pro->existencias</p>";
            }
            $string .= "<p class=\"productoTexto precio\"><b>Precio $</b> $pro->precio</p>";
            $string .= "<img src=\"../server/img/$pro->img\">";
            $string .= "</div>";
            $string .= "<div class=\"modal-footer\">";
            $string .= "<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>";
            $string .= "<button type=\"button\" class=\"btn btn-primary\"></button>";
            $string .= "</div>";
            $string .= "</div>";
            $string .= "</div>";
            $string .= "</div>";

            $string .= "<div class=\"modal fade\" id=\"delete_$pro->codigo\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">";
            $string .= "<div class=\"modal-dialog\" role=\"document\">";
            $string .= "<div class=\"modal-content\">";
            $string .= " <div class=\"modal-header\">";
            $string .= " <h5 class=\"modal-title\" id=\"exampleModalLabel\">Información completa</h5>";
            $string .= "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">";
            $string .= " <span aria-hidden=\"true\">&times;</span></button>";
            $string .= "</div>";
            $string .= "<div class=\"modal-body\">";
            $string .= "<h4>Esta seguro de eliminar este articulo</h4>";
            $string .= "<p>Nombre: $pro->nombre</p>";
            $string .= "<p>Codigo: $pro->codigo</p>";
            $string .= "<img src=\"../server/img/$pro->img\">";
            $string .= "</div>";
            $string .= "<div class=\"modal-footer\">";
            $string .= "<button type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Cancelar</button>";
            $string .= "<a href='../controlador/ctr.eliminar.php?cod=$pro->codigo'><button type=\"button\" class=\"btn btn-danger\">Confirmar</button></a>";
            $string .= "</div>";
            $string .= "</div>";
            $string .= "</div>";
            $string .= "</div>";
               break; 
            }
            $i++;
        }
        if($index!=""){
            return $string;
        }else{
            return "";
        }
    }

    public function modificarProducto($cod){
        $xml = "../server/productos.xml";
        $add = simplexml_load_file($xml);
        $index = 0;
        $i = 0;
        foreach($add->producto as $pro){
            if($pro->codigo == $cod){
                $index=$i;
            }
            $i++;
        }
        $producto=$add->producto[$index];
        $producto->nombre = $this->nombre;
        $producto->descripcion = $this->descripcion;
        $producto->img = $this->imgURL;
        $producto->categoria = $this->categoria;
        $producto->precio = $this->precio;
        $producto->existencias = $this->existencias;

        file_put_contents($xml, $add->asXML());
    }

    public function setProducto($cod){
        $xml = "../server/productos.xml";
        $add = simplexml_load_file($xml);
        $index = 0;
        $i = 0;
        foreach($add->producto as $pro){
            if($pro->codigo == $cod){
                $index=$i;
            }
            $i++;
        }
        $producto=$add->producto[$index];
        $this->codigo = $producto->codigo;
        $this->nombre = $producto->nombre;
        $this->descripcion = $producto->descripcion;
        $this->imgURL = $producto->img;
        $this->categoria = $producto->categoria;
        $this->precio = $producto->precio;
        $this->existencias= $producto->existencias;

        file_put_contents($xml, $add->asXML());
    }

    //metodos return 
    public function getCodigo(){
        return $this->codigo;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getImg(){
        return $this->imgURL;
    }

    public function getCategoria(){
        return $this->categoria;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getExistencias(){
        return $this->existencias;
    }
}
?>
