<!-- Contenido del módulo de clientes -->
<div id="direcciones-module">
    <h2>Listado de Vehículos</h2>

    <!-- Tabla de clientes -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Color</th>
                <th>Tipo</th>
                <th>Patente</th>
                <th>Título</th>
                <th>Costo</th>
                <th>Fecha</th>
                <th>Kms de ingreso</th>
                <th>Cambio de aceite</th>
                <th>Cambio de correa</th>
                <th>Detalles</th>
                <th>Costos de reparaciones</th>
                <th>Kms de saliida</th>
                <th>Acciones</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
        $scon = mysqli_connect('localhost', 'root', '', 'vazquez');

        if (!$scon) {
            die("Connection failed: " . mysqli_connect_error());
        }
  
        $sql = "SELECT vehiculoId, vehiculoMarca, vehiculoModelo, vehiculoAniomodelo, vehiculoColor, vehiculoTipo, vehiculoPatente, vehiculoNombretitulo, vehiculoCostocompra, vehiculoFechacompra, vehiculoKmingreso, vehiculoCambioaceite, vehiculoCambiocorrea, vehiculoDetalles, vehiculoCostosreparaciones, vehiculoKmsalida FROM vehiculos";
  
        $result = mysqli_query($scon, $sql);
  
       
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              
                echo "<tr>";
                  echo "<td>" . $row["vehiculoId"] . "</td>";
                  echo "<td>" . $row["vehiculoMarca"] . "</td>";
                  echo "<td>" . $row["vehiculoModelo"] . "</td>";
                  echo "<td>" . $row["vehiculoAniomodelo"] . "</td>";
                  echo "<td>" . $row["vehiculoColor"] . "</td>";
                  echo "<td>" . $row["vehiculoTipo"] . "</td>";
                  echo "<td>" . $row["vehiculoPatente"] . "</td>";
                  echo "<td>" . $row["vehiculoNombretitulo"] . "</td>";
                  echo "<td>" . $row["vehiculoCostocompra"] . "</td>";
                  echo "<td>" . $row["vehiculoFechacompra"] . "</td>";
                  echo "<td>" . $row["vehiculoKmingreso"] . "</td>";
                  echo "<td>" . $row["vehiculoCambioaceite"] . "</td>";
                  echo "<td>" . $row["vehiculoCambiocorrea"] . "</td>";
                  echo "<td>" . $row["vehiculoDetalles"] . "</td>";
                  echo "<td>" . $row["vehiculoCostosreparaciones"] . "</td>";
                  echo "<td>" . $row["vehiculoKmsalida"] . "</td>";
                  echo '<td><button class="btn btn-primary btn-sm">Editar</button></td>';
                  echo '<td><button class="btn btn-danger btn-sm">Eliminar</button></td>';
                echo "</tr>";
           
            }
        } else {
            echo "<tr><td colspan='20'>No hay vehículos para mostrar.</td></tr>";
        }
  
        mysqli_close($scon);
        ?>
           
        </tbody>
    </table>

    <!-- Botón para agregar nuevo cliente -->
    <!-- Agrega el botón para agregar nuevo cliente -->
<button class="btn btn-success" id="agregar-link">Agregar Vehículo</button>

<!-- Script para cargar el contenido de cliente.html -->
<script>
    // Cargar el módulo de clientes al hacer clic en el enlace de clientes
    $(document).ready(function () {

        // Manejar el clic en el botón "Agregar Cliente"
        $("#agregar-link").click(function () {
            // Cargar el contenido de cliente.html en el div con el ID "workspace"
            $("#workspace").load("/boopstrap/vehiculos/vehiculos.html");
        });
    });
</script>

<style>
    #direcciones-module {
        overflow: auto;
    }
</style>