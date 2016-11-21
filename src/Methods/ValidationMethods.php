<?php

namespace Lodash\Methods;

trait ValidationMethods
{
  public static function isDate($date, $format = 'Y-m-d H:i:s') {
    $d = \DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
  }

public static function isFloat($value) {
  return filter_var($value, FILTER_VALIDATE_FLOAT);
}

public static function isInt($value) {
  return filter_var($value, FILTER_VALIDATE_INT);
}

public static function isBool($value) {
  return filter_var($value, FILTER_VALIDATE_BOOLEAN);
}

public static function isEmail($value) {
  return filter_var($value, FILTER_VALIDATE_EMAIL);
}

public static function inRange($value, $range) {
  $range = explode("..", $range);
  return $value >= $range[0] && $value <= $range[1];
}

public static function isArray($value) {
  return is_array($value);
}

public static function isObject($value) {
  return is_object($value);
}

public static function isA($value, $type) {
  return is_a($value, $type);
}
}
