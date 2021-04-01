<?php

namespace fb\classes;

use fb\config\config;
use PDO;

class base extends config
{
    public $db;

    function __construct()
    {
        $this->db = new PDO("mysql:host=" . config::$host . ";dbname=" . config::$database, config::$user,
            config::$password);
    }

    public function select($cols, $table, $condition)
    {
        $sql = "SELECT " . $cols . " FROM " . $table . " WHERE " . $condition;
        return $this->db->query($sql)->fetchAll();
    }

    public function insert($table, $values)
    {
        $sql = "INSERT INTO " . $table . ' VALUES (' . $values . ")";
        $this->db->exec($sql);
    }

    public function update($table, $values, $condition)
    {
        $sql = "UPDATE " . $table . " SET (" . $values . ") WHERE " . $condition;
    }

    

}
