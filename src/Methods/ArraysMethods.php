<?php

/**
 * https://github.com/Anahkiasen/underscore-php/blob/master/src/Methods/ArraysMethods.php
 */

namespace Lodash\Methods;
use Closure;

trait ArraysMethods
{
  public static function repeat($data, $times)
  {
    $times = abs($times);
    if ($times === 0) {
      return [];
    }

    return array_fill(0, $times, $data);
  }

  public static function removeFirst($array)
  {
    return array_slice($array, 1);
  }

  public static function removeLast($array)
  {
    return array_slice($array, 0, -1);
  }

  public static function each($array, Closure $closure)
  {
    foreach ($array as $key => $value) {
      $array[$key] = $closure($value, $key);
    }
    return $array;
  }

  public static function keys($array)
  {
    return array_keys($array);
  }

  public static function values($array)
  {
    return array_values($array);
  }

  public static function map($array, Closure $closure, $opt = [])
  {
    return array_map($closure, $array, static::keys($array, $opt));
  }

}
