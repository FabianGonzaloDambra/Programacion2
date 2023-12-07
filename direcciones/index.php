<!-- Contenido del módulo de clientes -->
<div id="direcciones-module">
    <h2>Listado de Direcciones</h2>

    <!-- Tabla de clientes -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>País</th>
                <th>Provincia</th>
                <th>Ciudad</th>
                <th>Código Postal</th>
                <th>Barrio</th>
                <th>Calle</th>
                <th>Número</th>
                <th>Departamento</th>
                <th>Detalles</th>
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
  
        $sql = "SELECT direccionId, direccionPais, direccionProvincia, direccionCiudad, direccionCodigopostal, direccionBarrio, direccionCallenombre, direccionCalleNumero, direccionDeptonumero, direccionDetalles FROM direcciones";
  
        $result = mysqli_query($scon, $sql);
  
       
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              
                echo "<tr>";
                  echo "<td>" . $row["direccionId"] . "</td>";
                  echo "<td>" . $row["direccionPais"] . "</td>";
                  echo "<td>" . $row["direccionProvincia"] . "</td>";
                  echo "<td>" . $row["direccionCiudad"] . "</td>";
                  echo "<td>" . $row["direccionCodigopostal"] . "</td>";
                  echo "<td>" . $row["direccionBarrio"] . "</td>";
                  echo "<td>" . $row["direccionCallenombre"] . "</td>";
                  echo "<td>" . $row["direccionCalleNumero"] . "</td>";
                  echo "<td>" . $row["direccionDeptonumero"] . "</td>";
                  echo "<td>" . $row["direccionDetalles"] . "</td>";
                  echo '<td><button class="btn btn-primary btn-sm">Editar</button></td>';
                  echo '<td><button class="btn btn-danger btn-sm">Eliminar</button></td>';
                echo "</tr>";
           
            }
        } else {
            echo "<tr><td colspan='12'>No hay direcciones cargadas.</td></tr>";
        }
  
        mysqli_close($scon);
        ?>
           
        </tbody>
    </table>

    <!-- Botón para agregar nuevo cliente -->
    <!-- Agrega el botón para agregar nuevo cliente -->
<button class="btn btn-success" id="agregar-link">Agregar Dirección</button>

<!-- Script para cargar el contenido de cliente.html -->
<script>
    // Cargar el módulo de clientes al hacer clic en el enlace de clientes
    $(document).ready(function () {

        // Manejar el clic en el botón "Agregar Cliente"
        $("#agregar-link").click(function () {
            // Cargar el contenido de cliente.html en el div con el ID "workspace"
            $("#workspace").load("/boopstrap/direcciones/direcciones.html");
        });
    });
</script>
