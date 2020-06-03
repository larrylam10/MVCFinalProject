<?php 
    Class StudentController extends DB {
        private $student;
        
        public function __construct($student=null) {
            parent::__construct();
            $this->student = $student;
        }

        public function registerStudent($student) {
            $data = [
                'firstName' => $student->firstName,
                'surname' => $student->surname,
                'gender' => $student->gender,
                'class' => $student->class,
                'emailAddress' => $student->emailAddress,
                'mobilenumber' => $student->mobilenumber,
                'address' => $student->address,
            ];
            
            $sql = "INSERT INTO student 
                    (firstName, surname, gender, class, emailAddress, mobilenumber, address)
                    VALUES 
                    (:firstName, :surname, :gender, :class, :emailAddress, :mobilenumber, :address)";
            $result = $this->insert($sql, $data);
            
            if ($result) {
                $result ="Student registered successfully";
            } else {
                $result ="Failed to register student";
            }

            return $result;
        }
        
        public function fetchStudents() {
            $sql = "SELECT * FROM student";
            $result = $this->select($sql);
            return $result;
        }

    }
?>