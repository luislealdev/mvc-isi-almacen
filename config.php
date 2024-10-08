<?php
// config.php
$host = "localhost";
$usuario = "root";
$password = "";
$bd = "proveedores";

try {
    // Crear la conexión usando PDO
    $conexion = new PDO("mysql:host=$host;dbname=$bd", $usuario, $password);
    // Establecer el modo de error de PDO para lanzar excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
