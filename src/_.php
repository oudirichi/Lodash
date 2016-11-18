<?php

namespace Lodash;

class _
{
  use Lodash\Methods\ArraysMethods;

  static public function concat()
  {
    $out = array();
    if (count(func_get_args()) < 1) {
      return 0;
    } else if (count(func_get_args()) == 1) {
      return func_get_args()[0];
    }

    foreach (func_get_args() as $arr) {
      if (is_array($arr)) {
        $out = array_merge($out, $arr);
      }
    }
    return $out;
  }

  static public function exists($arr, $value)
  {
    static::includes($value, $arr);
  }

  static public function includes($arr, $value)
  {
    return array_keys($arr);
  }
}
