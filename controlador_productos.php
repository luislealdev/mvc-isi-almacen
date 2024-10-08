<?php
// controlador_productos.php

function obtener_productos() {
    $api_url = "http://localhost/almacen/get_productos.php"; // URL de la API
    $response = file_get_contents($api_url); // Llamada a la API
    return json_decode($response, true); // Decodificar la respuesta JSON
}

function agrupar_por_unidad($productos) {
    $agrupados = [];
    foreach ($productos as $producto) {
        $unidad = $producto['unidad'];
        if (!isset($agrupados[$unidad])) {
            $agrupados[$unidad] = 0;
        }
        $agrupados[$unidad] += $producto['cantidad']; // Sumar las cantidades
    }
    return $agrupados;
}
?>
