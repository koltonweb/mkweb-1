<?php

namespace mkweb;

use PDO;
use PDOException;

class DB
{
    use TSingletone;

    private $pdo;
    public static $countSQL = 0;
    public static $queriesSQL = [];

    private function __construct()
    {
        try {
            $dbconnect = require_once CONF . '/config_db.php';
            $this->pdo = new PDO($dbconnect['dsn'], $dbconnect['username'], $dbconnect['password'], $dbconnect['except']);
            $this->pdo->exec('SET NAMES "utf8"');
        } catch (PDOException $e) {
            throw new \Exception("Нет подключения к базе данных {$e->getMessage()}", 500);

        }
    }

    public function execute($sql, $params = [])
    {
        
        self::$countSQL++;
        self::$queriesSQL[] = $sql;
        $stm = $this->pdo->prepare($sql);
        return $stm->execute($params);
    }

    public function query($sql, $params = [])
    {
        self::$countSQL++;
        self::$queriesSQL[] = $sql;
        $stm = $this->pdo->prepare($sql);
        $res = $stm->execute($params);
        if ($res !== false) {
            return $stm->fetchAll();
        }

        return [];
    }

}
