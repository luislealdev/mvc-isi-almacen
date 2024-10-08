<?php
// Incluir el archivo de configuración
include 'config.php';

// Establecer la cabecera para que la respuesta sea en formato JSON
header('Content-Type: application/json');

try {
    // Consulta para obtener todos los productos
    $sql = "SELECT * FROM productos";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();

    // Obtener los resultados
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Verificar si hay productos
    if ($productos) {
        // Enviar el array de productos como respuesta en JSON
        echo json_encode($productos);
    } else {
        // Enviar un mensaje si no hay productos
        echo json_encode(array("mensaje" => "No se encontraron productos"));
    }
} catch (PDOException $e) {
    // En caso de error en la consulta
    echo json_encode(array("error" => $e->getMessage()));
}

// Cerrar la conexión
$conexion = null;
