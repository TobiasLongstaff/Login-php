<?php

    session_start();
    require 'database.php';

    if (isset($_SESSION['user_id']))
    {
        $records = $conn->prepare('SELECT id, usuario, password FROM usuarios WHERE id =:id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = null;

        if(count($results) > 0)
        {
            $user = $results;
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

    <title>Tu perfil</title>
</head>
<body>
    <main class="container container-perfil">
    <?php if(!empty($user)):?>
        <header>
            <div>
                <p>Bienvenido: <?= $user['usuario'] ?></p>                
            </div>
            <a href="index.php">
               <input type="button" value="Cerrar sesion">
            </a>
        </header> 
    <?php endif; ?>
    </main>
    <footer>
        <span>Creado por: Tobias Longstaff <br> Año: 7°1 <br>Materia: Redes informaticas</span>
    </footer>
</body>
</html>