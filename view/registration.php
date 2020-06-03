<?php
require "model/student.php";

class Registration {
    private $student;
    private $studentController;

    public function __construct($controller, $model=null) {
        $this->student = $model;
        $this->studentController = $controller;
    }

    public function loadRegistrationForm() {
        echo "
            <h1>Enter registration details</h1><br/>&nbsp;
            <form method='post' action='#'>
                <input type='text' name='firstName' placeholder='First Name' required='required'/><br/>&nbsp;<br/>
                <input type='text' name='surname' placeholder='Surname' required='required'/><br/>&nbsp;<br/>
                <input type='text' name='class' placeholder='Class'/><br/>&nbsp;<br/>
                <select name='gender' required='required'><br/>&nbsp;<br/>
                    <option value='Male' selected='selected'>Male</option>
                    <option value='Female'>Female</option>
                </select>
                <input type='email' name='email' placeholder='Email'/><br/>&nbsp;<br/>
                <input type='text' name='mobilenumber' placeholder='Mobile' required='required'/><br/>&nbsp;<br/>
                <input type='text' name='address' placeholder='Address'/><br/>&nbsp;<br/>
                <input type='submit' name='submit-registration' value='Save Data'/>
            </form>
        ";

        if (isset($_REQUEST['submit-registration'])) {
            $firstName = $_POST['firstName'];
            $surname = $_POST['surname'];
            $gender = $_POST['gender'];
            $class = $_POST['class'];
            $emailAddress = $_POST['email'];
            $mobilenumber = $_POST['mobilenumber'];
            $address = $_POST['address'];

            // echo $firstName." ".$surname." ".$gender." ".$emailAddress." ".$mobilenumber." ".$address;
            $student = new Student($firstName, $surname, $gender, $class, $emailAddress, $mobilenumber, $address);
            $result = $this->studentController->registerStudent($student);
            echo "<p>$result</p>";
        }
    }
}
?>