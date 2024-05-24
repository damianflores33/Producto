<?php 
require_once("../Modelo/modelo_productos.php");

$categoria = $_POST['categorian'];

$result = concultarProductosPorCategorias($categoria);
    $informacion = ''.
                    '<div class="row justify-content-between">' .
                    '   <div class="col">' .
                    '       <div class="card" style="width: 18rem;">';
    
    
    foreach($result as $row){
        $informacion .= ''.
                        '<img src="../Imagenes/productos/'.$row["imagen_principal"].'" class="card-img-top" alt="...">' .
                        '<div class="card-body">' .
                        '<h5 class="card-title">'.$row["nombre_producto"].'</h5>' .
                        '<p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>' .
                        '<a href="./vista/productos.html" class="btn btn-primary">Go somewhere</a>' .
                        '</div>';
        }
    $informacion .= ''.
                    '</div>' .
                    '</div>' .
                    '</div>';

echo json_encode(['informacion' => $informacion]);
?>