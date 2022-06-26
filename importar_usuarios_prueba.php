<?php 
require("/home/grupo7/Sites/config/connection.php");
      
// Usuario Compañía
$query1 = "SELECT codigo_compania, nombre_compania
          FROM Compania;"; 
$result1 = $db -> prepare($query1);
$result1 -> execute();

$data = $result1 -> fetchAll();

$query3 = "INSERT INTO Usuarios (id, "
?>

<table>
        <tr>
            <th> codigo_compania </th>
            <th> nombre_compania </th>
        </tr>

        <?php
            foreach ($data as $d) {
                
            echo "<tr>
                            <td>$d[0]</td>
                            <td>$d[1]</td>  
                  </tr>";
            
        }
        ?>

    </table>

<table>
        <tr>
            <th> Username </th>
            <th> passw </th>
        </tr>

        <?php
            
                
            echo "<tr>
                            <td>DGAC</td>
                            <td>admin</td>  
                  </tr>";
            
        
        ?>

</table>

<?php 
require("/home/grupo7/Sites/config/connection.php");
      
// Usuario Pasajero
$query2 = "SELECT pasaporte_pasajero, nombre_pasajero
          FROM Pasajero;"; 
$result2 = $db -> prepare($query2);
$result2 -> execute();

$data2 = $result2 -> fetchAll();
?>

<table>
        <tr>
            <th> Username </th>
            <th> passw </th>
        </tr>

        <?php
            foreach ($data2 as $d) {
                
            echo "<tr>
                            <td>$d[0]</td>
                            <td>$d[1]</td>  
                  </tr>";
            
        }
        ?>

    </table>