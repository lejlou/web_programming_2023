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

        $stmt = $this->conn -> prepare ("INSERT INTO students (first_name, last_name) VALUES ('?','?')");
        $result = $stmt -> execute([$first_name, $last_name]);
        //return $stmt -> fetchAll (PDO::FETCH_ASSOC);

    }


    // Method used to update students from database

    public function update($first_name, $last_name, $id){

        $stmt = $this->conn -> prepare ("UPDATE students SET first_name = ':first_name', last_name = ':last_name' WHERE id = :id");
        $stmt -> execute(['first_name'=> $first_name, 'last_name'=> $last_name, 'id' => $id]);
        
     }


     // Method used to delete students from database

    public function delete($id){

        $stmt = $this->conn -> prepare("DELETE FROM students WHERE id = :id");
        $stmt -> bindParam(':id', $id);
        $stmt -> execute();
        
     }


}

?>