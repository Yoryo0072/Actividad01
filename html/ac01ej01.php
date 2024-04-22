<?php
/* Ejercicio1.- Escribir un programa donde nos de la bien venida y nos indique en que navegador estamos
    ejecutando.(10Pts)*/

// Función para obtener el nombre del navegador a partir del agente de usuario
function get_browser_name($user_agent)
{
    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
    elseif (strpos($user_agent, 'Edge')) return 'Edge';
    elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
    elseif (strpos($user_agent, 'Safari')) return 'Safari';
    elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';

    return 'Otro';
}

// Función para mostrar el mensaje de bienvenida y el navegador
function welcome_message()
{
    // Obtener el agente de usuario del navegador
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    // Obtener el nombre del navegador
    $browser = get_browser_name($user_agent);

    // Mostrar el mensaje de bienvenida y el navegador
    echo "¡Bienvenido! Estás utilizando el navegador $browser.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <?php
    welcome_message();
    ?>
</body>

</html>