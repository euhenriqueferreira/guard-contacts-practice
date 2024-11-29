<?php


namespace Core;

use PDO;

class Database
{
    public $db;

    public function __construct($config)
    {
        return $this->db = new PDO($config);
    }

    public function query($query, $class = null, $params = null)
    {
        $prepare = $this->db->prepare($query);

        if ($class) {
            $prepare->setFetchMode(PDO::FETCH_CLASS, $class);
        }

        $prepare->execute($params);

        return $prepare;
    }
}
