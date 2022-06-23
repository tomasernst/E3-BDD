
<?php
// Primero imprimo la la consulta 

        require("conection.php");
        $ID = $_POST["ID"] ;

        $query = "SELECT * 
            FROM propuestas 
            WHERE propuesta_vuelo_id = '$ID';";
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
            <th> ID aerodromo salida </th>
            <th> ID aerodromo llegada </th>
            <th> Codigo aeronave </th>
            <th> Fecha envio propuesta </th>
        </tr>

        <?php
            foreach ($data as $d) {
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
                        <td>$d[11]</td>
                      </tr>";
            }
        ?>

    </table>

  
<form action="acep_rech.php" method="POST">
  <p>¿Aceptar Propuesta de Vuelo?</p>
  <p>
    <input type="submit" name="respuesta" value="Aceptar">
    <input type="submit" name="respuesta" value="Rechazar">
  </p>
</form> 