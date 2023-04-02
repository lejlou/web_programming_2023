<?php


require_once("rest/dao/StudentsDao.class.php");
$student_dao = new StudentsDao(); 

$type = $_REQUEST ['type'];

switch ($type) {
    case 'add':
        $first_name = $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];

        $results = $student_dao->add($first_name, $last_name);
        print_r($results);

    break;

    case 'delete':
         # code...
        break;

    case 'update':
         # code...
         break;

    case 'get':
    default:
         $results = $student_dao->get_all();
         print_r($results);

     break;
}




?>
