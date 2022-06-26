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
    
    $query_1 = "SELECT DISTINCT a_salida
                FROM vuelo 
                WHERE estado = 'aceptado'"; //ORIGEN

    $result1 = $db -> prepare($query_1);
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
    $query_2 = "SELECT DISTINCT a_llegada, fecha_salida
                FROM vuelo 
                WHERE estado = 'aceptado'"; //Destino

    $result_2 = $db -> prepare($query_2);
    $result_2 -> execute();

    $data_destino = $result_2 -> fetchAll();   
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
    <h3></h3>
    <form id="origen-a" method="post">
        <select name="origen">
        <?php foreach ($data_origen as $d_o) {
            echo "<option value='$d_o[0]'> $d_o[0] </option>";
         }; ?>
    </form>

    <form id="destino-a" method="post">
        <select name="destino">
        <?php foreach ($data_destino as $d_d) {
            echo "<option value='$d_d[0]'> $d_d[0] </option>";
         }; ?>
    </form>

    <form id="fecha-inicio" method="post">
        <select name="fecha_inicio">
        <?php foreach ($data_destino as $d_o) {
            echo "<option value='$d_o[1]'> $d_o[1] </option>";
         }; ?>
    </form>


     <!-- <option value="$d_o"> <?php // $d_o ?> </option>-->

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
 
        
        $query_vuelos = "SELECT vuelo_id, fecha_salida, a_salida, fecha_llegada, a_llegada
                  FROM vuelo 
                  WHERE estado = 'aceptado' 
                  AND fecha_salida = '$fecha'
                  AND a_salida = $origen
                  AND a_llegada = $destino;";
        
        $result_vuelos = $db -> prepare($query_vuelos);
        $result_vuelos -> execute();

        $data_vuelos = $result_vuelos -> fetchAll();
    ?>
    <table>
        <tr>
            <th> Vuelo ID </th>
            <th> Fecha de salida </th>
            <th> Aeropuerto de salida </th>
            <th> Fecha de llegada </th>
            <th> Aeropuerto de llegada </th>
            <th> Reservar </th>
        </tr>

        <?php
            foreach ($data_vuelos as $d) {
               
                    echo "<tr>
                            <td>$d[0]</td>
                            <td>$d[1]</td>
                            <td>$d[2]</td>
                            <td>$d[3]</td>
                            <td>$d[4]</td>
                            <td> 
                            <form action='??.php' method='post'>
                                <input name='reserva' value='Reservar' type='submit' />
                            </form>
                            </td>
                         </tr>";
            }
        ?>

    </table>
 
<?php include("/home/grupo7/Sites/templates/footer.html"); ?>