<?php

namespace mkweb\base;

use mkweb\DB;

class Model
{
    protected $pdo;
    protected $tableSQL = 'mklogadmin';
    protected $primkey = 'id';

    public function __construct()
    {
        $this->pdo = DB::instance();
    }

    public function query($sql, $params = [])
    {
        return $this->pdo->execute($sql, $params);
    }

    public function findAll()
    {
        $sql = "SELECT * FROM {$this->tableSQL}";
        return $this->pdo->query($sql);
    }

    public function findOne($id, $field = '')
    {
        $field = $field ?: $this->primkey;
        $sql = "SELECT * FROM {$this->tableSQL} WHERE $field = ? LIMIT 1";
        return $this->pdo->query($sql, [$id]);
    }

    public function findBySql($sql, $params = [])
    {
        return $this->pdo->query($sql, $params);
    }

    public function findLike($str, $field, $tableSQL = '')
    {
        $tableSQL = $tableSQL ?: $this->tableSQL;
        $sql = "SELECT * FROM $tableSQL WHERE $field LIKE ?";
        return $this->pdo->query($sql["%$str%"]);
    }

}
