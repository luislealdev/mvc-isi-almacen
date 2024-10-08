<?php
// vista_grafica_productos.php
include 'controlador_productos.php';

$productos = obtener_productos(); // Obtener productos desde el controlador
$agrupados = agrupar_por_unidad($productos); // Agrupar productos por unidad

// Preparar datos para la gráfica
$unidades = array_keys($agrupados);
$cantidades = array_values($agrupados);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histograma de Productos</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Histograma de Productos por Unidad</h1>
    <canvas id="myChart" width="400" height="200"></canvas>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($unidades); ?>,
                datasets: [{
                    label: 'Cantidad de Productos',
                    data: <?php echo json_encode($cantidades); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
