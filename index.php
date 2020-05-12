<?php

    session_start();

    require 'database.php';

    if(!empty($_POST['usuario']) && !empty($_POST['password']))
    {
        $records = $conn->prepare('SELECT id, usuario, password FROM usuarios WHERE usuario=:usuario');
        $records->bindParam(':usuario', $_POST['usuario']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        if (!empty($results) > 0 && password_verify($_POST['password'], $results['password']))
        {
            $_SESSION['user_id'] = $results['id'];
            header('Location: /Login-php/cuenta.php');
        }
        else
        {        
            $_SESSION['message'] = 'Los datos ingresados no coinciden';
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <title>Login</title>
</head>
<body>
    <main class="container">
        <form action="index.php" method="POST">        
            <header>
                <h2>Login</h2>
            </header>
            <div>
                <input type="text" name="usuario" placeholder="Usuario">                
            </div>
            <div>
                <input type="password" name="password" placeholder="Contraseña">                
            </div>
            <div class="botones">
                <input type="submit" value="Iniciar secion">
                <a href="registrar.php">
                    <input type="button" value="Registrarse">                           
                </a>
            </div>
        </form>
    </main>        
    <footer>
        <span>Creado por: Tobias Longstaff <br> Año: 7°1 <br>Materia: Redes informaticas</span>
    </footer>
</body>
</html>