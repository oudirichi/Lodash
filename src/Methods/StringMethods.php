<?php

namespace Lodash\Methods;

trait StringMethods
{
  // Source
  // http://www.mendoweb.be/blog/php-convert-string-to-camelcase-string/
  //
  public static function camelCase($str, array $noStrip = [])
  {
    // non-alpha and non-numeric characters become spaces
    $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
    $str = trim($str);
    // uppercase the first character of each word
    $str = ucwords($str);
    $str = str_replace(" ", "", $str);
    $str = lcfirst($str);

    return $str;
  }

  public static function capitalize($str)
  {
    $str = strtolower($str);
    $str = ucfirst($str);

    return $str;
  }
}
