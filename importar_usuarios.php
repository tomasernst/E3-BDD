<?php
include("/home/grupo7/Sites/templates/header.html");

require("/home/grupo7/Sites/config/connection.php");

session_start();

function crear_usuario_dgac($db) {
    $query = "SELECT * FROM Usuarios WHERE username = 'DGAC' AND contrasena = 'admin'";
    $result = $db -> prepare($query);
    $result -> execute();
    $tabla = $result -> fetchAll();
    if (empty($tabla)) {
        $query1 = "INSERT INTO Usuarios VALUES (0, 'DGAC', 'admin', 'Admin DGAC'";
        $result1 = $db -> prepare($query1);
        $result1 -> execute();
    }
}

function crear_usuarios_compania($db) {
    $query = "SELECT * FROM Compania";
    $result = $db -> prepare($query);
    $result -> execute();
    $tabla = $result -> fetchAll();
    foreach ($tabla as $tupla) {
        $query1 = "SELECT * FROM Usuarios WHERE username = $tupla[1]";
        $result1 = $db -> prepare($query1);
        $result1 -> execute();
        $tabla1 = $result1 -> fetchAll();
        $id = 1;
        if (empty($tabla1)) {
            $password = str_shuffle($tupla[0]);
            $query2 = "INSERT INTO Usuarios VALUES ($id, $tupla[1], $password, 'Compania')";
            $result2 = $db -> prepare($query2);
            $result2 -> execute();
            $id += 1;
        }
    }
}

function crear_usuarios_pasajeros($db) {
    $query = "SELECT * FROM Pasajeros";
    $result = $db -> prepare($query);
    $result -> execute();
    $tabla = $result -> fetchAll();
    foreach ($tabla as $tupla) {
        $query1 = "SELECT * FROM Usuarios WHERE username = $tupla[0]";
        $result1 = $db -> prepare($query1);
        $result1 -> execute();
        $tabla1 = $result1 -> fetchAll();
        $id = 21;
        if (empty($tabla1)) {
            $password = $tupla[0] . substr($tupla[1], 0, 4);
            $query2 = "INSERT INTO Usuarios VALUES ($id, $tupla[0], $password, 'Pasajero')";
            $result2 = $db -> prepare($query2);
            $result2 -> execute();
            $id += 1;
        }
    }
}

crear_usuario_dgac($db);
crear_usuarios_compania($db);
crear_usuarios_pasajeros($db);

// $msg = "Usuarios importados correctamente";
header("Location: index.php?");

?>