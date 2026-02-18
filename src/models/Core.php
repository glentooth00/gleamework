<?php
namespace gleamework\Models;

use gleamework\Config\Database;

use PDO;


class Core
{
    public $sql;

    public $db;

    public $table;

    public function __construct()
    {

        $this->db = Database::connect();

    }

    public function store(array $data, $table)
    {

        $columns = array_keys($data);

        $placeholders = array_map(fn($col) => ':' . $col, $columns);

        $i = implode(', ', $columns);

        $e = implode(', ', $placeholders);

        $sql = "INSERT INTO {$table} ({$i}) VALUES  ({$e})";

        $stmt = $this->db->prepare($sql);

        $stmt = $this->db->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }

        if (!$stmt->execute()) {
            print_r($stmt->errorInfo());
            exit;
        }

        return true; // success

    }

    public function test()
    {

        echo 'core test method here';

    }
}