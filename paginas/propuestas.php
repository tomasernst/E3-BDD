<?php include("/home/grupo7/Sites/templates/header.html"); ?>
<h3>COMPAÑIA</h3>


<body>
<?php   
        session_start();
        require("/home/grupo7/Sites/config/connection.php");
        // $username = $_GET["username"] ;
        // cambiar a nombre_compania = usuario (de tipo compañía activo) LATAM era para probar
        $username = $_SESSION['username'];
        $query = "SELECT * FROM propuestas WHERE propuesta_vuelo_id IN (
            SELECT propuesta_vuelo_id FROM propuesta_compania WHERE codigo_compania = (
                SELECT codigo_compania FROM compania WHERE nombre_compania = '$username'
            )
        );";
        $result = $db2 -> prepare($query);
        $result -> execute();

        $data = $result -> fetchAll();
    ?>

<!-- if vuelo aprobado -->
<h2> Propuestas aprobadas </h2>

    <table>
        <tr>
            <th> ID </th>
            <th> Estado </th>
            <th> Codigo </th>
            <th> Fecha salida </th>
            <th> Hora salida </th>
            <th> Fecha llegada </th>
            <th> Hora llegada </th>
            <th> ID aerodromo salida </th>
            <th> ID aerodromo llegada </th>
            <th> Codigo aeronave </th>
            <th> Fecha envio propuesta </th>
        </tr>

        <?php
            foreach ($data as $d) {
                if ($d[1] == "aceptado"){
                    echo "<tr>
                    <td>$d[0]</td>
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
                         </tr>";}
            }
        ?>

    </table>
    <!--  -->

    <!-- elif vuelo rechazado -->
    <h2> Propuestas Rechazadas </h2>

    <table>
        <tr>
            <th> ID </th>
            <th> Estado </th>
            <th> Codigo </th>
            <th> Fecha salida </th>
            <th> Hora salida </th>
            <th> Fecha llegada </th>
            <th> Hora llegada </th>
            <th> ID aerodromo salida </th>
            <th> ID aerodromo llegada </th>
            <th> Codigo aeronave </th>
            <th> Fecha envio propuesta </th>
        </tr>

        <?php
            foreach ($data as $d) {
                if ($d[1] == "rechazado"){
                    echo "<tr>
                    <td>$d[0]</td>
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
                         </tr>";}
            }
        ?>

    </table>
    

    <?php include("/home/grupo7/Sites/templates/footer.html"); ?>

<?php // ?>
</html>

<h3>Crear Propuesta</h3>

<form action="crear_propuesta.php" method="post">
    ID propuesta: <input type="text" name="propuesta_vuelo_id"><br>
    codigo: <input type="text" name="codigo"><br>
    fecha salida: <input type="text" name="fecha_salida"><br>
    hora salida: <input type="text" name="hora_salida"><br>
    fecha llegada: <input type="text" name="fecha_llegada"><br>
    hora llegada: <input type="text" name="hora_llegada"><br>
    aerodromo salida_id: <input type="text" name="aerodromo_salida_id"><br>
    aerodromo llegada id: <input type="text" name="aerodromo_llegada_id"><br>
    codigo aeronave: <input type="text" name="codigo_aeronave"><br>
    fecha envio propuesta: <input type="text" name="fecha_envio_propuesta"><br>
    codigo compania: <input type="text" name="codigo_compania"><br>
    <input type="submit" value="Enviar">
</form>