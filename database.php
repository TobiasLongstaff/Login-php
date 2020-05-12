<?php

    $conexion = mysqli_connect("localhost:3307", "root", "", "php_login");

    $server = 'localhost:3307';
    $nombre = 'root';
    $password = '';
    $database = 'php_login';

    try
    {
        $conn = new PDO("mysql:host=$server;dbname=$database;",$nombre, $password);
    } catch (PDOException $e)
    {
        die('Connected failed: '. $e->getMessage());
    }

?>