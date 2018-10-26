<?php
namespace Core;
use \Core\DBAccess;

abstract class Model
{
    protected $table;
  
    public function __construct()
    {
        $className = static::class;
        $classNames = explode('\\', $className);

        if (!isset($this->table)) {
            $this->table = strtolower($classNames[1]);
        }
    }
    
    static public function __callStatic($methodName, $arg)
    {
        $modelname = static::class;
        $model = new $modelname;
        $access = new DBAccess;
        if (method_exists($access, $methodName)) {
            $args = array_merge([$model->table], $arg);
            $result = call_user_func_array([$access, $methodName], $args);
            return $result;
        }
    }
}