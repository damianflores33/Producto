<?php 
require_once("../DB/conex.php");
$conn = conexion_db();

function concultarCategorias(){
    global $conn;
    $sql = "SELECT id_categoria, nombre_categoria";
    $sql .= " FROM categoria";
    $sql .= " ORDER BY 2;";
    // echo $sql;
    $num = 0;
    $resul = consultar_db($num, $sql, $conn);
    
    return($resul);
}

function InsertarNuevoProducto($nombre_producto,
                                $costo,
                                $precio_venta_1,
                                $precio_venta_2,
                                $stock_minimo,
                                $stock_actual,
                                $imagen_principal,
                                $categoria
){
    global $conn;
    $msj = "";
    $cod_producto = $categoria . "-" . $imagen_principal;
    $sql = "INSERT INTO producto(cod_producto, nombre_producto, costo, precio_venta_1, precio_venta_2, stock_minimo, stock_actual, imagen_principal, categoria)";
    $sql .=  " VALUES (";
    $sql .= "'" . $cod_producto . "', ";
    $sql .= "'" . $nombre_producto . "', ";
    $sql .= " $costo, $precio_venta_1, $precio_venta_2, $stock_minimo, $stock_actual, ";
    $sql .= "'" . $imagen_principal . "', $categoria);";
    // echo $sql;
    $msj = insertar_db($sql, $conn);
    return($msj);
}
?>