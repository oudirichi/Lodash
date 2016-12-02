<?php

namespace Lodash\Methods;

trait ConverterMethods
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
