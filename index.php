<?php // Agregar el botón de importar usuarios ?>

<?php
    include("/home/grupo7/Sites/templates/header.html");
?>



<body>
    <h1> Entrega 3 - Grupos 7 y 122 </h1>
    <br>
    <?php session_start();
    if (isset($_SESSION['username'])){
        echo "Bienvenido/a: ";
        echo $_SESSION['username'];
        // echo $_SESSION['tipo'];
        $username = $_SESSION['username'];
    }
    
?>
    <?php
        if (!isset($_SESSION['username'])) {
    ?>
        <form align="center" action="logs/login.php" method="get">
            <input type="submit" value="Iniciar sesión">
        </form>
        <form align="center" action="importar_usuarios.php" method="post">
            <input type="submit" value="Importar usuarios">
        </form>

    <?php } else { ?>
        <form align="center" action="logs/logout.php" method="post">
            <input type="submit" value="Cerrar sesión">
        </form>
        <?php if ($_SESSION['tipo'] == 'Admin DGAC'){?>
            <form align="center" action="paginas/admin.php" method="get">
                <input type="submit" value="Pestaña administración">
            </form>
        <?php } elseif ($_SESSION['tipo'] == 'Compania') {?>
            <form align="center" action="paginas/propuestas.php" method="get">
                <!-- <input type="submit" value="Pestaña compañia"> -->
                <button name="username" type= "submit" value=$username>Pestaña compañia</button>
            </form>
        <?php } elseif ($_SESSION['tipo'] == 'Pasajero') { ?>
            <form align="center" action="paginas/pasajero.php" method="get">
                <input type="submit" value="Pestaña pasajero">
            </form>
    <?php } }?>
    <?php /*
    <form action="/action_page.php" method="get">
        Choose your favorite subject:
        <button name="subject" type="submit" value="fav_HTML">HTML</button>
        <button name="subject" type="submit" value="fav_CSS">CSS</button>
    </form>
    */ ?>
</body>

</html>