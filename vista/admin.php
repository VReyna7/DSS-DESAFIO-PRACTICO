<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/productos.css?v=<?php echo time()?>">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Admin Panel</title>
    <?php
    include("../modelo/class.producto.php");
    $pro = new Producto();
    ?>
</head>
<body>
<nav class="navbar navbar-dark bg-warning">
        <a class="navbar-brand text-dark titulo-nav" href="#">TextilExport</a>
        <a href="../"><button class="btn btn-danger">Regresar a opciones de usuario</button></a>
    </nav>
    <main>
        <?php
        if(isset($_GET['modificar']) && $_GET['modificar']==true){
                echo "<p class=\"alert alert-success\">El producto se ha modificado correctamente</p>" ;
        }elseif(isset($_GET['crear']) && $_GET['crear']==true){
                echo "<p class=\"alert alert-success\">El producto se ha creado correctamente</p>" ;
        }
        ?>
        <h1>Información Productos </h1>
        <a href="../vista/crearProducto.php" class="crear"><button class="btn btn-primary">Crear Producto</button></a>
        <div class="busqueda">
            <form action="../controlador/ctr.buscar.php" method="POST">
                <div>
                    <input type="text" name="busqueda" placeholder="Codigo de producto" class="form-control">
                </div>
                <div>
                    <input type="hidden" name="user" value="admin">
                    <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
                </div>
            </form>
        </div>
        <?php
        if(isset($_GET['busqueda'])){
            if(empty($pro->buscarProducto($_GET['busqueda'],1))){
                echo "<p class=\"alert alert-primary\">El codigo del producto no existe</p>" ;
                echo $pro->verProductos(1);
            }else{
                echo $pro->buscarProducto($_GET['busqueda'],1);
            }
        }else{
            echo $pro->verProductos(1);
        }
        ?>
    </main>
    <footer class="bg-warning text-center text-lg-start footer">
        <!-- Copyright -->
        <div class="text-center text-dark p-3">
          © 2020 Copyright:
          <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
      </footer>
</body>
</html>