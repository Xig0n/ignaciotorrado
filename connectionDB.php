<?php
// Datos de conexión a la base de datos MySQL
$host_name = '';
$database = '';
$user_name = '';
$password = '';

// Conexión a la base de datos
$conexion = new mysqli($host_name, $user_name, $password, $database);


// // Verificar la conexión
if ($conexion->connect_error) {
    echo "Error de conexión: " . $conexion->connect_error;
}
?>