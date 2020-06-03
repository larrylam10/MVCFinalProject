<?php

class StudentList {
    private $controller;

    public function __construct() {
        $controller = new StudentController();
    }

    public function studentsList() {
        $controller = new StudentController();
        $result = $controller->fetchStudents();
        
        echo "<table class='table table-striped'>";
        echo "<thead>
                <tr><th>Name</th><th>Gender</th><th>Class</th><th>Mobile</th><th>Email</th><th>Address</th></tr>
            </thead><tbody>";
        for($i=0; $i < count($result); $i++) {
            echo "<tr>
                <td>".$result[$i]['surname'] ." ". $result[$i]['firstName'] ."</td>
                <td>". $result[$i]['gender'] ."</td>
                <td>". $result[$i]['class'] ."</td>
                <td>". $result[$i]['mobilenumber'] ."</td>
                <td>". $result[$i]['emailAddress'] ."</td>
                <td>". $result[$i]['address'] ."</td>
            </tr>";
        }

        echo "</tbody></table>";
    }
}
?>