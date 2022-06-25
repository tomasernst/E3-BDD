<h3>PASAJERO</h3>

    <?php // Cargamos los datos para el drop down
    require("/home/grupo7/Sites/config/connection.php");
    $query_1 = "SELECT aerodromo_salida_id, fecha_salida
                FROM propuestas
                WHERE estado = 'aceptado'"; //ORIGEN

    $result1 = $db2 -> prepare($query_1);
    $result1 -> execute();

    $data_origen = $result1 -> fetchAll();
    ?>
    <!--
    <table>
        <tr>
            <th> ID </th>
            <th> Fecha salida </th>
        </tr>

        <?php
        /*
            foreach ($data_origen as $d) {
                echo "<tr>
                        <td>$d[0] </td>
                        <td>$d[1]</td>
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
    <?php
 
        // Se buscan los datos del usuario 
        // Revisar el WHERE statement
        $query = "SELECT * 
                  FROM pasajero
                  WHERE pasaporte_pasajero = '???';";

        $result = $db -> prepare($query);
        $result -> execute();

        $data = $result -> fetchAll();
    ?>

<h4>Busque su vuelo</h4>    

    <form action="pasajero.php" method="post">
        Ciudad origen: <input type="text" name="origen" />
        -  
        Ciudad destino: <input type="text" name="destino" />
        -
        Fecha despegue: <input type="text" name="fecha" />
        <br>
        <input type="submit" value="Buscar!"/>
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

<?php include("/home/grupo7/Sites/templates/footer.html"); ?>