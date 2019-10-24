<?php

namespace app\models;

use mkweb\base\Model;

class AppModel extends Model
{
    public function setTableSql($tableSQL)
    {
        $this->tableSQL = $tableSQL;
    }

    public function getTableSql()
    {
        return $this->tableSQL;
    }


}
