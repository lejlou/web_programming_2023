<?php

class StudentsDao {

    private $conn;

    public function __construct(){

        /*
             Class constructor used to establish connection to databases
        */

        try {

            $servername = "localhost";
            $username = "root";
            $password = ""; 
            $schema = "web_project";

            $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";

        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // Method used to get all students from database

    public function get_all(){

        $stmt = $this->conn -> prepare ("SELECT * FROM students");
        $stmt -> execute();
        return $stmt -> fetchAll (PDO::FETCH_ASSOC);

    }

    // Method used to add students to database

    public function add($first_name, $last_name){

        $stmt = $this->conn -> prepare ("INSERT INTO students (first_name, last_name) VALUES ('$first_name','$last_name')");
        $result = $stmt -> execute();
        return $stmt -> fetchAll (PDO::FETCH_ASSOC);

    }


}

?>