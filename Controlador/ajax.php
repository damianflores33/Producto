<?php 
$nombre = "";
if (isset($_REQUEST["nombre"])){
    $nombre = $_REQUEST["nombre"];
}

if (isset($_POST['cualquierCosa'])){
    $cualquierCosa = $_REQUEST['cualquierCosa'];
}



$mensaje = "Productos seleccionados: " . implode(', ', $cualquierCosa);

// Codificar la respuesta en JSON
$informacion = json_encode(['mensaje' => $mensaje]);

echo $informacion;

// $nombre = "77";
// $informacion = $cualquierCosa;

// echo json_encode(['informacion' => $informacion]);
?>