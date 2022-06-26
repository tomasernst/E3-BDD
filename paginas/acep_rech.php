<?php include("/home/grupo7/Sites/templates/header.html"); ?>
<?php
    // Inspiado de https://stackoverflow.com/questions/12166494/execute-sql-query-on-button-click
    
    require("/home/grupo7/Sites/config/connection.php");
    // require("ver_propuesta.php"); // para obtener la variable ID --> No funciona;
    $ID = $_POST["ID"]; // Tenemos que mandar el ID desde ver propuesta.
    echo "$ID";

    if(isset($_POST['boton'])){
        $respuesta = $_POST["respuesta"];

        if($respuesta == 'Aceptar'){
            $query = "UPDATE vuelo SET estado='aceptado' WHERE propuesta_vuelo_id = '$ID';";
            $query2 = "UPDATE propuestas SET estado='aceptado' WHERE propuesta_vuelo_id = '$ID';";
        } else {
            $query = "UPDATE vuelo SET estado='rechazado' WHERE propuesta_vuelo_id = '$ID';";
            $query2 = "UPDATE propuestas SET estado='rechazado' WHERE propuesta_vuelo_id = '$ID';";
        }
        $db -> prepare($query);
        $db2 -> prepare($query2);

        echo "Cambio Realizado";
        header("paginas/admin.php");
    }
    else {
    echo"No se pudo ejecutar cambio";
    }
?>