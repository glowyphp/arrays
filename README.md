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
| <a href="#arrays_create">`create()`</a> | Create a new arrayable object from the given elements. Initializes a Arrays object and assigns $elements the supplied values. |
| <a href="#arrays_set">`set()`</a> | Set an array item to a given value using "dot" notation. If no key is given to the method, the entire array will be replaced. |
| <a href="#arrays_get">`get()`</a> | Get an item from an array using "dot" notation. |
| <a href="#arrays_has">`has()`</a> | Checks if the given dot-notated key exists in the array. |
| <a href="#arrays_delete">`delete()`</a> | Deletes an array value using "dot notation".|
| <a href="#arrays_undot">`undot()`</a> | Expands a dot notation array into a full multi-dimensional array. |
| <a href="#arrays_dot">`dot()`</a> | Flatten a multi-dimensional associative array with dots. |
| <a href="#arrays_all">`all()`</a> | Get all items from stored array. |
| <a href="#arrays_flush">`flush()`</a> | Flush all values from the array. |

#### Methods Details

##### <a name="arrays_create"></a> Method: `create()`

```php
/**
 * Create a new arrayable object from the given elements.
 *
 * Initializes a Arrays object and assigns $elements the supplied values.
 *
 * @param mixed $elements Elements
 */
public static function create(array $elements = []): Arrays
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
$arrays->set('movies.the-thin-red-line.title', 'The Thin Red Line');
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

### Tests

Run tests

```
./vendor/bin/pest
```

### License
[The MIT License (MIT)](https://github.com/atomastic/arrays/blob/master/LICENSE.txt)
Copyright (c) 2020 [Sergey Romanenko](https://github.com/Awilum)
