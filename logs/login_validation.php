<?php // En esta parte vamos a tener que cambiar hartas cosas probablemente. ?>

<?php
	ob_start();
	// session_start();
?>

<?php
    $msg = '';
    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password']))
    {   
        require("/home/grupo7/Sites/config/connection.php");
        
        // Prepare a select statement
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM Usuarios WHERE username = '$username'
        AND contrasena = '$password'";
        $r = $db -> prepare($sql);
    
        $r -> execute();
        $posible = $r -> fetchAll(); ?>

        <table>
        <tr>
            <th> id </th>
            <th> user </th>
            <th> pass </th>
            <th> tipo </th>
        </tr>

        <?php
            foreach ($posible as $d) {
                
            echo "<tr>
                            <td>$d[0]</td>
                            <td>$d[1]</td>
                            <td>$d[2]</td>
                            <td>$d[3]</td>  
                  </tr>";
            $_SESSION["id"] = $d[0];
            $_SESSION["username"] = $d[1];              
            $_SESSION["password"] = $d[2];
            echo $_SESSION["tipo"] = $d[3];
            
        }

        
        ?>
        </table>

        <?php
        if(empty($posible)){
        $login_err = "Rut inválido o contraseña";
        header("Location: ../logs/login_validation.php");
        } else{
        session_start();
        $_SESSION["loggedin"] = true;
            $_SESSION['timeout'] = time();
        foreach ($posible as $d) {
            $_SESSION["id"] = $d[0];
            $_SESSION["username"] = $d[1];              
            $_SESSION["password"] = $d[2];
            $_SESSION["tipo"] = $d[3];
        }
        $msg = "Sesión iniciada correctamente";
        header("Location: ../index.php?msg=$msg");
            }
    

    }
?>