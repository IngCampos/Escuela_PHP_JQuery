<?php

namespace App\Models;

use PDO;
use PDOException;

class Base
{
    protected $db;
    protected $table = "";
    protected $columnId = "id"; // by default

    public function __construct()
    {
        try {
            $this->db = new PDO(
                "{$_ENV['DB_DRIVER']}:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_DATABASE']}",
                "{$_ENV['DB_USERNAME']}",
                "{$_ENV['DB_PASSWORD']}"
            );
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
        /**
         * For a SQL query to insert data columns and values are string separated
         * the next two lines below adapt the array in a proper format
         * implode() convert an array in string
         */
        $columns = implode(", ", array_keys($data));
        $values = implode(", ", array_values($data));

        $query = "INSERT INTO $this->table ($columns) VALUES ($values)";
        try {
            $this->get($query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function update($updates, $conditionals)
    {
        /**
         * For a SQL query to update the values and conditionals looks like 'column = value'
         * the next two lines below adapt the arrays in a proper format
         * implode() convert an array in string
         */
        $updatesText = implode(", ", $updates);
        $conditionalsText = implode(" and ", $conditionals);

        $query = "UPDATE $this->table SET $updatesText WHERE $conditionalsText";
        return $this->get($query);
    }

    public function getAll()
    {
        $query = "SELECT * FROM $this->table";
        return $this->get($query);
    }

    public function getWhere($conditionals)
    {
        $conditionalsText = implode(" and ", $conditionals);
        $query = "SELECT * FROM $this->table WHERE $conditionalsText";
        return $this->get($query);
    }

    protected function get($query)
    {
        // TODO: use the prepare statements to improve the security
        $statement = $this->db->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll();
        return $data;
    }
}
