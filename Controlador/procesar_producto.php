<?php
require_once("../Modelo/modelo_productos.php");

function selectCategoria(){
    $result = concultarCategorias();
    $select = '' .
        '<select class="form-select" id="categoria" name="categoria" required>' .
        '    <option value="" selected>Seleccionar categor&iacute;a</option>';
    foreach($result as $row){
        $select .= '<option value="' . $row["id_categoria"] . '">' . $row["nombre_categoria"] . '</option>';
        }
        $select .= '</select>';
    return $select;
}

function selectCategoria_galeria($accion){
    $result = concultarCategorias();
    $select = '' .
        '<select class="form-select" id="categoria" name="categoria" required '.$accion.'>' .
        '    <option value="">Seleccionar categor&iacute;a</option>';
    foreach($result as $row){
        $select .= '<option value="' . $row["id_categoria"] . '">' . $row["nombre_categoria"] . '</option>';
        }
        $select .= '</select>';
    return $select;
}

////////////////////////////////////////////////////////////////////
function guardarNuevoProducto(){
    $msj = "Se guardo con Éxito";
    $cod_producto = "";
    $nombre_producto = "";
    $costo = 0.0;
    $precio_venta_1 = 0.0;
    $precio_venta_2 = 0.0;
    $stock_minimo = 0;
    $stock_actual = 0;
    $imagen_principal = "";
    $categoria  = "";

    if (isset($_REQUEST["nombreProducto"])){
        $nombre_producto = trim($_REQUEST["nombreProducto"]); 
        // echo $nombre_producto;
    }

    if (isset($_REQUEST["costo"])){
        $costo = trim($_REQUEST["costo"]); 
    }

    if (isset($_REQUEST["precioVenta1"])){
        $precio_venta_1 = trim($_REQUEST["precioVenta1"]); 
    }

    if (isset($_REQUEST["precioVenta2"])){
        $precio_venta_2 = trim($_REQUEST["precioVenta2"]); 
    }

    if (isset($_REQUEST["stockMinimo"])){
        $stock_minimo = trim($_REQUEST["stockMinimo"]); 
    }

    if (isset($_REQUEST["stockActual"])){
        $stock_actual = trim($_REQUEST["stockActual"]); 
    }

    if (isset($_REQUEST["categoria"])){
        $categoria = trim($_REQUEST["categoria"]); 
    }

    $dirProductos = "../Imagenes/productos/";

    $archivo = $_FILES["imagen_principal"];
    $nombreArchivo = $archivo["name"];
    $tipoArchivo = $archivo["type"];
    $tamanioArchivo = $archivo["size"];
    $errorArchivo = $archivo["error"];
    $tmpArchivo = $archivo["tmp_name"];

    // Validar tipo de archivo
    if ($tipoArchivo != "image/jpeg") {
        $msj = "Error: Solo se permiten archivos JPG.";
    }

    if ($errorArchivo == 0) {
    // Generar un nombre único para el archivo
    $nombreUnico = uniqid() . ".jpg";
    $rutaDestino = $dirProductos . $nombreUnico;
    $imagen_principal = $nombreUnico;

    if (move_uploaded_file($tmpArchivo, $rutaDestino)) {
        $msj = "Archivo JPG subido correctamente. Nombre del archivo: " . $nombreUnico;
    } else {
        $msj = "Error al mover el archivo. Inténtalo de nuevo.";
    }
    } else {
        $msj =  "Error al subir el archivo. Código de error: " . $errorArchivo;
    }

    $msj = InsertarNuevoProducto($nombre_producto,
                            $costo,
                            $precio_venta_1,
                            $precio_venta_2,
                            $stock_minimo,
                            $stock_actual,
                            $imagen_principal,
                            $categoria);
    // echo $msj;
    //echo json_encode(['mensaje' => "***"]);
    //header('Location: ../vista/productos.php');
    //echo "...........";

        $respuesta = array(
          'exito' => true,
          'mensaje' => "Datos procesados correctamente",
        );

}

if (isset($_REQUEST["accion"]) && ($_REQUEST["accion"] == 'NUEVO PRODUCTO')){
    guardarNuevoProducto();
}
?>