<!-- Contenido del módulo de clientes -->
<div id="clientes-module">
    <h2>Listado de Clientes</h2>

    <!-- Tabla de clientes -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
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
  
        $sql = "SELECT clienteId, clienteNombre, clienteApellido, clienteDni, clienteTelefono, clienteMail FROM clientes";
  
        $result = mysqli_query($scon, $sql);
  
       
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              
                echo "<tr>";
                  echo "<td>" . $row["clienteId"] . "</td>";
                  echo "<td>" . $row["clienteNombre"] . "</td>";
                  echo "<td>" . $row["clienteApellido"] . "</td>";
                  echo "<td>" . $row["clienteDni"] . "</td>";
                  echo "<td>" . $row["clienteTelefono"] . "</td>";
                  echo "<td>" . $row["clienteMail"] . "</td>";
                  echo '<td><button class="btn btn-primary btn-sm">Editar</button></td>';
                  echo '<td><button class="btn btn-danger btn-sm">Eliminar</button></td>';
                echo "</tr>";
           
            }
        } else {
            echo "<tr><td colspan='8'>No hay clientes cargados.</td></tr>";
        }
  
        mysqli_close($scon);
        ?>
           
        </tbody>
    </table>

    <!-- Botón para agregar nuevo cliente -->
    <!-- Agrega el botón para agregar nuevo cliente -->
<button class="btn btn-success" id="agregar-link">Agregar Cliente</button>

<!-- Script para cargar el contenido de cliente.html -->
<script>
    // Cargar el módulo de clientes al hacer clic en el enlace de clientes
    $(document).ready(function () {

        // Manejar el clic en el botón "Agregar Cliente"
        $("#agregar-link").click(function () {
            // Cargar el contenido de cliente.html en el div con el ID "workspace"
            $("#workspace").load("/boopstrap/clientes/clientes.html");
        });
    });
</script>
