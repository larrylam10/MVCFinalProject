<?php

class Student {
    public $ID;
    public $firstName;
    public $surname;
    public $gender;
    public $class;
    public $emailAddress;
    public $mobilenumber;
    public $address;

    public function __construct($firstName, $surname, $gender, $class, $emailaddress, $mobilenumber, $address, $id=null) {
        $this->ID = $id; 
        $this->firstName = $firstName;
        $this->surname = $surname;
        $this->gender = $gender;
        $this->class = $class;
        $this->emailAddress = $emailaddress;
        $this->mobilenumber = $mobilenumber;
        $this->address = $address;
    }

}
?>