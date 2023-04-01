<?php

$servername = "localhost";
$username = "root";
$password = "rootpw";
$schema = "web_project";


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


?>
