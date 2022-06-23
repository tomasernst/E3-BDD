<h4>Vuelos por aprobar según fecha</h4>
    <form action="admin.php" method="post">
        Fecha mínima: <input type="text" name="fecha1" />
        -  
        Fecha máxima: <input type="text" name="fecha2" />
        <br>
        <input type="submit" value="Buscar!"/>
    </form>

<?php
        echo "<h6>Ingrese en formato yyyy-mm-dd</h6>"
        require("conection.php");
        $fecha1 = $_POST["fecha1"] ; 
        $fecha2 = $_POST["fecha2"] ; 
 
        // Busco todos los vuelos pendientes entre estas dos fechas 
        $query = "SELECT * 
            FROM propuestas 
            WHERE estado = 'pendiente' AND (fecha_salida BETWEEN '$fecha1' and '$fecha2')
                                       AND (fecha_llegada BETWEEN '$fecha1' and '$fecha2');";
        // supuesto: se consideró el rango de fecha como el intervalo en el que ocurrería el vuelo
        //           y no como el que contenga la fecha de envio de la propuesta
        $result = $db2 -> prepare($query);
        $result -> execute();

        $data = $result -> fetchAll();
    ?>

    <table>
        <tr>
            <th> ID </th>
            <th> Estado </th>
            <th> Codigo </th>
            <th> Fecha salida </th>
            <th> Hora salida </th>
            <th> Fecha llegada </th>
            <th> Hora llegada </th>
            <th> Aerodromo salida </th>
            <th> Aerodromo llegada </th>
            <th> Codigo aeronave </th>
            <th> Fecha envio propuesta </th>
        </tr>

        <?php
            foreach ($data as $d) {
                echo "<tr>
                        <td>
                            <form method="POST" action="ver_propuesta.php">
                                <input type="button" name="ID" value="$d[0]"/>
                            </form>
                        </td>
                        <td>$d[1]</td>
                        <td>$d[2]</td>
                        <td>$d[3]</td>
                        <td>$d[4]</td>
                        <td>$d[5]</td>
                        <td>$d[6]</td>
                        <td>$d[7]</td>
                        <td>$d[8]</td>
                        <td>$d[9]</td>
                        <td>$d[10]</td>
                        <td>$d[11]</td>";
            }
        ?>

    </table>