<?php

class Person {
    public $name;
    public $speciality;
    public $age;
    public function __construct($name, $speciality, $age) {
        $this->name = $name;
        $this->speciality = $speciality;
        $this->age = $age;
    }
    public function greeting() {
        //echo "Hello there!";
        echo 'Hello! My name is ' . $this->name . ". I am " . $this->name . " and ". $this->age . " years old";
    }
}


$person1 = new Person('Alexander', "web-developer", "30");

$person1->greeting();

?>