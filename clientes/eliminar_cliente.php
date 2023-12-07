<?php
// Recibe el ID del cliente a eliminar desde la solicitud POST
$clienteId = $_POST['clienteId'];

// Realiza la lógica de eliminación en la base de datos (puedes adaptarla según tu estructura)
$scon = mysqli_connect('localhost', 'root', '', 'vazquez');
if (!$scon) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM clientes WHERE clienteId = '$clienteId'";

if (mysqli_query($scon, $sql)) {
    echo "Cliente eliminado correctamente";
} else {
    echo "Error al eliminar el cliente: " . mysqli_error($scon);
}

mysqli_close($scon);
?>
