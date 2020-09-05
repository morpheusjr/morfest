<?php

class DatabaseService
{
    private $host = "localhost";
    private $userName = "root";
    private $password = "usbw";
    private $dbName = "morfest";
    private $connection;

    public function connect()
    {
        if (isset($this->connection)) {
            return $this->connection;
        }

        $this->connection = new mysqli(
            $this->host,
            $this->userName,
            $this->password,
            $this->dbName
        );

        return $this->connection;
    }

    public function close()
    {
        $this->connection->close();
    }
}
