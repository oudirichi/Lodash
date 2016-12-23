<?php

namespace Lodash;

use Lodash\Methods\ArraysMethods;
use Lodash\Methods\ValidationMethods;
use Lodash\Methods\StringMethods;

class _
{
  public $data = [];
  public static $methods = [ArraysMethods::class, ValidationMethods::class, StringMethods::class];

  public function __construct($arr) {
    $this->data = $arr;
  }

  public function __call($name, $args)
  {
    $this->data = static::dispatch($name, $args, $this->data);
    return $this;
  }

  public static function __callStatic($name, $args)
  {
    return static::dispatch($name, $args, false);
  }

  public static function addMethods($class) {
    static::$methods[] = $class;
  }

  private function dispatch($name, $args, $array = false) {
    $params = array();

    if ($array !== false) {
      $params[] = $array;
      unset($args[0]);
    }

    $params = array_merge($params, $args);

    foreach (static::$methods as $value) {
      if (method_exists($value, $name)) {
        return call_user_func_array(array($value, $name), $params);
      }
    }

    return [];
  }

  public function getValues()
  {
    return $this->data;
  }
}
