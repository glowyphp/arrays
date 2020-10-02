<h1 align="center">Arrays Component</h1>
<p align="center">
Arrays Component provide a fluent, object-oriented interface for working with arrays, allowing you to chain multiple arrays operations together using a more readable syntax compared to traditional PHP arrays functions.
</p>
<p align="center">
<a href="https://github.com/atomastic/arrays/releases"><img alt="Version" src="https://img.shields.io/github/release/atomastic/arrays.svg?label=version&color=green"></a> <a href="https://github.com/atomastic/arrays"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=green" alt="License"></a> <a href="https://github.com/atomastic/arrays"><img src="https://img.shields.io/github/downloads/atomastic/arrays/total.svg?color=green" alt="Total downloads"></a> <img src="https://github.com/atomastic/arrays/workflows/Static%20Analysis/badge.svg?branch=dev"> <img src="https://github.com/atomastic/arrays/workflows/Tests/badge.svg">
  <a href="https://app.codacy.com/gh/atomastic/arrays?utm_source=github.com&utm_medium=referral&utm_content=atomastic/arrays&utm_campaign=Badge_Grade_Dashboard"><img src="https://api.codacy.com/project/badge/Grade/72b4dc84c20145e1b77dc0004a3c8e3d"></a> <a href="https://codeclimate.com/github/atomastic/arrays/maintainability"><img src="https://api.codeclimate.com/v1/badges/a4c673a4640a3863a9a4/maintainability" /></a> <a href="https://app.fossa.com/projects/git%2Bgithub.com%2Fatomastic%2Farrays?ref=badge_shield" alt="FOSSA Status"><img src="https://app.fossa.com/api/projects/git%2Bgithub.com%2Fatomastic%2Farrays.svg?type=shield"/></a>
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
| <a href="#arrays_append">`append()`</a> | Push an item into the end of an array. |
| <a href="#arrays_all">`all()`</a> | Get all items from stored array. |
| <a href="#arrays_count">`count()`</a> | Return the number of items in a given key. |
| <a href="#arrays_create">`create()`</a> | Create a new arrayable object from the given elements. Initializes a Arrays object and assigns $items the supplied values. |
| <a href="#arrays_createFromJson">`createFromJson()`</a> | Create a new arrayable object from the given JSON string. |
| <a href="#arrays_createFromString">`createFromString()`</a> | Create a new arrayable object from the given string. |
| <a href="#arrays_createWithRange">`createWithRange()`</a> | Create a new arrayable object with a range of elements. |
| <a href="#arrays_chunk">`chunk()`</a> | Create a chunked version of current array. |
| <a href="#arrays_combine">`combine()`</a> | Create an array using the current array as keys and the other array as values. |
| <a href="#arrays_divide">`divide()`</a> | Divide an array into two arrays. One with keys and the other with values. |
| <a href="#arrays_diff">`diff()`</a> | Compute the current array values which not present in the given one. |
| <a href="#arrays_dot">`dot()`</a> | Flatten a multi-dimensional associative array with dots. |
| <a href="#arrays_delete">`delete()`</a> | Deletes an array value using "dot notation".|
| <a href="#arrays_flush">`flush()`</a> | Flush all values from the array. |
| <a href="#arrays_first">`first()`</a> | Get the first value from the current array. |
| <a href="#arrays_firstKey">`firstKey()`</a> | Get the first key from the current array. |
| <a href="#arrays_filter">`filter()`</a> | Filter the current array for elements satisfying the predicate `$callback` function. |
| <a href="#arrays_flip">`flip()`</a> | Exchanges all keys of current array with their associated values. |
| <a href="#arrays_get">`get()`</a> | Get an item from an array using "dot" notation. |
| <a href="#arrays_has">`has()`</a> | Checks if the given dot-notated key exists in the array. |
| <a href="#arrays_pull">`pad()`</a> | Pad the current array to the specified size with a given value. |
| <a href="#arrays_prepend">`prepend()`</a> | Push an item into the beginning of an array. |
| <a href="#arrays_pull">`pull()`</a> | Get a value from the array, and remove it. |
| <a href="#arrays_last">`last()`</a> | Get the last value from the current array. |
| <a href="#arrays_lastKey">`lastKey()`</a> | Get the last key from the current array. |
| <a href="#arrays_intersect">`intersect()`</a> | Compute the current array values which present in the given one. |
| <a href="#arrays_intersectAssoc">`intersectAssoc()`</a> | Compute the current array values with additional index check. |
| <a href="#arrays_intersectKey">`intersectKey()`</a> | Compute the current array using keys for comparison which present in the given one. |
| <a href="#arrays_isEqual">`isEqual()`</a> | Check if the current array is equal to the given `$array` or not. |
| <a href="#arrays_isAssoc">`isAssoc()`</a> | Determines if an array is associative. |
| <a href="#arrays_map">`map()`</a> | Apply the given $callback function to the every element of the current array, collecting the results. |
| <a href="#arrays_merge">`merge()`</a> | Merge the current array with the provided one. |
| <a href="#arrays_only">`only()`</a> | Return slice of an array with just a given keys. |
| <a href="#arrays_reindex">`reindex()`</a> | Create a numerically re-indexed array based on the current array. |
| <a href="#arrays_replace">`replace()`</a> | Replace values in the current array with values in the given one that have the same key. |
| <a href="#arrays_reverse">`reverse()`</a> | Reverse the values order of the current array. |
| <a href="#arrays_toArray">`toArray()`</a> | Get all items from stored array and convert them to array. |
| <a href="#arrays_toJson">`toJson()`</a> | Convert the current array to JSON. |
| <a href="#arrays_toQuery">`toQuery()`</a> | Convert the current array into a query string. |
| <a href="#arrays_toString">`toString()`</a> | Convert the current array to string recursively implodes an array with optional key inclusion. |
| <a href="#arrays_set">`set()`</a> | Set an array item to a given value using "dot" notation. If no key is given to the method, the entire array will be replaced. |
| <a href="#arrays_slice">`slice()`</a> | Extract a slice of the current array. |
| <a href="#arrays_search">`search()`</a> | Searches the array for a given value and returns the first corresponding key if successful. |
| <a href="#arrays_sortBySubKey">`sortBySubKey()`</a> | Sorts a associative array by a certain field. |
| <a href="#arrays_shuffle">`shuffle()`</a> | Shuffle the given array and return the result. |
| <a href="#arrays_reduce">`reduce()`</a> | Reduce the array to a single value iteratively combining all values using `$callback.` |
| <a href="#arrays_undot">`undot()`</a> | Expands a dot notation array into a full multi-dimensional array. |
| <a href="#arrays_unique">`unique()`</a> | Remove duplicate values from the current array. |
| <a href="#arrays_walk">`walk()`</a> | Apply the given function to the every element of the current array, discarding the results. |

#### Methods Details

##### <a name="arrays_append"></a> Method: `append()`

```php
/**
 * Push an item into the end of an array.
 *
 * @param mixed $value The new item to append
 */
function append($value = null): self
```

##### Example

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
                    ])->append(['tv-series']);

print_r($arrays->toArray());
```

##### The above example will output:

```
Array
(
    [movies] => Array
        (
            [the_thin_red_line] => Array
                (
                    [title] => The Thin Red Line
                    [directed_by] => Terrence Malick
                    [produced_by] => Robert Michael, Geisler Grant Hill, John Roberdeau
                    [decription] => Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
                )

            [bad_times_at_the_el_royale] => Array
                (
                    [title] => Bad Times at the El Royale
                    [directed_by] => Drew Goddard
                    [produced_by] => Drew Goddard, Steve Asbell
                    [decription] => Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.
                )

        )

    [0] => Array
        (
            [0] => tv-series
        )

)
```

##### <a name="arrays_all"></a> Method: `all()`

```php
/**
 *  Get all items from stored array.
 */
public function all(): array
```

##### Example

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

print_r($arrays->all());
```

##### The above example will output:

```
Array
(
    [movies] => Array
        (
            [the_thin_red_line] => Array
                (
                    [title] => The Thin Red Line
                    [directed_by] => Terrence Malick
                    [produced_by] => Robert Michael, Geisler Grant Hill, John Roberdeau
                    [decription] => Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
                )

            [bad_times_at_the_el_royale] => Array
                (
                    [title] => Bad Times at the El Royale
                    [directed_by] => Drew Goddard
                    [produced_by] => Drew Goddard, Steve Asbell
                    [decription] => Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.
                )

        )

)
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

##### Example

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

$total = $arrays->count();

print_r($total);
```

##### The above example will output:

```
1
```

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

##### Example

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

##### <a name="arrays_createFromJson"></a> Method: `createFromJson()`

```php
/**
 * Create a new arrayable object from the given JSON string.
 *
 * @param string $input A string containing JSON.
 * @param bool   $assoc Decode assoc. When TRUE, returned objects will be converted into associative arrays.
 * @param int    $depth Decode Depth. Set the maximum depth. Must be greater than zero.
 * @param int    $flags Bitmask consisting of decode options
 */
public static function createFromJson(string $input, bool $assoc = true, int $depth = 512, int $flags = 0): Arrays
```

##### Example

```php
$arrays = Arrays::createFromJson('{"foo": "bar"}');
```

##### <a name="arrays_createFromString"></a> Method: `createFromString()`

```php
/**
 * Create a new arrayable object from the given string.
 *
 * @param string $string    Input string.
 * @param string $separator Elements separator.
 */
public static function createFromString($string, $separator): Arrays
```

##### Example

```php
$arrays = Arrays::createFromString('foo,bar', ',');
```

##### <a name="arrays_createWithRange"></a> Method: `createWithRange()`

```php
/**
 * Create a new arrayable object with a range of elements.
 *
 * @param mixed $low  First value of the sequence.
 * @param mixed $high The sequence is ended upon reaching the end value.
 * @param int   $step If a step value is given, it will be used as the increment between elements in the sequence.
 *                    step should be given as a positive number. If not specified, step will default to 1.
 */
public static function createWithRange($low, $high, int $step = 1): Arrays
```

##### Example

```php
$arrays = Arrays::createWithRange(1, 5);
```


##### <a name="arrays_chunk"></a> Method: `chunk()`

```php
/**
 * Create a chunked version of current array.
 *
 * @param int  $size         Size of each chunk.
 * @param bool $preserveKeys Whether array keys are preserved or no.
 */
public function chunk($size, $preserveKeys = false): self
```

##### Example

```php
$arrays = Arrays::create(['a', 'b'])->chunk(2)->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [0] => Array
        (
            [0] => a
            [1] => b
        )

)
```

##### <a name="arrays_combine"></a> Method: `combine()`

```php
/**
 * Create an array using the current array as keys and the other array as values.
 *
 * @param array $array Values array
 */
public function combine(array $array): self
```

##### Example

```php
$arrays = Arrays::create(['green', 'red', 'yellow'])->combine(['avacado', 'apple', 'banana'])->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [green] => avacado
    [red] => apple
    [yellow] => banana
)
```

##### <a name="arrays_divide"></a> Method: `divide()`

```php
/**
 * Divide an array into two arrays.
 * One with keys and the other with values.
 */
public function divide(): array
```

##### Example

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

$result = $arrays->divide();

print_r($result);
```

##### The above example will output:

```
Array
(
    [0] => Array
        (
            [0] => movies
        )

    [1] => Array
        (
            [0] => Array
                (
                    [the_thin_red_line] => Array
                        (
                            [title] => The Thin Red Line
                            [directed_by] => Terrence Malick
                            [produced_by] => Robert Michael, Geisler Grant Hill, John Roberdeau
                            [decription] => Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
                        )

                    [bad_times_at_the_el_royale] => Array
                        (
                            [title] => Bad Times at the El Royale
                            [directed_by] => Drew Goddard
                            [produced_by] => Drew Goddard, Steve Asbell
                            [decription] => Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.
                        )

                )

        )

)
```

##### <a name="arrays_diff"></a> Method: `diff()`

```php
/**
 * Compute the current array values which not present in the given one.
 *
 * @param array $array Array for diff
 */
public function diff(array $array): self
```

##### Example

```php
$arrays = Arrays::create(['foo', 'bar'])->diff(['foo', 'bar'])->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
)
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

##### Example

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

$arrays->dot();

print_r($arrays->toArray());
```

##### The above example will output:

```
Array
(
    [movies.the_thin_red_line.title] => The Thin Red Line
    [movies.the_thin_red_line.directed_by] => Terrence Malick
    [movies.the_thin_red_line.produced_by] => Robert Michael, Geisler Grant Hill, John Roberdeau
    [movies.the_thin_red_line.decription] => Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
    [movies.bad_times_at_the_el_royale.title] => Bad Times at the El Royale
    [movies.bad_times_at_the_el_royale.directed_by] => Drew Goddard
    [movies.bad_times_at_the_el_royale.produced_by] => Drew Goddard, Steve Asbell
    [movies.bad_times_at_the_el_royale.decription] => Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.
)
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

##### Example

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

$arrays->delete('movies.the-thin-red-line');
```

##### <a name="arrays_filter"></a> Method: `filter()`

```php
/**
 * Filter the current array for elements satisfying the predicate $callback function.
 *
 * @param callable $callback The callback function.
 */
public function filter(callable $callback): self
```

##### Example

```php
$arrays = Arrays::create([6, 7, 8, 9, 10, 11, 12])->filter(function($var) {
                            return !($var & 1);
                        })->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [0] => 6
    [2] => 8
    [4] => 10
    [6] => 12
)
```

##### <a name="arrays_flush"></a> Method: `flush()`

```php
/**
 * Flush all values from the array.
 */
public function flush(): void
```

##### Example

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

$arrays->flush();

print_r($arrays->toArray());
```

##### The above example will output:

```
Array
(
)
```

##### <a name="arrays_first"></a> Method: `first()`

```php
/**
 * Get the first value from the current array.
 */
public function first()
```

##### Example

```php
$arrays = Arrays::create([
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
                       ]);

$result = $arrays->first();

print_r($result);
```

##### The above example will output:

```
Array
(
    [title] => The Thin Red Line
    [directed_by] => Terrence Malick
    [produced_by] => Robert Michael, Geisler Grant Hill, John Roberdeau
    [decription] => Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
)
```

##### <a name="arrays_firstKey"></a> Method: `firstKey()`

```php
/**
 * Get the first key from the current array.
 */
public function firstKey()
```

##### Example

```php
$arrays = Arrays::create([
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
                       ]);

$result = $arrays->firstKey();

print_r($result);
```

##### The above example will output:

```
the_thin_red_line
```

##### <a name="arrays_flip"></a> Method: `flip()`

```php
/**
 * Exchanges all keys of current array with their associated values.
 */
public function flip(): self
```

##### Example

```php
$arrays = Arrays::create(['oranges', 'apples', 'pears'])->flip()->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [oranges] => 0
    [apples] => 1
    [pears] => 2
)
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

##### Example

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

$title = $arrays->get('movies.the_thin_red_line.title');

print_r($title);
```

##### The above example will output:

```
The Thin Red Line
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

##### Example

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

if ($arrays->has('movies.the-thin-red-line')) {

    // Do something here...

    $title = $arrays->get('movies.the_thin_red_line.title');

    print_r($title);
}
```

##### The above example will output:

```
The Thin Red Line
```




##### <a name="arrays_pad"></a> Method: `pad()`

```php
/**
 * Pad the current array to the specified size with a given value.
 *
 * @param int   $size  Size of the result array.
 * @param mixed $value Empty value by default.
 */
public function pad(int $size, $value): self
```

##### Example

```php
$arrays = Arrays::create([12, 10, 9])->pad(5, 0);

print_r($arrays->toArray());
```

##### The above example will output:

```
Array
(
    [0] => 12
    [1] => 10
    [2] => 9
    [3] => 0
    [4] => 0
)
```

##### <a name="arrays_prepend"></a> Method: `prepend()`

```php
/**
 * Push an item into the beginning of an array.
 *
 * @param mixed $value The new item to append
 */
function prepend($value = null): self
```

##### Example

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
                    ])->prepend(['tv-series']);

print_r($arrays->toArray());
```

##### The above example will output:

```
Array
(
    [0] => Array
        (
            [0] => tv-series
        )

    [movies] => Array
        (
            [the_thin_red_line] => Array
                (
                    [title] => The Thin Red Line
                    [directed_by] => Terrence Malick
                    [produced_by] => Robert Michael, Geisler Grant Hill, John Roberdeau
                    [decription] => Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
                )

            [bad_times_at_the_el_royale] => Array
                (
                    [title] => Bad Times at the El Royale
                    [directed_by] => Drew Goddard
                    [produced_by] => Drew Goddard, Steve Asbell
                    [decription] => Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.
                )

        )

)
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

##### Example

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

$item = $arrays->pull('movies.the_thin_red_line');

print_r($item);
print_r($arrays->toArray());
```

##### The above example will output:

```
Array
(
    [title] => The Thin Red Line
    [directed_by] => Terrence Malick
    [produced_by] => Robert Michael, Geisler Grant Hill, John Roberdeau
    [decription] => Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
)

Array
(
    [bad_times_at_the_el_royale] => Array
        (
            [title] => Bad Times at the El Royale
            [directed_by] => Drew Goddard
            [produced_by] => Drew Goddard, Steve Asbell
            [decription] => Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.
        )

)
```

##### <a name="arrays_last"></a> Method: `last()`

```php
/**
 * Get the last value from the current array.
 */
public function last()
```

##### Example

```php
$arrays = Arrays::create([
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
                       ]);

$result = $arrays->last();

print_r($result);
```

##### The above example will output:

```
Array
(
    [title] => Bad Times at the El Royale
    [directed_by] => Drew Goddard
    [produced_by] => Drew Goddard, Steve Asbell
    [decription] => Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.
)
```

##### <a name="arrays_lastKey"></a> Method: `lastKey()`

```php
/**
 * Get the last key from the current array.
 */
public function lastKey()
```

##### Example

```php
$arrays = Arrays::create([
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
                       ]);

$result = $arrays->lastKey();

print_r($result);
```

##### The above example will output:

```
bad_times_at_the_el_royale
```

##### <a name="arrays_intersect"></a> Method: `intersect()`

```php
/**
 * Compute the current array values which present in the given one.
 *
 * @param array $array Array for intersect
 */
public function intersect(array $array): self
```

##### Example

```php
$arrays = Arrays::create(["a" => "green", "red", "blue"])
                ->intersect(["b" => "green", "yellow", "red"])
                ->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [a] => green
    [0] => red
)
```

##### <a name="arrays_intersectAssoc"></a> Method: `intersectAssoc()`

```php
/**
 * Compute the current array values with additional index check.
 *
 * @param array $array Array for intersect.
 */
public function intersectAssoc(array $array): self
```

##### Example

```php
$arrays = Arrays::create(["a" => "green", "b" => "brown", "c" => "blue", "red"])
                ->intersectAssoc(["a" => "green", "b" => "yellow", "blue", "red"])
                ->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [a] => green
)
```

##### <a name="arrays_intersectKey"></a> Method: `intersectKey()`

```php
/**
 * Compute the current array using keys for comparison which present in the given one.
 *
 * @param array $array Array for intersect.
 */
public function intersectKey(array $array): self
```

##### Example

```php
$arrays = Arrays::create(['blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4])
                ->intersectKey(['green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan' => 8])
                ->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [blue] => 1
    [green] => 3
)
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

##### Example

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

$array2 = [];

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

##### Example

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

if ($arrays->isAssoc()) {
    // do something...
}
```

##### <a name="arrays_map"></a> Method: `map()`

```php
/**
 * Apply the given $callback function to the every element of the current array,
 * collecting the results.
 *
 * @param callable $callback The callback function.
 */
public function map(callable $callback): self
```

##### Example

```php
$arrays = Arrays::create([1, 2, 3, 4, 5])
                ->map(function ($n) {
                    return ($n * $n * $n);
                })->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [0] => 1
    [1] => 8
    [2] => 27
    [3] => 64
    [4] => 125
)
```

##### <a name="arrays_merge"></a> Method: `merge()`

```php
/**
 * Merge the current array with the provided one.
 *
 * @param array $array       Array to merge with (overwrites).
 * @param bool  $recursively Whether array will be merged recursively or no. Default is false.
 */
public function merge(array $array, bool $recursively = false): self
```

##### Example

```php
$arrays = Arrays::create(['color' => 'red', 2, 4])
                ->merge(['a', 'b', 'color' => 'green', 'shape' => 'trapezoid', 4])
                ->toArray();

$arrays2 = Arrays::create(['color' => ['favorite' => 'red'], 5])
                 ->merge([10, 'color' => ['favorite' => 'green', 'blue']], true)
                 ->toArray();

print_r($arrays);
print_r($arrays2);
```

##### The above example will output:

```
Array
(
    [color] => green
    [0] => 2
    [1] => 4
    [2] => a
    [3] => b
    [shape] => trapezoid
    [4] => 4
)

Array
(
    [color] => Array
        (
            [favorite] => Array
                (
                    [0] => red
                    [1] => green
                )

            [0] => blue
        )

    [0] => 5
    [1] => 10
)
```

##### <a name="arrays_only"></a> Method: `only()`

```php
/**
 * Return slice of an array with just a given keys.
 *
 * @param array $keys List of keys to return.
 */
public function only(array $keys): self
```

##### Example

```php
$arrays = Arrays::create(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5])->only(['b', 'e'])->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [b] => 2
    [e] => 5
)
```

##### <a name="arrays_reindex"></a> Method: `reindex()`

```php
/**
 * Create a numerically re-indexed array based on the current array.
 */
public function reindex(): self
```

##### Example

```php
$arrays = Arrays::create([10 => 'foo', 111 => 'bar'])->reindex()->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [0] => foo
    [1] => bar
)
```

##### <a name="arrays_replace"></a> Method: `replace()`

```php
/**
 * Replace values in the current array with values in the given one
 * that have the same key.
 *
 * @param array $array       Array of replacing values.
 * @param bool  $recursive Whether array will be replaced recursively or no. Default is false.
 */
public function replace(array $array, $recursive = false): self
```

##### Example

```php
$arrays = Arrays::create(['orange', 'banana', 'apple', 'raspberry'])
                ->replace([0 => 'cherry'])
                ->toArray();

print_r($arrays);

$arrays = Arrays::create(['citrus' => ['orange'], 'berries' => ['blackberry', 'raspberry']])
                ->replace(['citrus' => ['pineapple'], 'berries' => ['blueberry']], true)
                ->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [0] => cherry
    [1] => banana
    [2] => apple
    [3] => raspberry
)
Array
(
    [citrus] => Array
        (
            [0] => pineapple
        )

    [berries] => Array
        (
            [0] => blueberry
            [1] => raspberry
        )

)
```

##### <a name="arrays_reverse"></a> Method: `reverse()`

```php
/**
 * Reverse the values order of the current array.
 *
 * @param bool $preserveKeys Whether array keys are preserved or no. Default is false.
 */
public function reverse(bool $preserveKeys = false): self
```

##### Example

```php
$arrays = Arrays::create(['php', 8, ['green', 'red']])
                ->reverse()
                ->toArray();

print_r($arrays);

$arrays = Arrays::create(['php', 8, ['green', 'red']])
                ->reverse(true)
                ->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [0] => Array
        (
            [0] => green
            [1] => red
        )

    [1] => 8
    [2] => php
)
Array
(
    [2] => Array
        (
            [0] => green
            [1] => red
        )

    [1] => 8
    [0] => php
)
```

##### <a name="arrays_toArray"></a> Method: `toArray()`

```php
/**
 * Get all items from stored array and convert them to array.
 */
public function toArray(): array
```

##### Example

```php
$arrays = Arrays::create([
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
                       ]);

$result = $arrays->toArray();

print_r($result);
```

##### The above example will output:

```
Array
(
    [the_thin_red_line] => Array
        (
            [title] => The Thin Red Line
            [directed_by] => Terrence Malick
            [produced_by] => Robert Michael, Geisler Grant Hill, John Roberdeau
            [decription] => Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
        )

    [bad_times_at_the_el_royale] => Array
        (
            [title] => Bad Times at the El Royale
            [directed_by] => Drew Goddard
            [produced_by] => Drew Goddard, Steve Asbell
            [decription] => Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.
        )

)
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

##### Example

```php
$arrays = Arrays::create([
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
                       ]);

$result = $arrays->toJson();

print_r($result);
```

##### The above example will output:

```
{"the_thin_red_line":{"title":"The Thin Red Line","directed_by":"Terrence Malick","produced_by":"Robert Michael, Geisler Grant Hill, John Roberdeau","decription":"Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War."},"bad_times_at_the_el_royale":{"title":"Bad Times at the El Royale","directed_by":"Drew Goddard","produced_by":"Drew Goddard, Steve Asbell","decription":"Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be."}}
```

##### <a name="arrays_toQuery"></a> Method: `toQuery()`

```php
/**
 * Convert the array into a query string.
 */
public function toQuery(): string
```

##### Example

```php
$arrays = Arrays::create([
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
                       ]);

$result = $arrays->toQuery();

print_r($result);
```

##### The above example will output:

```
the_thin_red_line%5Btitle%5D=The%20Thin%20Red%20Line&the_thin_red_line%5Bdirected_by%5D=Terrence%20Malick&the_thin_red_line%5Bproduced_by%5D=Robert%20Michael%2C%20Geisler%20Grant%20Hill%2C%20John%20Roberdeau&the_thin_red_line%5Bdecription%5D=Adaptation%20of%20James%20Jones%20autobiographical%201962%20novel%2C%20focusing%20on%20the%20conflict%20at%20Guadalcanal%20during%20the%20second%20World%20War.&bad_times_at_the_el_royale%5Btitle%5D=Bad%20Times%20at%20the%20El%20Royale&bad_times_at_the_el_royale%5Bdirected_by%5D=Drew%20Goddard&bad_times_at_the_el_royale%5Bproduced_by%5D=Drew%20Goddard%2C%20Steve%20Asbell&bad_times_at_the_el_royale%5Bdecription%5D=Early%201970s.%20Four%20strangers%20check%20in%20at%20the%20El%20Royale%20Hotel.%20The%20hotel%20is%20deserted%2C%20staffed%20by%20a%20single%20desk%20clerk.%20Some%20of%20the%20new%20guests%20reasons%20for%20being%20there%20are%20less%20than%20innocent%20and%20some%20are%20not%20who%20they%20appear%20to%20be.
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

##### Example

```php
$arrays = Arrays::create([
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ]
                       ]);

$result = $arrays->toString();

print_r($result);

$arrays2 = Arrays::create([
                           'the_thin_red_line' => [
                               'title' => 'The Thin Red Line',
                               'directed_by' => 'Terrence Malick',
                               'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                               'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.'
                           ]
                       ]);

$result2 = $arrays2->toString(',', false, false);

print_r($result2);
```

##### The above example will output:

```
TheThinRedLine,TerrenceMalick,RobertMichael,GeislerGrantHill,JohnRoberdeau,AdaptationofJamesJonesautobiographical1962novel,focusingontheconflictatGuadalcanalduringthesecondWorldWar.

The Thin Red Line,Terrence Malick,Robert Michael, Geisler Grant Hill, John Roberdeau,Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
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

##### Example

```php
$arrays = Arrays::create()->set('movies.the-thin-red-line.title', 'The Thin Red Line');
```

##### <a name="arrays_slice"></a> Method: `slice()`

```php
/**
 * Extract a slice of the current array.
 *
 * @param int      $offset       Slice begin index.
 * @param int|null $length       Length of the slice. Default is null.
 * @param bool     $preserveKeys Whether array keys are preserved or no. Default is false.
 */
public function slice(int $offset, ?int $length = null, bool $preserveKeys = false): self
```

##### Example

```php
$arrays = Arrays::create(['a', 'b', 'c', 'd', 'e'])->slice(0, 3)->toArray();

print_r($arrays);
```

##### <a name="arrays_search"></a> Method: `search()`

```php
/**
 * Searches the array for a given value and returns the first corresponding key if successful.
 *
 * @param mixed $needle The searched value.
 */
public function search($needle)
```

##### Example

```php
$result = Arrays::create([0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red'])->search('green');

print_r($result);
```

##### The above example will output:

```
2
```

##### <a name="arrays_sortBySubKey"></a> Method: `sortBySubKey()`

```php
/**
 * Sorts a associative array by a certain sub key.
 *
 * @param  string $subKey    The name of the sub key.
 * @param  string $direction Order type DESC (descending) or ASC (ascending)
 * @param  int    $sortFlags A PHP sort method flags.
 *                           https://www.php.net/manual/ru/function.sort.php
 */
public function sortBySubKey(string $subKey, string $direction = 'ASC', int $sortFlags = SORT_REGULAR): self
```

##### Example

```php
$arrays = Arrays::create([
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
                    ])->sortBySubKey('title', 'ASC');

print_r($arrays->toArray());
```

##### The above example will output:

```
Array
(
    [bad_times_at_the_el_royale] => Array
        (
            [title] => Bad Times at the El Royale
            [directed_by] => Drew Goddard
            [produced_by] => Drew Goddard, Steve Asbell
            [decription] => Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.
        )

    [the_thin_red_line] => Array
        (
            [title] => The Thin Red Line
            [directed_by] => Terrence Malick
            [produced_by] => Robert Michael, Geisler Grant Hill, John Roberdeau
            [decription] => Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.
        )

)
```

##### <a name="arrays_shuffle"></a> Method: `shuffle()`

```php
/**
 * Shuffle the given array and return the result.
 *
 * @param  int|null $seed An arbitrary integer seed value.
 */
public function shuffle($seed = null): self
```

##### Example

```php
$arrays = Arrays::create([1, 2, 3, 4, 5])->shuffle();

print_r($arrays->toArray());
```

##### The above example will output:

```
Array
(
    [0] => 4
    [1] => 3
    [2] => 5
    [3] => 1
    [4] => 2
)
```


##### <a name="arrays_reduce"></a> Method: `reduce()`

```php
/**
 * Reduce the array to a single value iteratively combining all values using $callback.
 *
 * @param callable   $callback Callback with ($carry, $item)
 * @param mixed|null $initial  If the optional initial is available,
 *                             it will be used at the beginning of the process,
 *                             or as a final result in case the array is empty.
 */
public function reduce(callable $callback, $initial = null)
```

##### Example

```php
$result = Arrays::create([2, 2])
                ->reduce(function ($carry, $item) {
                    $carry += $item;
                    return $carry;
                });

print_r($result);
```

##### The above example will output:

```
4
```

##### <a name="arrays_undot"></a> Method: `undot()`

```php
/**
 * Expands a dot notation array into a full multi-dimensional array.
 */
public function undot(): self
```

##### Example

```php
$arrays = Arrays::create([
                            'movies.the_thin_red_line.title' => 'The Thin Red Line'
                        ]);

$arrays->undot();

print_r($arrays->toArray());
```

##### The above example will output:

```
Array
(
    [movies] => Array
        (
            [the_thin_red_line] => Array
                (
                    [title] => The Thin Red Line
                )

        )

)
```

##### <a name="arrays_unique"></a> Method: `unique()`

```php
/**
 * Remove duplicate values from the current array.
 *
 * @param int $sortFlags Sort flags used to modify the sorting behavior.
 *                       Sorting type flags:
 *                       https://www.php.net/manual/en/function.array-unique
 */
public function unique(int $sortFlags = SORT_STRING): self
```

##### Example

```php
$arrays = Arrays::create(["a" => "green", "red", "b" => "green", "blue", "red"])->unique()->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [a] => green
    [0] => red
    [1] => blue
)
```


##### <a name="arrays_walk"></a> Method: `walk()`

```php
/**
 * Apply the given function to the every element of the current array,
 * discarding the results.
 *
 * @param bool $recursively Whether array will be walked recursively or no. Default is false.
 */
public function walk(callable $callable, bool $recursive = false): self
```

##### Example

```php
$arrays = Arrays::create(["a" => "lemon", "b" => "orange", "c" => "banana"])
                ->walk(function(&$value, $key) {
                    $value = $key;
                })
                ->toArray();

print_r($arrays);
```

##### The above example will output:

```
Array
(
    [a] => a
    [b] => b
    [c] => c
)
```

### Tests

Run tests

```
./vendor/bin/pest
```

### License
[The MIT License (MIT)](https://github.com/atomastic/arrays/blob/master/LICENSE)
Copyright (c) 2020 [Sergey Romanenko](https://github.com/Awilum)
