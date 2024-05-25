<?php 
// Diplomado en Programación Web
// Autor Damián Flores
// Catalogo de Productos

require_once("../Controlador/procesar_producto.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Shop</title>
</head>
<body>
    <header>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">
              <img src="../imagenes/logoHome.png" alt="Shop" width="30" height="24">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-link" href="productos.php">Productos</a>
                <a class="nav-link" href="galeria.php">Galeria</a>
              </div>
            </div>
          </div>
        </nav>
    </header>

    <main>
      <div class="d-flex justify-content-center">
      
        <div class="container text-center">
            <div class="row">
              <div class="col text-end">&nbsp;</div>
              <div class="col text-end">&nbsp;</div>
              
              <div class="col text-end">
                <form action="galeria.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" id="accion" name="accion" value="NUEVO PRODUCTO">
                    <label for="categoria" class="form-label">Categor&iacute;a:</label>
                      <?php
                        echo selectCategoria();
                      ?>
                </form>
              </div>
            </div>  

        
          </div>
      </div>
    </main>
  <br><br>
<div id="respuestaccc">

</div>
<!-- ----------------------------------------------------------------------- -->
<!-- ----------------------------------------------------------------------- -->
<<<<<<< HEAD
<!--modificacion... ----------------------------------------------------------------------- -->
=======
<!--...modificacion ----------------------------------------------------------------------- -->
>>>>>>> 83b8ecfe4bc66b11a4699a92cf3bca50b85504cb

<script src="../jquery/jquery_3_5_1.min.js"></script>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#categoria').change(function() {
                var categoria1 = $(this).val();

                $.ajax({
                    url: '../Controlador/procesarSeleccion.php',
                    type: 'POST',
                    data: { categorian: categoria1 },
                    dataType: 'json',
                    success: function(respuesta) {
                        console.log(respuesta)
                        $('#respuestaccc').html(respuesta.informacion);
                    }
                });
            });
        });
    </script>

</body>
</html>