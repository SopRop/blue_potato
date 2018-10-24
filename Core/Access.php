<?php

namespace Core;

use \RedBeanPHP\R;

class Access extends Database
{
    public function getAll($table)
    {
        $sql = R::find($table);
        $sqlMap = R::exportAll($sql);
        return $sqlMap;
    }

    public function getByProperty($table, $column, $value)
    {
        $sql = R::findAll($table, $column . ' LIKE ? ', [ $value ]);
        $sqlMap = R::exportAll($sql);
        return $sqlMap;
    }

    public function getByID($table, $id)
    {
        $sql = R::load($table, $id);
        $sqlMap = R::exportAll($sql);
        return $sqlMap;
    }

    public function numberOf($table)
    {
        $sql = R::count($table);
        return $sql;
    }
}

