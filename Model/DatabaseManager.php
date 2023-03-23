<?php

class databaseManager {
    private string $host;
    private string $user;
    private string $password;
    private string $dbname;
    public PDO $connection;

    public function __construct($host, $user, $password, $dbname)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect(): void
    {
        try {
            $this->connection = new PDO ("mysql:host=$this->host;dbname=$this->dbname",$this->user, $this->password);
            echo 'connection succesfull!';
        }
        catch (PDOException $e){
            echo 'connection failed: '.$e->getMessage();
        }
    }
}