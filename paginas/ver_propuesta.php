<?php include("/home/grupo7/Sites/templates/header.html"); ?>
<?php
// Primero imprimo la la consulta 

        require("/home/grupo7/Sites/config/connection.php");
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
                      </tr>";
            }
        ?>

    </table>
<h3> ¿Aceptar Propuesta de Vuelo? </h3>
  


<form action="acep_rech.php" method="GET">
        <input type="hidden" name="respuesta" value="Aceptar"/>
        <input type="hidden" name="id" value="<?= $ID ?>"/>
        <button name ="submit" value="1" type="submit">Aceptar</button>
</form>

<form action="acep_rech.php" method="GET">
        <input type="hidden" name="respuesta" value="Rechazar"/>
        <input type="hidden" name="id" value="<?= $ID ?>"/>
        <button name ="submit" value="1" type="submit">Rechazar</button>
</form>






<!-- 
    <form action="mypage.php" method="get">
        <input type="hidden" name="field" value="fieldname"/>
        <input type="hidden" name="orderby" value="<?= $orderby ?>"/>
        <button name ="submit" value="1" type="submit">&#9660;</button>
    </form>
--> 