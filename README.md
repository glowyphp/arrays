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
| <a href="#arrays_create">`create()`</a> | Initializes a Arrays object and assigns both $string and $encoding properties the supplied values. $string is cast to a string prior to assignment. Throws an InvalidArgumentException if the first argument is an array or object without a `__toString` method. |
| <a href="#arrays_stripSpaces">`stripSpaces()`</a> | Strip all whitespaces from the given string. |
| <a href="#arrays_trimSlashes">`trimSlashes()`</a> | Removes any leading and trailing slashes from a string. |
| <a href="#arrays_reduceSlashes">`reduceSlashes()`</a> | Reduces multiple slashes in a string to single slashes. |

#### Methods Details

##### <a name="arrays_create"></a> Method: `create()`

```php
/**
 * Initializes a Arrays object and assigns both $string and $encoding properties
 * the supplied values. $string is cast to a string prior to assignment. Throws
 * an InvalidArgumentException if the first argument is an array or object
 * without a __toString method.
 *
 * @param mixed  $string   Value to modify, after being cast to string. Default: ''
 * @param string $encoding The character encoding. Default: UTF-8
 */
public static function of($string = '', string $encoding = 'UTF-8'): self
```

**Examples**

```php
$string = Arrays::create('SG-1 returns from an off-world mission');
```

##### <a name="arrays_stripSpaces"></a> Method: `stripSpaces()`

```php
/**
 * Strip all whitespaces from the given string.
 */
public function stripSpaces(): self
```

**Examples**

```php
$string = Arrays::create('SG-1 returns from an off-world mission')->stripSpaces();
```

### Tests

Run tests

```
./vendor/bin/pest
```

### License
[The MIT License (MIT)](https://github.com/atomastic/arrays/blob/master/LICENSE.txt)
Copyright (c) 2020 [Sergey Romanenko](https://github.com/Awilum)
