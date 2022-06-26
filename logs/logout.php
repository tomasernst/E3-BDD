<?php 
    
    session_start();
    unset($_SESSION['timeout']);
    unset($_SESSION['password']);
    unset($_SESSION['username']);
    unset($_SESSION['tipo']);
    unset($_SESSION['id']);
    $_SESSION['valid'] = false;
    // Unset all of the session variables
    $_SESSION = array();
 
    // Destroy the session.
    session_destroy();

    header('Refresh: 0; url = ../index.php')
?>