<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Bienvenida</title>
    <link rel="stylesheet" href="public/estilos/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@300;400&display=swap" rel="stylesheet">

    <link href="public/pnotify/css/pnotify.css" rel="stylesheet" />
    <link href="public/pnotify/css/pnotify.buttons.css" rel="stylesheet" />
    <link href="public/pnotify/css/custom.min.css" rel="stylesheet" />
    <script src="public/pnotify/js/jquery.min.js">
    </script>
    <script src="public/pnotify/js/pnotify.js">
    </script>
    <script src="public/pnotify/js/pnotify.buttons.js">
    </script>
</head>

<body>
    <?php
    date_default_timezone_set('America/La_Paz');
    ?>
    <h1>BIENVENIDOS, REGISTRA TU ASISTENCIA</h1>
    <h2 id="fecha">
        <?= date("d/m/Y, h:i:s") ?>
    </h2>
    <?php
    include "modelo/conexion.php";
    include "controlador/controlador_registrarasistencia.php";
    $sql = $conexion->query("SELECT * FROM empleado");
    ?>
    <div class="container">
        <a class="acceso" href="vista/login/login.php">Ingresar al sistema</a>
        <p class="nombre">Ingrese su Nombre</p>
        <form action="" method="POST">
            <select style="width: 650px; height: 70px; margin-left: 10px; font-size: 20px;" type="select" placeholder="Nombre" name="txtnombre" class="input input__select mb-2">
                <option value=" " style="font-size: 20px;">Todos los empleados</option>
                <?php
                while ($datos = $sql->fetch_object()) { ?>
                    <option value="<?= $datos->nombre ?>">
                        <?= $datos->nombre . " " . $datos->apellido ?>
                    </option>
                <?php }
                ?>
            </select>
            <div class="botones">

                <button class="entrada" type="submit" name="btnentrada" value="ok">ENTRADA</button>
                <button class="salida" type="submit" name="btnsalida" value="ok">SALIDA</button>
            </div>
        </form>
    </div>

    <script>
        setInterval(() => {
            let fecha = new Date();
            let fechaHora = fecha.toLocaleString();
            document.getElementById("fecha").textContent = fechaHora;
        }, 1000);
    </script>

</body>

</html>