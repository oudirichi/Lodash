<?php

namespace Lodash\Methods;

class StringMethods
{
  public static function capitalize($str)
  {
    $str = strtolower($str);
    $str = ucfirst($str);

    return $str;
  }

  public static function escape($str)
  {
    return htmlspecialchars($str);
  }

  public static function truncate($str, $params = array())
  {
    if (!in_array("length", $params)) $params["length"] = 30;
    if (!in_array("separator", $params)) $params["separator"] = " ";
    if (!in_array("omission", $params)) $params["omission"] = "...";

    $ext = substr($str, 0, $params["length"]);
    $space = strrpos($ext, $params["separator"]);
    return substr($ext, 0, $space) . $params["omission"];
  }

  public static function template($str)
  {
    return function($params = array()) use ($str) {
      if (!is_array($params)) $params = array();

      foreach ($params as $key => $value) {
        if (is_callable($value)) $value = $value();
        $str = str_replace($key, $value, $str);
      }

      return $str;
    };
  }

  public static function toLower($str)
  {
    return strtolower($str);
  }

  public static function toUpper($str)
  {
    return strtoupper($str);
  }


  /////////////////////////
  /// in progress bellow
  /////////////////////////

  public static function classify($word)
  {
    return str_replace(" ", "", ucwords(strtr($word, "_-", "  ")));
  }


  public static function camelCase($str, array $noStrip = [])
  {
    // non-alpha and non-numeric characters become spaces
    $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
    $str = trim($str);

    // var_dump(static::words($str, false, false));die;
    // uppercase the first character of each word
    // $str = strtolower($str);
    $str = ucwords(strtolower($str));
    $str = str_replace(" ", "", $str);
    $str = lcfirst($str);

    return $str;
  }

  public static function words($str, $pattern, $guard) {
    $str = (string) $str;
    $pattern = $guard ? false : $pattern;

    if ($pattern === false) {
      return static::hasUnicodeWord($str) ? static::unicodeWords($str) : static::asciiWords($str);
    }
    return preg_match($pattern, $str);
  }

  private static function hasUnicodeWord($str) {
    $reHasUnicodeWord = "/[a-z][A-Z]|[A-Z]{2,}[a-z]|[0-9][a-zA-Z]|[a-zA-Z][0-9]|[^a-zA-Z0-9 ]/";
    preg_match(static::$reHasUnicodeWord, $str);
  }

  private static function asciiWords($str) {
    $reAsciiWord = '/[\x00-\x2f\x3a-\x40\x5b-\x60\x7b-\x7f]/u';
    preg_split($reAsciiWord, $str,  -1, PREG_SPLIT_NO_EMPTY);
  }
}
