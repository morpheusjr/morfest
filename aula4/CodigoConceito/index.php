<?php


require_once 'Person.php';
require_once 'Professor.php';


$person = new Person();
$person->setName("Barbosa");

$professor = new Professor(1000);
$professor->setName("Super professor");

print_r($professor);
