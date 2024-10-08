<?php
// vista_tabla_productos.php
include 'controlador_productos.php';

$productos = obtener_productos(); // Obtener productos desde el controlador

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
