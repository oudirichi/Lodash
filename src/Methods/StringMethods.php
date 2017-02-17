<?php

namespace Lodash\Methods;

class StringMethods
{
  /** Used to compose unicode capture groups. */
  private $rsApos = "['\u2019]";

  // Source
  // http://www.mendoweb.be/blog/php-convert-string-to-camelcase-string/
  //
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

  public static function capitalize($str)
  {
    $str = strtolower($str);
    $str = ucfirst($str);

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
