<?php

// database class
class DB
{
    private $database;
    private $hostname = "devkinsta_db";
    private $databasename = "SimpleCMS";
    private $username = "root";
    private $password = "JlM9YL7mge6ghuLi";

    function __construct() {
        // things that you want to trigger when the class first build
        $this->database = new PDO(
            "mysql:host=$this->hostname;dbname=$this->databasename",
            $this->username,
            $this->password
        );
    }

    function fetch( $sql, $data = [] )
    {
        $query = $this->database->prepare($sql);
        $query->execute($data);
        return $query->fetch();
    }

    function fetchAll( $sql, $data = [] )
    {
        $query = $this->database->prepare($sql);
        $query->execute($data);
        return $query->fetchAll();
    }

    function insert( $sql, $data = [] ) 
    {
        $query = $this->database->prepare($sql);
        $query->execute($data);
    }

    function update( $sql, $data = [] ) 
    {
        $query = $this->database->prepare($sql);
        $query->execute($data);
    }

    function delete( $sql, $data = [] ) 
    {
        $query = $this->database->prepare($sql);
        $query->execute($data);
    }
}