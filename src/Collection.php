<?php

namespace Lodash;

class Collection implements \ArrayAccess, \IteratorAggregate, \Countable {
  use Lodash\Methods\ArraysMethods;

    private $collection = array();

    public function __construct($collection = array()) {
      $this->collection = array_merge($this->collection, $collection);
    }

    // IteratorAggregate
    public function offsetSet($offset, $value) {
      if (is_null($offset)) {
        $this->collection[] = $value;
      } else {
        $this->collection[$offset] = $value;
      }
    }

    public function offsetExists($offset) {
      return isset($this->collection[$offset]);
    }

    public function offsetUnset($offset) {
      unset($this->collection[$offset]);
    }

    public function offsetGet($offset) {
      return isset($this->collection[$offset]) ? $this->collection[$offset] : null;
    }

    // IteratorAggregate
    public function getIterator() {
      return new ArrayIterator($this->collection);
    }

    // Countable
    public function count()
    {
      return count($this->collection);
    }

    public static function __callStatic($name, $args)
    {
      if (method_exists(__CLASS__, $name)) {
        call_user_func(array(__CLASS__, $name, $args));
      }
    }
}
