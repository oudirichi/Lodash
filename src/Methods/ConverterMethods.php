<?php

namespace Lodash\Methods;

class ConverterMethods
{
  public static function toArray($value) {

  }

  public static function toInteger($value) {
    return intval($value);
  }

  public static function toNumber($value) {
    return floatval($value);
  }

  public static function toString($value) {
    return strval($value);
  }
}
