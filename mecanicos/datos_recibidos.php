
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
            padding-top: 56px; /* Ajuste para Navbar fijo */
        }

        /* Puedes agregar estilos adicionales aquí */
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

$mecanicoNombre = $_POST["mecanicoNombre"];
$mecanicoApellido = $_POST["mecanicoApellido"];
$mecanicoEspecialidad = $_POST["mecanicoEspecialidad"];
$mecanico_direccion = $_POST["mecanico_direccion"];
$mecanicoTelefono = $_POST["mecanicoTelefono"];
$mecanicoMail = $_POST["mecanicoMail"];

echo "<h2>Detalles del formulario de cliente:</h2>";
echo "<p><strong>Nombre:</strong> $mecanicoNombre</p>";
echo "<p><strong>Apellido:</strong> $mecanicoApellido</p>";
echo "<p><strong>Especialidad:</strong> $mecanicoEspecialidad</p>";
echo "<p><strong>Dirección:</strong> $mecanico_direccion</p>";
echo "<p><strong>Teléfono:</strong> $mecanicoTelefono</p>";
echo "<p><strong>Correo electrónico:</strong> $mecanicoMail</p>";

$sql = "INSERT INTO mecanicos 
        (mecanicoNombre, mecanicoApellido, mecanicoEspecialidad, mecanico_direccion, mecanicoTelefono, mecanicoMail) 
        VALUES ('$mecanicoNombre', '$mecanicoApellido', '$mecanicoEspecialidad', '$mecanico_direccion', '$mecanicoTelefono', '$mecanicoMail')";

if (mysqli_query($scon, $sql)) {
    echo "INSERTADO CORRECTAMENTE";
} else {
    echo "Error en la inserción:" . mysqli_error($scon);
}

mysqli_close($scon);

echo "<p><a href='#' id='mecanico-link'>Ver lista de clientes</a></p> ";
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

        $("#mecanico-link").click(function () {
            $.get("../clientes/", function (data) {
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