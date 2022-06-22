<? // Agregar el botón de importar usuarios ?>


<?php session_start();
    if (isset($_SESSION['username'])){
        echo "Bienvenido/a: ";
        echo $_SESSION['username'];
    }
    // USERNAME (?)
?>

<?php
    include("templates/header.html");
?>

<body>
    <h1> Entrega 3 - Grupos 7 y 122 </h1>
    <br>
    <?php
        if (!isset($_SESSION['username'])) {
    ?>
        <form align="center" action="logs/login.php" method="get">
            <input type="submit" value="Iniciar sesión">
        </form>
        <form align="center" action=".php" method="post">
            <input type="submit" value="Importar usuarios">
        </form>

    <?php } else { ?>
        <form align="center" action="logs/logout.php" method="post">
            <input type="submit" value="Cerrar sesión">
        </form>
        
        // POR AGREGAR (?)

    <?php } ?>
    
</body>

</html>