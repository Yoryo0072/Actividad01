<?php
// Función para verificar si un número es primo
function es_primo($numero)
{
    if ($numero <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) {
            return false;
        }
    }
    return true;
}

// Función para generar N números primos aleatorios menores que 110
function generar_NPrimos($cantidad)
{
    $numeros_primos = array();
    $max_intentos = 500; // Límite para evitar bucles infinitos

    while (count($numeros_primos) < $cantidad && $max_intentos > 0) {
        $numero_aleatorio = rand(2, 109); // Generar número aleatorio entre 2 y 109

        if (es_primo($numero_aleatorio) && !in_array($numero_aleatorio, $numeros_primos)) {
            $numeros_primos[] = $numero_aleatorio;
        }

        $max_intentos--;
    }

    return $numeros_primos;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">12
    <title>Actividad 3</title>
</head>

<body>
    <?php
    if (isset($_POST['numero'])) {
        $cant = $_POST['numero'];
        $num_primos = generar_NPrimos($cant);
        echo "Numeros primos aleatorios:<br>";
        echo implode(", <br>", $num_primos);
        echo '<a href="/">Retornar Formulario';
    } else {
        echo
        '
        <h3>Array Numero Primos</h3>
        <form method="POST">
        <div>
            <label for="numero">Ingrese un numero:</label>
            <input type="number" id="numero" name="numero">
        </div>
        <div>
            <button type="submit">Enviar</button>
        </div>
        </form>
        ';
    }
    ?>
</body>

</html>