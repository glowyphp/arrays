<h1 align="center">Arrays Component</h1>

<p align="center">
<a href="https://github.com/atomastic/arrays/releases"><img alt="Version" src="https://img.shields.io/github/release/atomastic/arrays.svg?label=version&color=green"></a> <a href="https://github.com/atomastic/arrays"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=green" alt="License"></a> <a href="https://github.com/atomastic/arrays"><img src="https://img.shields.io/github/downloads/atomastic/arrays/total.svg?color=green" alt="Total downloads"></a> <img src="https://github.com/atomastic/arrays/workflows/Static%20Analysis/badge.svg?branch=dev"> <img src="https://github.com/atomastic/arrays/workflows/Tests/badge.svg">
  <a href="https://app.codacy.com/gh/atomastic/arrays?utm_source=github.com&utm_medium=referral&utm_content=atomastic/arrays&utm_campaign=Badge_Grade_Dashboard"><img src="https://api.codacy.com/project/badge/Grade/72b4dc84c20145e1b77dc0004a3c8e3d"></a>
</p>

<br>

* [Installation](#installation)
* [Usage](#usage)
* [Methods](#methods)
* [Tests](#tests)
* [License](#license)

### Installation

#### With [Composer](https://getcomposer.org)

```
composer require atomastic/arrays
```

### Usage

```php
use Atomastic\Arrays\Arrays;

// Using public method __construct()
$arrays = new Arrays();

// Using public static method create()
$arrays = Arrays::create();

// Using global helper function arrays()
$arrays = arrays();
```

### Methods

| Method | Description |
|---|---|
| <a href="#arrays_create">`create()`</a> | Create a new arrayable object from the given elements. Initializes a Arrays object and assigns $items the supplied values. |
| <a href="#arrays_set">`set()`</a> | Set an array item to a given value using "dot" notation. If no key is given to the method, the entire array will be replaced. |
| <a href="#arrays_get">`get()`</a> | Get an item from an array using "dot" notation. |
| <a href="#arrays_has">`has()`</a> | Checks if the given dot-notated key exists in the array. |
| <a href="#arrays_delete">`delete()`</a> | Deletes an array value using "dot notation".|
| <a href="#arrays_undot">`undot()`</a> | Expands a dot notation array into a full multi-dimensional array. |
| <a href="#arrays_dot">`dot()`</a> | Flatten a multi-dimensional associative array with dots. |
| <a href="#arrays_append">`append()`</a> | Push an item into the end of an array. |
| <a href="#arrays_prepend">`prepend()`</a> | Push an item into the beginning of an array. |
| <a href="#arrays_all">`all()`</a> | Get all items from stored array. |
| <a href="#arrays_flush">`flush()`</a> | Flush all values from the array. |
| <a href="#arrays_sortByKey">`sortByKey()`</a> | Sorts a associative array by a certain field. |
| <a href="#arrays_pull">`pull()`</a> | Get a value from the array, and remove it. |
| <a href="#arrays_count">`count()`</a> | Return the number of items in a given key. |
| <a href="#arrays_divide">`divide()`</a> | Divide an array into two arrays. One with keys and the other with values. |
| <a href="#arrays_isEqual">`isEqual()`</a> | Check if the current array is equal to the given `$array` or not. |
| <a href="#arrays_isAssoc">`isAssoc()`</a> | Determines if an array is associative. |
| <a href="#arrays_first">`first()`</a> | Get the first value from the current array. |
| <a href="#arrays_firstKey">`firstKey()`</a> | Get the first key from the current array. |
| <a href="#arrays_last">`last()`</a> | Get the last value from the current array. |
| <a href="#arrays_lastKey">`lastKey()`</a> | Get the last key from the current array. |
| <a href="#arrays_toQuery">`toQuery()`</a> | Convert the current array into a query string. |
| <a href="#arrays_toArray">`toArray()`</a> | Get all items from stored array and convert them to array. |
| <a href="#arrays_toJson">`toJson()`</a> | Convert the current array to JSON. |
| <a href="#arrays_toString">`toString()`</a> | Convert the current array to string recursively implodes an array with optional key inclusion. |

#### Methods Details

##### <a name="arrays_create"></a> Method: `create()`

```php
/**
 * Create a new arrayable object from the given elements.
 *
 * Initializes a Arrays object and assigns $items the supplied values.
 *
 * @param mixed $items Elements
 */
public static function create(array $items = []): Arrays
```

**Examples**

```php
$arrays = Arrays::create([
                        'movies' => [
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ],
                           'bad_times_at_the_el_royale' => [
                               'title' => 'Bad Times at the El Royale',
                               'directed_by' => 'Drew Goddard',
                               'produced_by' => 'Drew Goddard, Steve Asbell',
                               'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.'
                           ]
                        ]
                    ]);
```

##### <a name="arrays_set"></a> Method: `set()`

```php
/**
 * Set an array item to a given value using "dot" notation.
 *
 * If no key is given to the method, the entire array will be replaced.
 *
 * @param  string $key   Key
 * @param  mixed  $value Value
 */
public function set(string $key, $value): self
```

**Examples**

```php
$arrays->set('movies.the-thin-red-line.title', 'The Thin Red Line');
```

##### <a name="arrays_get"></a> Method: `get()`

```php
/**
 * Get an item from an array using "dot" notation.
 *
 * @param  string|int|null $key     Key
 * @param  mixed           $default Default
 */
public function get($key, $default = null)
```

**Examples**

```php
$title = $arrays->get('movies.the-thin-red-line.title');
```

##### <a name="arrays_has"></a> Method: `has()`

```php
/**
 * Checks if the given dot-notated key exists in the array.
 *
 * @param  string|array $keys Keys
 */
public function has($keys): bool
```

**Examples**

```php
if ($arrays->has('movies.the-thin-red-line')) {
    // Do something...
}
```

##### <a name="arrays_delete"></a> Method: `delete()`

```php
/**
 * Deletes an array value using "dot notation".
 *
 * @param  array|string $keys Keys
 */
public function delete($keys): self
```

**Examples**

```php
$arrays->delete('movies.the-thin-red-line');
```

##### <a name="arrays_dot"></a> Method: `dot()`

```php
/**
 * Flatten a multi-dimensional associative array with dots.
 *
 * @param  string $prepend Prepend string
 */
public function dot(string $prepend = ''): self
```

**Examples**

```php
$arrays->dot();
```

##### <a name="arrays_undot"></a> Method: `undot()`

```php
/**
 * Expands a dot notation array into a full multi-dimensional array.
 */
public function undot(): self
```

**Examples**

```php
$arrays->undot();
```

##### <a name="arrays_all"></a> Method: `all()`

```php
/**
 *  Get all items from stored array.
 */
public function all(): array
```

**Examples**

```php
foreach ($arrays->all() as $key => $value) {
    // code...
}
```

##### <a name="arrays_flush"></a> Method: `flush()`

```php
/**
 * Flush all values from the array.
 */
public function flush(): void
```

**Examples**

```php
$arrays->flush();
```

##### <a name="arrays_sortByKey"></a> Method: `sortByKey()`

```php
/**
 * Sorts a associative array by a certain key.
 *
 * @param  string $key       The name of the key. Using "dot" notation
 * @param  string $direction Order type DESC (descending) or ASC (ascending)
 * @param  int    $sortFlags A PHP sort method flags.
 *                           https://www.php.net/manual/ru/function.sort.php
 */
public function sortByKey(string $key, string $direction = 'ASC', int $sortFlags = SORT_REGULAR): self
```

**Examples**

```php
$result = Arrays::create([1 => ['title' => 'Post 2'],
                          0 => ['title' => 'Post 1']])->sortByKey('title', 'ASC')->all();

$result = Arrays::create([1 => ['title' => 'Post 2'],
                          0 => ['title' => 'Post 1']])->sortByKey('title', 'DESC')->all();
```

##### <a name="arrays_pull"></a> Method: `pull()`

```php
/**
 * Get a value from the array, and remove it.
 *
 * @param  string  $key     Key
 * @param  mixed   $default Default value
 */
public function pull($key, $default = null)
```

**Examples**

```php
$arrays->pull('movies.the-thin-red-line');
```

##### <a name="arrays_count"></a> Method: `count()`

```php
/**
 * Return the number of items in a given key.
 *
 * @param  int|string|null $key
 */
public function count($key = null): int
```

**Examples**

```php
$total = $arrays->count();
```

##### <a name="arrays_isEqual"></a> Method: `isEqual()`

```php
/**
 * Check if the current array is equal to the given $array or not.
 *
 * @param array $array Array
 */
public function isEqual(array $array): bool
```

**Examples**

```php
if ($arrays->isEqual($array2)) {
    // do something...
}
```


##### <a name="arrays_isAssoc"></a> Method: `isAssoc()`

```php
/**
 * Determines if an array is associative.
 */
public function isAssoc(): bool
```

**Examples**

```php
if ($arrays->isAssoc()) {
    // do something...
}
```

##### <a name="arrays_divide"></a> Method: `divide()`

```php
/**
 * Divide an array into two arrays.
 * One with keys and the other with values.
 */
public function divide(): array
```

**Examples**

```php
$result = $arrays->divide();
```

##### <a name="arrays_first"></a> Method: `first()`

```php
/**
 * Get the first value from the current array.
 */
public function first()
```

**Examples**

```php
$result = $arrays->first();
```

##### <a name="arrays_firstKey"></a> Method: `firstKey()`

```php
/**
 * Get the first key from the current array.
 */
public function firstKey()
```

**Examples**

```php
$result = $arrays->firstKey();
```

##### <a name="arrays_last"></a> Method: `last()`

```php
/**
 * Get the last value from the current array.
 */
public function last()
```

**Examples**

```php
$result = $arrays->last();
```

##### <a name="arrays_lastKey"></a> Method: `lastKey()`

```php
/**
 * Get the last key from the current array.
 */
public function lastKey()
```

**Examples**

```php
$result = $arrays->lastKey();
```

##### <a name="arrays_toQuery"></a> Method: `toQuery()`

```php
/**
 * Convert the array into a query string.
 */
public function toQuery(): string
```

**Examples**

```php
$result = $arrays->toQuery();
```

##### <a name="arrays_toArray"></a> Method: `toArray()`

```php
/**
 * Get all items from stored array and convert them to array.
 */
public function toArray(): array
```

**Examples**

```php
$result = $arrays->toArray();
```

##### <a name="arrays_toJson"></a> Method: `toJson()`

```php
/**
 * Convert the current array to JSON.
 *
 * @param int $options Bitmask consisting of encode options
 * @param int $depth   Encode Depth. Set the maximum depth. Must be greater than zero.
 */
public function toJson($options = 0, int $depth = 512): string
```

**Examples**

```php
$result = $arrays->toJson();
```

##### <a name="arrays_toString"></a> Method: `toString()`

```php
/**
 * Convert the current array to string recursively implodes an array with optional key inclusion.
 *
 * @param string  $glue         Value that glues elements together.
 * @param bool    $includeKeys  Include keys before their values.
 * @param bool    $trimAll      Trim ALL whitespace from string.
 */
public function toString(string $glue = ',', $includeKeys = false, $trimAll = true): string
```

**Examples**

```php
$result = $arrays->toString();
```

### Tests

Run tests

```
./vendor/bin/pest
```

### License
[The MIT License (MIT)](https://github.com/atomastic/arrays/blob/master/LICENSE)
Copyright (c) 2020 [Sergey Romanenko](https://github.com/Awilum)
