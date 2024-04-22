<?php
// Función para combinar de forma aleatoria nombres y apellidos y formatearlos
function combinar_nombre_apellido($nombre, $apellidos)
{
    $apellido_aleatorio = $apellidos[array_rand($apellidos)]; // Seleccionar un apellido al azar
    $nombre_formateado = ucfirst(strtolower($nombre)); // Convertir primer letra en mayúscula
    $apellido_formateado = ucfirst(strtolower($apellido_aleatorio)); // Convertir primer letra en mayúscula
    return "$nombre_formateado $apellido_formateado";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 5</title>
</head>

<body>
    <?php
    // Array de nombres y apellidos
    $nombres = array("juan", "pedro", "maria", "raul");
    $apellidos = array("perez", "gomez", "sanchez", "lopez");

    // Generar nuevos nombres combinando nombres con apellidos de forma aleatoria y formatearlos
    $nombres_formateados = array();
    foreach ($nombres as $nombre) {
        $nombres_formateados[] = combinar_nombre_apellido($nombre, $apellidos);
    }

    // Mostrar los nombres formateados
    echo "<ul>";
    foreach ($nombres_formateados as $nombre) {
        echo "<li>$nombre</li>";
    }
    echo "</ul>";
    echo '<br><a href="/">Volver';
    ?>
</body>

</html>