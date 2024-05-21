<?php
function conexion_db(){
    // Definir las credenciales de la base de datos
    $dbHost = "localhost"; // Servidor de la base de datos
    $dbUser = "web"; // Nombre de usuario de la base de datos
    $dbPass = "web"; // Contraseña de la base de datos
    $dbName = "productos"; // Nombre de la base de datos

    // Crear la conexión a la base de datos
    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    return ($conn);
}



function consultar_db(&$num, $sql, $conn){
    // Ejecutar la consulta
    $result = $conn->query($sql);
    $num = $result->num_rows;
    return($result);
}

function insertar_db($sql, $conn){
    // Ejecutar la consulta
    $result = $conn->query($sql);
    $msj = "";
    if ($result === TRUE) {
        $msj = "Registro insertado correctamente";
    } else {
        $msj = "Error al insertar el Registro: " . $conn->error;
    }
    return($msj);
}

?>