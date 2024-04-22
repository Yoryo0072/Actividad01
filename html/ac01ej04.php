<?php
// Función para contar la cantidad de veces que aparece una letra en una cadena
function contar_letra($cadena, $letra)
{
    $contador = 0;
    for ($i = 0; $i < strlen($cadena); $i++) {
        if ($cadena[$i] === $letra) {
            $contador++;
        }
    }
    return $contador;
}

// Función para obtener las vocales que aparecen en una cadena
function obtener_vocales($cadena)
{
    $vocales = array();
    $cadena = strtolower($cadena); // Convertir la cadena a minúsculas para facilitar la comparación
    for ($i = 0; $i < strlen($cadena); $i++) {
        $caracter = $cadena[$i];
        if (preg_match('/[aeiouáéíóú]/', $caracter)) {
            $vocales[] = $caracter;
        }
    }
    return $vocales;
}

// Función para contar la cantidad de veces que aparece cada vocal en una cadena
function contar_vocales($cadena)
{
    $vocales = array('a', 'e', 'i', 'o', 'u');
    $conteo_vocales = array();
    foreach ($vocales as $vocal) {
        $conteo_vocales[$vocal] = contar_letra($cadena, $vocal);
    }
    return $conteo_vocales;
}

// Obtener la frase ingresada por el usuario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $frase = $_POST["frase"];

    // Contar la cantidad de veces que aparece la letra "o"
    $contador_o = contar_letra($frase, 'o');

    // Obtener las vocales que aparecen en la frase
    $vocales = obtener_vocales($frase);

    // Contar la cantidad de veces que aparece cada vocal
    $conteo_vocales = contar_vocales($frase);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de letras y vocales</title>
</head>

<body>
    <?php
    if (isset($_POST['frase'])) {
        $cant = $_POST['frase'];
        echo "<p>Cantidad de veces que aparece la letra 'o': $contador_o</p>";
        echo "<p>Vocales que aparecen en la frase: " . implode(", ", $vocales) . "</p>";
        echo "<p>Cantidad de veces que aparece cada vocal:</p>";
        echo "<ul>";
        foreach ($conteo_vocales as $vocal => $conteo) {
            echo "<li>$vocal: $conteo</li>";
        }
        echo "</ul>";

        echo '<a href="/">Retornar Formulario</a>';
        echo '<a href="/">Retornar Formulario';
    } else {
        echo
        '
        <h2>Contador de letras y vocales</h2>
        <form method="post">
            <label for="frase">Ingrese una frase:</label><br>
            <input type="text" id="frase" name="frase"><br><br>
            <button type="submit">Enviar</button>
        </form>
        ';
    }
    ?>
</body>

</html>