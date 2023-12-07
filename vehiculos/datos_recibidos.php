
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../home.css">
    
    <style>
        body {
            padding-top: 56px;
        }


    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
    <div class="container-fluid">
        <!-- Logo en el centro -->
        <a class="navbar-brand mx-auto" href="../home.html">
            <img src="../img/circle.png" alt="Logo" height="30">
        </a>

        <!-- Botón para colapsar en dispositivos pequeños -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Módulos de ejemplo en el Navbar -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../home.html">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="clientes-link">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="direcciones-link">Direcciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="empleados-link">Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="mecanicos-link">Mecánicos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="vehiculos-link">Vehículos</a>
                </li>
               
                <!-- Agrega más módulos según tus necesidades -->
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4" id="workspace">
    <!-- Contenido de tu sistema, aquí puedes cargar dinámicamente tus módulos -->
    <div class="text-center">
    <?php
;$scon = mysqli_connect('localhost', 'root', '', 'vazquez');

if (!$scon) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Conexion realizada correctamente";

$vehiculoMarca = $_POST["vehiculoMarca"];
$vehiculoModelo = $_POST["vehiculoModelo"];
$vehiculoAniomodelo = $_POST["vehiculoAniomodelo"];
$vehiculoColor = $_POST["vehiculoColor"];
$vehiculoTipo = $_POST["vehiculoTipo"];
$vehiculoPatente = $_POST["vehiculoPatente"];
$vehiculoNombretitulo = $_POST["vehiculoNombretitulo"];
$vehiculoCostocompra = $_POST["vehiculoCostocompra"];
$vehiculoFechacompra = $_POST["vehiculoFechacompra"];
$vehiculoKmingreso = $_POST["vehiculoKmingreso"];
$vehiculoCambioaceite = $_POST["vehiculoCambioaceite"];
$vehiculoCambiocorrea = $_POST["vehiculoCambiocorrea"];
$vehiculoDetalles = $_POST["vehiculoDetalles"];
$vehiculoCostosreparaciones = $_POST["vehiculoCostosreparaciones"];
$vehiculoKmsalida = $_POST["vehiculoKmsalida"];

echo "<h2>Detalles del formulario de vehículos:</h2>";
echo "<p><strong>Marca:</strong> $vehiculoMarca</p>";
echo "<p><strong>Modelo:</strong> $vehiculoModelo</p>";
echo "<p><strong>Año:</strong> $vehiculoAniomodelo</p>";
echo "<p><strong>Color:</strong> $vehiculoColor</p>";
echo "<p><strong>Tipo:</strong> $vehiculoTipo</p>";
echo "<p><strong>Patente:</strong> $vehiculoPatente</p>";
echo "<p><strong>Título:</strong> $vehiculoNombretitulo</p>";
echo "<p><strong>Costo:</strong> $vehiculoCostocompra</p>";
echo "<p><strong>Fecha:</strong> $vehiculoFechacompra</p>";
echo "<p><strong>Kms de ingreso:</strong> $vehiculoKmingreso</p>";
echo "<p><strong>Cambio de aceite:</strong> $vehiculoCambioaceite</p>";
echo "<p><strong>Cambio de correa:</strong> $vehiculoCambiocorrea</p>";
echo "<p><strong>Detalles:</strong> $vehiculoDetalles</p>";
echo "<p><strong>Costo de reparaciones:</strong> $vehiculoCostosreparaciones</p>";
echo "<p><strong>Kms de salida:</strong> $vehiculoKmsalida</p>";

$sql = "INSERT INTO vehiculos 
        (vehiculoMarca, vehiculoModelo, vehiculoAniomodelo, vehiculoColor, vehiculoTipo, vehiculoPatente, vehiculoNombretitulo, vehiculoCostocompra, vehiculoFechacompra, vehiculoKmingreso, vehiculoCambioaceite, vehiculoCambiocorrea, vehiculoDetalles, vehiculoCostosreparaciones, vehiculoKmsalida) 
        VALUES ('$vehiculoMarca', '$vehiculoModelo', '$vehiculoAniomodelo', '$vehiculoColor', '$vehiculoTipo', '$vehiculoPatente', '$vehiculoNombretitulo', '$vehiculoCostocompra', '$vehiculoFechacompra', '$vehiculoKmingreso', '$vehiculoCambioaceite', '$vehiculoCambiocorrea', '$vehiculoDetalles', '$vehiculoCostosreparaciones', '$vehiculoKmsalida')";

if (mysqli_query($scon, $sql)) {
    echo "INSERTADO CORRECTAMENTE";
} else {
    echo "Error en la inserción:" . mysqli_error($scon);
}

mysqli_close($scon);

echo "<p><a href='#' id='vehiculo-link'>Ver lista de direcciones</a></p> ";
?>

<!-- Scripts de Bootstrap, jQuery y dependencias -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Agrega aquí tus propios scripts si es necesario -->

<script>
    // Cargar el módulo de clientes al hacer clic en el enlace de clientes
    $(document).ready(function () {

        $("#clientes-link").click(function () {
            $.get("../clientes/", function (data) {
                $("#workspace").html(data);
            });
        });

        $("#direcciones-link").click(function () {
    $.get("../direcciones/", function (data) {
        $("#workspace").html(data);
    });
});

        $("#empleados-link").click(function () {
            $.get("../empleados/", function (data) {
                $("#workspace").html(data);
            });
        });

        $("#mecanicos-link").click(function () {
            $.get("../mecanicos/", function (data) {
                $("#workspace").html(data);
            });
        });

        $("#vehiculos-link").click(function () {
            $.get("../vehiculos/", function (data) {
                $("#workspace").html(data);
            });
        });

        $("#vehiculo-link").click(function () {
            $.get("../vehiculos/", function (data) {
                $("#workspace").html(data);
            });
        });
    });
</script>


    </div>
</div>
<footer>
    <a href="https://www.instagram.com/vazquezautomoviles"><img src="../img/circle.png" alt="Ernesto Gustavo Vazquez Automotores" class="circle1"></a>
    <h1>Grupo 2</h1>
    <p><h2>Integrantes</h2></p>
    <ul>
        <li>Dambra Fabián Gonzalo</li>
        <li>Ruiz Enrique Rodolfo</li>
        <li>Vera Giuliana</li>
    </ul>
    <a href="https://www.facebook.com/profile.php?id=100092504651388&locale=es_LA"><img src="../img/circle.png" alt="Ernesto Gustavo Vazquez Automotores" class="circle2"></a>
</footer>
</body>
</html>