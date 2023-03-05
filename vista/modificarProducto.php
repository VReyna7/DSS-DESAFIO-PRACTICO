<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Crear Producto</title>
    <link rel="stylesheet" href="../css/formu.css?v=<?php echo time()?>">
    <?php
    include("../modelo/class.producto.php");
    $pro = new Producto();
    $pro->setProducto($_GET['producto']);
    ?>
</head>
<body>
<nav class="navbar navbar-dark bg-warning titulo-nav">
        <a class="navbar-brand text-dark" href="#">TextilExport</a>
        <a href="admin.php"><button class="btn btn-danger">Regresar</button></a>
    </nav>
    <main>
        <h1>Modificar Producto</h1>
        <div class="container">
        <div class="error_log">
            <?php
            if(isset($_GET['error_log']) && $_GET['error_log'] == "1"){
                echo "<p class=\"alert alert-danger\">Complete los campos requeridos</p>" ;
            }elseif(isset($_GET['error_log']) && $_GET['error_log'] == "2"){
                echo "<p class=\"alert alert-danger\">El precio y exitencias no puede estar vacio o negativo</p>";
            }
            ?>
        </div>
        <form action="../controlador/ctr.modificar.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Digite el codigo:</label>
                <input type="text" class="form-control" name="" value="<?= $pro->getCodigo()?>" disabled>
                <input type="hidden" class="form-control" name="codigo" value="<?= $pro->getCodigo()?>" >
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Digite el nombre:</label>
                <input type="text" class="form-control" name="nombre" placeholder="(Requerido)" value="<?= $pro->getNombre()?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Digite una descripcion:</label>
                <input type="text" class="form-control" name="descripcion" placeholder="(Requerido)" value="<?= $pro->getDescripcion()?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Agregue la imagen del producto:</label>
                <input type="file" class="form-control" name="img" accept=".jpg, .png, .jpeg" value="../server/img/<?=$pro->getImg()?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Digite la categoria:</label>
                <select name="categoria" id="">
                    <?php 
                            if($pro->getCategoria() == "Promocional"){
                            echo "<option value='".$pro->getCategoria()."'>".$pro->getCategoria()."</option>";   
                            echo "<option value='Textil'>Textil</option>";         
                          }else{
                            echo "<option value='".$pro->getCategoria()."'>".$pro->getCategoria()."</option>";   
                            echo "<option value='Promocional'>Promocional</option>";       
                          }
                    
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Digite el precio:</label>
                <input type="number" class="form-control" name="precio" value="<?= $pro->getPrecio()?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Digite las existencias:</label>
                <input type="number" class="form-control" name="existencias" value="<?= $pro->getExistencias()?>">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" >
            </div>
        </form>
        </div>
    </main> 

    <footer class="bg-warning text-center text-lg-start footer">
        <!-- Copyright -->
        <div class="text-center text-dark p-3">
        <p>Cristian Pineda PC222718 / Víctor Reyna RM222722</p>
        </div>
        <!-- Copyright -->
      </footer>
</body>
</html>