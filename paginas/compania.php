<!DOCTYPE html>
<html>
<?php include('templates/header.html'); ?>

<body>
<?php
        require("../config/conection.php");
      
        // $query = "SELECT *
        $query = "SELECT vuelo_id, fecha_salida, a_salida, fecha_llegada, a_llegada, estado
                  FROM Vuelo
                  WHERE nombre_compania = '...';"; 
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
                if (d[5] == 'aprobado'){
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
                if (d[5] == 'rechazado'){
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
    

    <?php include('templates/footer.html'); ?>
</html>