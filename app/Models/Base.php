<?php

namespace App\Models;

use PDO;
use PDOException;

class Base
{
    protected $db;
    private $host = "localhost";
    private $dbname = "attendance_school";
    private $user = "root";
    private $password = "";

    protected $table = "";
    protected $columnId = "id"; // by default

    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname", "$this->user", "$this->password");
        } catch (PDOException $e) {
            $this->db = $e->getMessage();
        }
    }

    //  TODO: build a better Class to work like professional ORM and do not user SQL in child class

    public function findId($id)
    {
        $query = "SELECT * FROM $this->table WHERE $this->columnId = $id";
        return (object) $this->get($query)[0];
    }

    public function save($data)
    {
        $query = "INSERT INTO $this->table ($data->keys) VALUES ($data->values)";
        return $this->get($query);
    }

    public function update($data, $id)
    {
        $query = "UPDATE $this->table SET $data WHERE $this->columnId = $id";
        return $this->get($query);
    }

    public function getAll()
    {
        $query = "SELECT * FROM $this->table";
        return $this->get($query);
    }

    protected function get($query)
    {
        $statement = $this->db->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll();
        return $data;
    }
}
