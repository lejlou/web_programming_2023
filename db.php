<?php

$servername = "localhost";
$username = "root";
$password = ""; //iz nekog razloga na XAMPP Windows ovdje ne treba pw da bi se moglo povezati
//Rješenje problema SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) je brisanjanje passworda zbog prethodno navedenog razloga
$schema = "web_project";


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";

        $stmt = $conn -> prepare ("SELECT * FROM students");
        $stmt -> execute();
        $result = $stmt -> fetchAll (PDO::FETCH_ASSOC);
        print_r($result);

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }


?>
