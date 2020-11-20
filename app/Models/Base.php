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

    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname", "$this->user", "$this->password");
        } catch (PDOException $e) {
            $this->db = $e->getMessage();
        }
    }
}
