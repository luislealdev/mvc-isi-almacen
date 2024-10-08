<?php
// URL de la API
$api_url = "http://localhost/almacen/get_productos.php";

// Realizar la llamada a la API
$response = file_get_contents($api_url);
$productos = json_decode($response, true); // Decodificar la respuesta JSON

// Verificar si se obtuvieron productos
if (isset($productos['mensaje'])) {
    echo "<p>" . $productos['mensaje'] . "</p>";
} else {
    // Mostrar los productos en una tabla
    echo "<table border='1'>";
    echo "<tr>
            <th>Código</th>
            <th>Descripción</th>
            <th>Unidad</th>
            <th>Cantidad</th>
          </tr>";

    foreach ($productos as $producto) {
        echo "<tr>
                <td>{$producto['codigoA']}</td>
                <td>{$producto['descripcion']}</td>
                <td>{$producto['unidad']}</td>
                <td>{$producto['cantidad']}</td>
              </tr>";
    }

    echo "</table>";
}
?>
