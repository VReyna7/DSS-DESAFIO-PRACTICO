<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Crear Producto</title>
</head>
<body>
    <main>
        <div class="container">
        <div class="error_log">
            <?php
            if(isset($_GET['error_log']) && $_GET['error_log'] == "1"){
                echo "<p class=\"alert alert-danger\">Complete los campos requeridos</p>" ;
            }elseif(isset($_GET['error_log']) && $_GET['error_log'] == "2"){
                echo "<p class=\"alert alert-danger\">El codigo no tiene el formato correcto</p>" ;
            }
            ?>
        </div>
        <form action="../controlador/ctr.crear.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Digite el codigo:</label>
                <input type="text" class="form-control" name="codigo" placeholder="PROD#### (Requerido)">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Digite el nombre:</label>
                <input type="text" class="form-control" name="nombre" placeholder="(Requerido)">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Digite una descripcion:</label>
                <input type="text" class="form-control" name="descripcion" placeholder="(Requerido)">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Agregue la imagen del producto:</label>
                <input type="file" class="form-control" name="img" accept=".jpg, .png, .jpeg">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Digite la categoria:</label>
                <select name="categoria" id="">
                    <option value="Textil">Textil</option>
                    <option value="Promocional">Promocional</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Digite el precio:</label>
                <input type="text" class="form-control" name="precio" >
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Digite las existencias:</label>
                <input type="text" class="form-control" name="existencias" >
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary"  >
            </div>
        </form>
        </div>
    </main> 
</body>
</html>