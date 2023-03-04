<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- As a link -->
    <?php

   ?>
    <nav class="navbar navbar-dark bg-warning titulo-nav">
        <a class="navbar-brand text-dark" href="#">TextilExport</a>
    </nav>
    <main>
        <article class="Selec_Logeo">
            <section class="opciones1 bg-dark" id="Administrador">
               <a href="vista/admin.php"><button class="opciones_Button btn btn-warning text-dark"  id="administrador_button">Iniciar como Administrador</button></a>
                <img src="server/img/Administrador.png" alt="" id="administrador_img">
            </section>
            <section class="opciones2" id="Cliente">
                <a href="vista/Inicio.php"><button class="opciones_Button btn btn-warning text-ligth" id="cliente_button">Iniciar como Cliente</button></a>
                <img src="server/img/cliente.png" alt="" id="cliente_img">
            </section>
        </article>
    </main>

    <footer class="bg-warning text-center text-lg-start footer">
        <!-- Copyright -->
        <div class="text-center text-dark p-3">
          © 2020 Copyright:
          <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
      </footer>
      <script src="js/formulariosScript.js"></script>
</body>
</html>