<?php
    require 'database.php';

    $message = '';

    if(!empty($_POST['usuario']) && !empty($_POST['password']))
    {
        $sql = "INSERT INTO usuarios (usuario, password) VALUES (:usuario, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':usuario',$_POST['usuario']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute())
        {
            $message = 'Guardado';
        }
        else
        {
            $message = 'Error';
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
    <title>Registrase</title>
</head>
<body>
    <main class="container">
        <form method="POST">
            <header>
                <h2>Registrase</h2>
            </header>
            <div>
                <input type="text" name="usuario" placeholder="Nombre de usuario">                
            </div>
            <div>
                <input type="password" name="password" placeholder="Contraseña">                
            </div>
            <div>
                <input type="password" name="" placeholder="Confirmar contraseña">                
            </div>
            <?php if(!empty($message)):?>
            <span><?php echo $message;?></span>
            <?php endif; ?>
            <div class="botones">
                <input type="submit" value="Crear">
                <a href="index.php">
                    <input type="button" value="Volver">                      
                </a>  
            </div>
        </form>
    </main>
    <footer>
        <span>Creado por: Tobias Longstaff <br> Año: 7°1 <br>Materia: Redes informaticas</span>
    </footer>
</body>
</html>