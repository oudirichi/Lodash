# USAGE

## Concat
```
_::concat());
// 0

_::concat([1,2], [2,3], [4,5]);
// [1,2,3,4,5]
```

## Concat
```
_::map(["key" => "value"], function($v, $k) {
  return $k . "=" . $v;
});
// ["key = value"]
```
