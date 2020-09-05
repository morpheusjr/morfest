<?php

class Professor extends Person
{
    private $salary;

    public function __construct($salary)
    {
        $this->salary = $salary;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function trocaNome($nome)
    {
        $this->name = $nome;
    }
}
