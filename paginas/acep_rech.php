<?php include("/home/grupo7/Sites/templates/header.html"); ?>
<?php
    // Inspiado de https://stackoverflow.com/questions/12166494/execute-sql-query-on-button-click
    
    require("/home/grupo7/Sites/config/connection.php");
    // require("ver_propuesta.php"); // para obtener la variable ID --> No funciona;
    // $ID = $_POST["ID"]; // Tenemos que mandar el ID desde ver propuesta.
    // echo "$ID";
    $ID = $_GET['id'];

    if(isset($_GET['respuesta'])){
        $respuesta = $_GET["respuesta"];
        

        if($respuesta == 'Aceptar'){
            $query = "UPDATE vuelo SET estado='aceptado' WHERE vuelo_id = $ID;";
            $query2 = "UPDATE propuestas SET estado='aceptado' WHERE propuesta_vuelo_id = $ID;";
            echo "Cambio Realizado";
        } else {
            $query = "UPDATE vuelo SET estado='rechazado' WHERE vuelo_id = $ID;";
            $query2 = "UPDATE propuestas SET estado='rechazado' WHERE propuesta_vuelo_id = $ID;";
            echo "Cambio Realizado";
        }
        $result = $db -> prepare($query);
        $result2 = $db2 -> prepare($query2);

        $result -> execute();
        $result2 -> execute();

        
        
    }
    else {
    echo"No se pudo ejecutar cambio";
    }
?>
<form action="admin.php" method="get">
    <input type="submit" value="Volver">
</form>