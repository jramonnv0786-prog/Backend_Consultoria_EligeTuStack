
<?php
// Obtenemos la fecha y la hora actuales del servidor.
$fechaActual = date('d/m/Y');
$horaActual = date('H:i:s');

// Escapamos los datos antes de mostrarlos en HTML.
//Cada vez que se solicite la página PHP podrá generar la fecha del mismo día.
$fechaSegura = htmlspecialchars($fechaActual, ENT_QUOTES, 'UTF-8'); // htmlspecialchars() ayuda a prevenir ataques XSS
$horaSegura = htmlspecialchars($horaActual, ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demostración Backend PHP</title>
</head>
<body>
    <header>
        <h1>Esto es una demostración de un servidor en PHP</h1>
    </header>

    <main>
        <h2>Datos dinámicos del servidor</h2>

        <p>La fecha actual del servidor es:
            <?php echo $fechaSegura; ?>
        </p>

        <p>La hora actual del servidor es:
            <?php echo $horaSegura; ?>
        </p>

        <p>
            Esta página ha sido generada mediante PHP
        </p>
    </main>

    <footer>
        <p>Proyecto Backend de una Consultoría Tecnológica</p>
    </footer>
</body>
</html>