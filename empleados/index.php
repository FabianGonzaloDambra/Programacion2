<!-- Contenido del módulo de clientes -->
<div id="clientes-module">
    <h2>Listado de Empleados</h2>

    <!-- Tabla de clientes -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Email</th>
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
  
        $sql = "SELECT empleadoId, empleadoNombre, empleadoApellido, empleadoDni, empleado_direccion, empleadoTelefono, empleadoMail FROM empleados";
  
        $result = mysqli_query($scon, $sql);
  
       
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              
                echo "<tr>";
                  echo "<td>" . $row["empleadoId"] . "</td>";
                  echo "<td>" . $row["empleadoNombre"] . "</td>";
                  echo "<td>" . $row["empleadoApellido"] . "</td>";
                  echo "<td>" . $row["empleadoDni"] . "</td>";
                  echo "<td>" . $row["empleado_direccion"] . "</td>";
                  echo "<td>" . $row["empleadoTelefono"] . "</td>";
                  echo "<td>" . $row["empleadoMail"] . "</td>";
                  echo '<td><button class="btn btn-primary btn-sm">Editar</button></td>';
                  echo '<td><button class="btn btn-danger btn-sm">Eliminar</button></td>';
                echo "</tr>";
           
            }
        } else {
            echo "<tr><td colspan='9'>No hay empleados cargados.</td></tr>";
        }
  
        mysqli_close($scon);
        ?>
           
        </tbody>
    </table>

    <!-- Botón para agregar nuevo cliente -->
    <!-- Agrega el botón para agregar nuevo cliente -->
<button class="btn btn-success" id="agregar-link">Agregar Empleado</button>

<!-- Script para cargar el contenido de cliente.html -->
<script>
    // Cargar el módulo de clientes al hacer clic en el enlace de clientes
    $(document).ready(function () {

        // Manejar el clic en el botón "Agregar Cliente"
        $("#agregar-link").click(function () {
            // Cargar el contenido de cliente.html en el div con el ID "workspace"
            $("#workspace").load("/boopstrap/empleados/empleados.html");
        });
    });
</script>
