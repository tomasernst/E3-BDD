<?php

        session_start();
        require("/home/grupo7/Sites/config/connection.php");
    
        $estado = 'pendiente';
        // obtengo los datos del formulario 
        $propuesta_vuelo_id = $_POST["propuesta_vuelo_id"] ;
        $codigo = $_POST["codigo"] ;
        $fecha_salida = $_POST["fecha_salida"] ;
        $hora_salida = $_POST["hora_salida"] ;
        $fecha_llegada = $_POST["fecha_llegada"] ;
        $hora_llegada = $_POST["hora_llegada"] ;
        $aerodromo_salida_id = $_POST["aerodromo_salida_id"] ;
        $aerodromo_llegada_id = $_POST["aerodromo_llegada_id"] ;
        $codigo_aeronave = $_POST["codigo_aeronave"] ;
        $fecha_envio_propuesta = $_POST["fecha_envio_propuesta"];
        $codigo_compania = $_POST["codigo_compania"];

        $query = "INSERT INTO propuestas (propuesta_vuelo_id, estado, codigo,  fecha_salida, hora_salida, fecha_llegada, hora_llegada, aerodromo_salida_id, aerodromo_llegada_id, codigo_aeronave, fecha_envio_propuesta)
        VALUES ($propuesta_vuelo_id, $estado, $codigo, $fecha_salida, $hora_salida, $fecha_llegada, $hora_llegada, $aerodromo_salida_id, $aerodromo_llegada_id, $codigo_aeronave, $fecha_envio_propuesta);";
        $result = $db2 -> prepare($query);
        $result -> execute();

        $query2 = "INSERT INTO propuesta_compania (propuesta_vuelo_id, codigo_compania)
        VALUES ($propuesta_vuelo_id, $codigo_compania);";
        $result2 = $db2 -> prepare($query2);
        $result2 -> execute();

    ?>