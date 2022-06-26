<?php include("/home/grupo7/Sites/templates/header.html"); ?>
<h3>PASAJERO</h3>

<?php
    session_start();
    require("/home/grupo7/Sites/config/connection.php");
        // Se buscan los datos del usuario 
        // Revisar el WHERE statement
        $pasaporte = $_SESSION['username'];
        $query = "SELECT nombre_pasajero 
                  FROM pasajero
                  WHERE pasaporte_pasajero = '$pasaporte';";

        $result = $db -> prepare($query);
        $result -> execute();

        $data = $result -> fetchAll();

    ?>
    <h4>Nombre pasajero: <?php echo $data[0][0];?> </h4> 
    <h4>Pasaporte: <?php echo $pasaporte?> </h4> 
    <?php 
    require("/home/grupo7/Sites/config/connection.php");
    $queryres = "SELECT reserva_id, codigo_reserva, vuelo_id
               FROM Reserva
               WHERE pasaporte_comprador = '$pasaporte'";
    
    $resultres = $db -> prepare($queryres);
    $resultres -> execute();
    $datares = $resultres -> fetchAll();

?>
    <table>
        <tr>
            <th> ID reserva </th>
            <th> Código reserva </th>
            <th> ID Vuelo </th>
        </tr>

        <?php
            foreach ($datares as $d) {
                echo "<tr>
                        <td>$d[0]</td>
                        <td>$d[1]</td>
                        <td>$d[2]</td>
                      </tr>";
            }
        ?>

    </table>

    <?php // Cargamos los datos para el drop down
    
    $query_1 = "SELECT aerodromo_salida_id, fecha_salida, aerodromo_llegada_id
                FROM propuestas
                WHERE estado = 'aceptado'"; //ORIGEN

    $result1 = $db2 -> prepare($query_1);
    $result1 -> execute();

    $data_origen = $result1 -> fetchAll();
    ?>
    <!--
    <table>
        <tr>
            <th> ID salida </th>
            <th> Fecha salida </th>
            <th> ID llegada
        </tr>

        <?php
        /*
            foreach ($data_origen as $d) {
                echo "<tr>
                        <td>$d[0] </td>
                        <td>$d[1]</td>
                        <td>$d[2]</td>
                    </tr>";
            }
        */
        ?>
    </table>
        -->
    <?php 
    $query_2 = "SELECT aerodromo_llegada_id
                FROM propuestas
                WHERE estado = 'aceptado'"; //DESTINO

    $result2 = $db2 -> prepare($query_2);
    $result2 -> execute();

    $data_destino = $result2 -> fetchAll();    
    ?>
    <!--
    <table>
        <tr>
            <th> ID </th>
        </tr>

        <?php
        /*
            foreach ($data_destino as $d) {
                echo "<tr>
                        <td>$d[0] </td>
                    </tr>";
            }
        */
        ?>
    </table>
    -->
    

<h4>Busque su vuelo</h4>    

    <form action="pasajero.php" method="post">
        Ciudad origen: <input type="text" name="origen" />
        -  
        Ciudad destino: <input type="text" name="destino" />
        -
        Fecha despegue: <input type="text" name="fecha" />
        <br>
        <input type="submit" value="Buscar"/>
    </form>

    <?php
        
        require("/home/grupo7/Sites/config/connection.php");
        $origen = $_POST["origen"]; 
        $destino = $_POST["destino"];
        $fecha = $_POST["fecha"];
 
        
        $query = "SELECT * 
                  FROM propuestas 
                  WHERE estado = 'aprobado' 
                  AND (fecha_salida = '$fecha')
                  AND (aerodromo_salida_id = $origen)
                  AND (aerodromo_llegada_id = $destino);";
        
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
                        <td> $d[0]
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
                    </tr>"; ?>
            <?php } ?>
    </table>

<?php include("/home/grupo7/Sites/templates/footer.html"); ?>