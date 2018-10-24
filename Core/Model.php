<?php
namespace Core;
use \Core\Access;

abstract class Model
{
    public $table;
    public function __construct()
    {
        $className = static::class;
        $classNames = explode('\\', $className);
        $this->table = strtolower($classNames[1]);
    }
    
    static public function __callStatic($methodName, $arg)
    {
        $modelname = static::class;
        $model = new $modelname;
        $access = new Access;
        if (method_exists($access, $methodName)) {
            $args = array_merge([$model->table], $arg);
            var_dump($args);
            $result = call_user_func_array([$access, $methodName], $args);
            return $result;
        }
    }
}