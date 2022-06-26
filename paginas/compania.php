<?php include("/home/grupo7/Sites/templates/header.html"); ?>
<h3>COMPAÑIA</h3>


<body>
<?php   
        session_start();
        require("/home/grupo7/Sites/config/connection.php");
        // $username = $_GET["username"] ;
        // cambiar a nombre_compania = usuario (de tipo compañía activo) LATAM era para probar
        $username = $_SESSION['username'];
        $query = "SELECT vuelo_id, fecha_salida, a_salida, fecha_llegada, a_llegada, estado
                  FROM Vuelo
                  WHERE nombre_compania = '$username';"; 
        $result = $db -> prepare($query);
        $result -> execute();

        $data = $result -> fetchAll();
    ?>

<!-- if vuelo aprobado -->
<h2> Vuelos aprobados </h2>

    <table>
        <tr>
            <th> Vuelo ID </th>
            <th> Fecha de salida </th>
            <th> Aeropuerto de salida </th>
            <th> Fecha de llegada </th>
            <th> Aeropuerto de llegada </th>
            <th> Estado </th>
        </tr>

        <?php
            foreach ($data as $d) {
                if ($d[5] == "aceptado"){
                    echo "<tr>
                            <td>$d[0]</td>
                            <td>$d[1]</td>
                            <td>$d[2]</td>
                            <td>$d[3]</td>
                            <td>$d[4]</td>
                            <td>$d[5]</td>
                         </tr>";}
            }
        ?>

    </table>
    <!--  -->

    <!-- elif vuelo rechazado -->
    <h2> Vuelos Rechazados </h2>

    <table>
        <tr>
            <th> Vuelo ID </th>
            <th> Fecha de salida </th>
            <th> Aeropuerto de salida </th>
            <th> Fecha de llegada </th>
            <th> Aeropuerto de llegada </th>
            <th> Estado </th>
        </tr>

        <?php
            foreach ($data as $d) {
                if ($d[5] == "pendiente"){
                    echo "<tr>
                            <td>$d[0]</td>
                            <td>$d[1]</td>
                            <td>$d[2]</td>
                            <td>$d[3]</td>
                            <td>$d[4]</td>
                            <td>$d[5]</td>
                         </tr>";}
            }
        ?>

    </table>
    

    <?php include("/home/grupo7/Sites/templates/footer.html"); ?>

<?php // ?>
</html>