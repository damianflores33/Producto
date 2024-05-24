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
    $msj = "";
    $cod_producto = "";
    $nombre_producto = "";
    $costo = 0.0;
    $precio_venta_1 = 0.0;
    $precio_venta_2 = 0.0;
    $stock_minimo = 0;
    $stock_actual = 0;
    $imagen_principal = "";
    $categoria  = "";

    if (isset($_REQUEST["nombre_producto"])){
        $nombre_producto = trim($_REQUEST["nombre_producto"]); 
        // echo $nombre_producto;
    }

    if (isset($_REQUEST["costo"])){
        $costo = trim($_REQUEST["costo"]); 
    }

    if (isset($_REQUEST["precio_venta_1"])){
        $precio_venta_1 = trim($_REQUEST["precio_venta_1"]); 
    }

    if (isset($_REQUEST["precio_venta_2"])){
        $precio_venta_2 = trim($_REQUEST["precio_venta_2"]); 
    }

    if (isset($_REQUEST["stock_minimo"])){
        $stock_minimo = trim($_REQUEST["stock_minimo"]); 
    }

    if (isset($_REQUEST["stock_actual"])){
        $stock_actual = trim($_REQUEST["stock_actual"]); 
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
    echo $msj;
    header('Location: ../vista/productos.php');
}

if (isset($_REQUEST["accion"]) && ($_REQUEST["accion"] == 'NUEVO PRODUCTO')){
    guardarNuevoProducto();
}
?>