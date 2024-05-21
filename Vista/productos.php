<?php 
// Diplomado en Programación Web
// Autor Damián Flores
// Registro de Producto

require_once("../Controlador/procesar_producto.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Productos</title>
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
                  <a class="nav-link disabled" href="galeria.html" aria-disabled="true">Galeria</a>
                </div>
              </div>
            </div>
          </nav>
    </header>

    <main>
    <div class="container mt-3">
    <h1>Nuevo Producto</h1>

    <form action="../Controlador/procesar_producto.php" method="post" enctype="multipart/form-data">
      <input type="hidden" id="accion" name="accion" value="NUEVO PRODUCTO">
      <div class="mb-3">
        <label for="nombreProducto" class="form-label">Nombre del Producto:</label>
        <input type="text" class="form-control" id="nombreProducto" name="nombre_producto" required>
      </div>

      <div class="mb-3">
        <label for="costo" class="form-label">Costo:</label>
        <input type="number" step="0.1" class="form-control" id="costo" name="costo" required>
      </div>

      <div class="mb-3">
        <label for="precioVenta1" class="form-label">Precio de Venta 1:</label>
        <input type="number" step="0.1" class="form-control" id="precioVenta1" name="precio_venta_1" required>
      </div>

      <div class="mb-3">
        <label for="precioVenta2" class="form-label">Precio de Venta 2:</label>
        <input type="number" step="0.1" class="form-control" id="precioVenta2" name="precio_venta_2" required>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="stockMinimo" class="form-label">Stock Mínimo:</label>
          <input type="number" class="form-control" id="stockMinimo" name="stock_minimo" required>
        </div>

        <div class="col-md-6 mb-3">
          <label for="stockActual" class="form-label">Stock Actual:</label>
          <input type="number" class="form-control" id="stockActual" name="stock_actual" required>
        </div>
      </div>

      <div class="mb-3">
        <label for="imagenPrincipal" class="form-label">Imagen Principal:</label>
        <input type="file" class="form-control" id="imagenPrincipal" name="imagen_principal" required>
      </div>

      <div class="mb-3">
        <label for="categoria" class="form-label">Categoría:</label>
          <?php
            echo selectCategoria();
          ?>
      </div>

      <button type="submit" class="btn btn-primary">Agregar Producto</button>
    </form>
  </div>

    </main>


    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>