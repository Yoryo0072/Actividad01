<?php
// Función usuario y contraseña
function validar_credenciales($usuario, $contrasena)
{
    // Lista de usuarios válidos y su contraseña asociada
    $usuarios_validos = array(
        "juan" => "D153n0W3b2",
        "pedro" => "D153n0W3b2",
        "maria" => "D153n0W3b2",
        "raul" => "D153n0W3b2"
    );

    // Verificar si el usuario está en la lista y la contraseña es correcta
    if (array_key_exists($usuario, $usuarios_validos) && $usuarios_validos[$usuario] === $contrasena) {
        return true; // Credenciales válidas
    } else {
        return false; // Credenciales inválidas
    }
}

// Obtener los datos ingresados por el usuario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_ingresado = $_POST["usuario"];
    $contrasena_ingresada = $_POST["contrasena"];

    // Validar las credenciales ingresadas
    if (validar_credenciales($usuario_ingresado, $contrasena_ingresada)) {
        echo "¡Bienvenido, $usuario_ingresado!";
        echo '<a href="/">Volver</a>';
        exit; // Termina la ejecución después de mostrar el mensaje
    } else {
        echo "Usuario o contraseña incorrectos.";
        echo '<a href="/">Volver</a>';
        exit; // Termina la ejecución después de mostrar el mensaje
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>

<body>
    <?php
    if (isset($_POST['usuario']) and isset($_POST['contrasena'])) {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        validar_credenciales($usuario, $contrasena);
    } else {
        echo
        '
        <h2>Iniciar Sesión</h2>
        <form method="post">
            <label for="usuario">Usuario:</label><br>
            <input type="text" id="usuario" name="usuario"><br><br>
            <label for="contrasena">Contraseña:</label><br>
            <input type="password" id="contrasena" name="contrasena"><br><br>
            <input type="submit" value="Iniciar Sesión">
            <br>
            <a href="/">Volver</a>
        </form>
        ';
    }
    ?>
    <a></a>
</body>

</html>