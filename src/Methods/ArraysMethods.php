<?php

/**
 * https://github.com/Anahkiasen/underscore-php/blob/master/src/Methods/ArraysMethods.php
 */

namespace Lodash\Methods;
use Closure;

class ArraysMethods
{
  public static function find($array, Closure $closure)
  {
    foreach ($array as $key => $value) {
      if ($closure($value, $key)) {
        return $value;
      }
    }
    return;
  }

  /**
   * Clean all falsy values from an array.
   */
  public static function clean($array)
  {
    return static::filter($array, function ($value) {
      return (bool) $value;
    });
  }

  /**
   * Find all items in an array that pass the truth test.
   */
  public static function filter($array, $closure = null)
  {
    if (!$closure) {
      return static::clean($array);
    }
    return array_filter($array, $closure);
  }

  public static function contains($array, $value)
  {
    return in_array($value, $array, true);
  }

  /**
    * Return all items that fail the truth test.
    */
   public static function reject($array, Closure $closure)
   {
     $filtered = [];
     foreach ($array as $key => $value) {
       if (!$closure($value, $key)) {
         $filtered[$key] = $value;
       }
     }
     return $filtered;
   }

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

  public static function each($array, Closure $closure, $opts = array())
  {
    foreach ($array as $key => $value) {
      $closure($value, $key, $opts);
    }
    return $array;
  }

  public static function map($array, Closure $closure, $opts = array())
  {
    // $args = func_get_args();
    // call_user_func_array('mysql_safe_query', $args);
    $d = array();
    foreach ($array as $key => $value) {
      $d[] = $closure($value, $key, $opts);
    }
    return $d;
  }

  public static function keys($array)
  {
    return array_keys($array);
  }

  public static function values($array)
  {
    return array_values($array);
  }

  public static function concat()
  {
    $out = array();
    $args = func_get_args();

    if (count($args) < 1) return [];

    foreach ($args as $arg) {
      if (is_array($arg)) {
        $out = array_merge($out, $arg);
      } else {
        $out[] = $arg;
      }
    }
    return $out;
  }

  public static function prepend($array, $value)
  {
    array_unshift($array, $value);
    return $array;
  }

  public static function append($array, $value)
  {
    array_push($array, $value);
    return $array;
  }

  public static function unique($array, $uniqByType = false)
  {
    if ($uniqByType) {
      return array_unique($array);
    }

    return array_reduce($array, function ($resultArray, $value) {
      if (!static::contains($resultArray, $value)) {
        array_push($resultArray, $value);
      }
      return $resultArray;
    }, []);
  }
}
