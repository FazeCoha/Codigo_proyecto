<div>
    
    <table id="tablaUsuario" class="table table-bordered table-hover table-sm">
        <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Nick</th>
            <th>Rol</th>
            <th>Nombre</th>
            <th>Correo</th>
        </tr>
        </thead>
        <tfoot class="thead-light">
        <tr>
            <th>Id</th>
            <th>Nick</th>
            <th>Rol</th>
            <th>Nombre</th>
            <th>Correo</th>
        </tr>
        </tfoot>
        
        <?php
        
        $usuDAO = new UsuarioDAO(); 
        $usuario = $usuDAO->listarUsuarios();
        foreach ($usuario as $registro) 
        {
            echo "
            <tr>
                <td>".$registro['idUsuario']."</td>
                <td>".$registro['nick']."</td>
                <td>".$registro['rol']."</td>
                <td>".$registro['nombre']."</td>
                <td>".$registro['correo']."</td>
            <tr>
            ";
        }
         ?>
        
    </table>

    <script>
        $(document).ready(function() {
        $('#tablaUsuario').dataTable();
        } );
    </script>
</div>