<?php

    // Obtén los datos del formulario
    $usuarioNombre = $_POST["usuarioNombre"];
    $usuarioPass = $_POST["usuarioPass"];
    $usuarioEmail = $_POST["usuarioEmail"];

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vazquez";


    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Error en la conexion a la base de datos: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM usuarios WHERE usuarioNombre = '$usuarioNombre' AND usuarioPass = '$usuarioPass' AND usuarioEmail = '$usuarioEmail'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "Inicio Exitoso";
    } else {
        echo "error";
    }
    
    $conn->close();

?>