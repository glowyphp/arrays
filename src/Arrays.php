<?php

declare(strict_types=1);

namespace Atomastic\Arrays;

use function array_key_first;
use function array_key_last;
use function array_keys;
use function array_merge;
use function array_reverse;
use function array_shift;
use function array_values;
use function array_walk_recursive;
use function arsort;
use function asort;
use function count;
use function defined;
use function explode;
use function function_exists;
use function http_build_query;
use function is_array;
use function is_null;
use function json_encode;
use function mb_strlen;
use function mb_strtolower;
use function mb_substr;
use function natsort;
use function preg_replace;
use function strpos;
use function strtolower;
use function strval;

use const JSON_PRESERVE_ZERO_FRACTION;
use const JSON_PRETTY_PRINT;
use const JSON_UNESCAPED_SLASHES;
use const JSON_UNESCAPED_UNICODE;
use const PHP_QUERY_RFC3986;
use const SORT_NATURAL;
use const SORT_REGULAR;

class Arrays
{
    /**
     * The underlying array items.
     *
     * @var array
     */
    protected $items = [];

    /**
     * Create a new arrayable object from the given elements.
     *
     * Initializes a Arrays object and assigns $items the supplied values.
     *
     * @param mixed $items Elements
     */
    public function __construct(array $items = [])
    {
        $this->items = (array) $items;
    }

    /**
     * Create a new arrayable object from the given elements.
     *
     * Initializes a Arrays object and assigns $items the supplied values.
     *
     * @param mixed $items Elements
     */
    public static function create(array $items = []): Arrays
    {
        return new Arrays($items);
    }

    /**
     * Set an array item to a given value using "dot" notation.
     *
     * If no key is given to the method, the entire array will be replaced.
     *
     * @param  string $key   Key
     * @param  mixed  $value Value
     */
    public function set(string $key, $value): self
    {
        $array = &$this->items;

        if (is_null($key)) {
            return $array = $value;
        }

        $segments = explode('.', $key);

        foreach ($segments as $i => $segment) {
            if (count($segments) === 1) {
                break;
            }

            unset($segments[$i]);

            if (! isset($array[$segment]) || ! is_array($array[$segment])) {
                $array[$segment] = [];
            }

            $array = &$array[$segment];
        }

        $array[array_shift($segments)] = $value;

        return $this;
    }

    /**
     * Checks if the given dot-notated key exists in the array.
     *
     * @param  string|array $keys Keys
     */
    public function has($keys): bool
    {
        $array = $this->items;

        $keys = (array) $keys;

        if (! $array || $keys === []) {
            return false;
        }

        foreach ($keys as $key) {
            $subKeyArray = $array;

            if (isset($array[$key])) {
                continue;
            }

            foreach (explode('.', $key) as $segment) {
                if (! is_array($subKeyArray) || ! isset($subKeyArray[$segment])) {
                    return false;
                }

                $subKeyArray = $subKeyArray[$segment];
            }
        }

        return true;
    }

    /**
     * Get an item from an array using "dot" notation.
     *
     * @param  string|int|null $key     Key
     * @param  mixed           $default Default value
     */
    public function get($key, $default = null)
    {
        $array = $this->items;

        if (! is_array($array)) {
            return $default;
        }

        if (is_null($key)) {
            return $array;
        }

        if (isset($array[$key])) {
            return $array[$key];
        }

        if (strpos($key, '.') === false) {
            return $array[$key] ?? $default;
        }

        foreach (explode('.', $key) as $segment) {
            if (! is_array($array) || ! isset($array[$segment])) {
                return $default;
            }

            $array = $array[$segment];
        }

        return $array;
    }

    /**
     * Deletes an array value using "dot notation".
     *
     * @param  array|string $keys Keys
     */
    public function delete($keys): self
    {
        $array = $this->items;

        $original = &$array;

        $keys = (array) $keys;

        if (count($keys) === 0) {
            return self;
        }

        foreach ($keys as $key) {
            if (isset($array[$key])) {
                unset($array[$key]);
                continue;
            }

            $segements = explode('.', $key);

            $array = &$original;

            while (count($segements) > 1) {
                $segement = array_shift($segements);

                if (! isset($array[$segement]) || ! is_array($array[$segement])) {
                    continue 2;
                }

                $array = &$array[$segement];
            }

            unset($array[array_shift($segements)]);
        }

        $this->items = $array;

        return $this;
    }

    /**
     * Expands a dot notation array into a full multi-dimensional array.
     */
    public function undot(): self
    {
        $array = $this->items;

        $this->items = [];

        foreach ($array as $key => $value) {
            $this->set($key, $value);
        }

        return $this;
    }

    /**
     * Flatten a multi-dimensional associative array with dots.
     *
     * @param  string $prepend Prepend string
     */
    public function dot(string $prepend = ''): self
    {
        $_dot = static function ($array, $prepend) use (&$_dot) {
            $results = [];

            foreach ($array as $key => $value) {
                if (is_array($value) && ! empty($value)) {
                    $results = array_merge($results, $_dot($value, $prepend . $key . '.'));
                } else {
                    $results[$prepend . $key] = $value;
                }
            }

            return $results;
        };

        $this->items = $_dot($this->items, $prepend);

        return $this;
    }

    /**
     * Flush all values from the array.
     */
    public function flush(): void
    {
        $this->items = [];
    }

    /**
     * Sorts a multi-dimensional associative array by a certain field.
     *
     * @param  string $key       The name of the key. Using "dot" notation
     * @param  string $direction Order type DESC (descending) or ASC (ascending)
     * @param  int    $sortFlags A PHP sort method flags.
     *                           https://www.php.net/manual/ru/function.sort.php
     */
    public function sortBy(string $key, string $direction = 'ASC', int $sortFlags = SORT_REGULAR): self
    {
        $array = $this->items;

        if (count($array) <= 0) {
            return self;
        }

        foreach ($array as $k => $row) {
            $helper[$k] = function_exists('mb_strtolower') ? mb_strtolower(strval(static::create($row)->get($key))) : strtolower(strval(static::create($row)->get($key)));
        }

        if ($sortFlags === SORT_NATURAL) {
            natsort($helper);
            ($direction === 'DESC') and $helper = array_reverse($helper);
        } elseif ($direction === 'DESC') {
            arsort($helper, $sortFlags);
        } else {
            asort($helper, $sortFlags);
        }

        foreach ($helper as $k => $val) {
            $result[$k] = $array[$k];
        }

        $this->items = $result;

        return $this;
    }

    /**
     * Get a value from the array, and remove it.
     *
     * @param  string $key     Key
     * @param  mixed  $default Default value
     */
    public function pull(string $key, $default = null)
    {
        $value = $this->get($key, $default);

        $this->delete($key);

        return $value;
    }

    /**
     * Divide an array into two arrays.
     * One with keys and the other with values.
     */
    public function divide(): array
    {
        return [array_keys($this->items), array_values($this->items)];
    }

    /**
     * Return the number of items in a given key.
     *
     * @param  int|string|null $key
     */
    public function count($key = null): int
    {
        return count($this->get($key));
    }

    /**
     * Check if the current array is equal to the given $array or not.
     *
     * @param array $array Array
     */
    public function isEqual(array $array): bool
    {
        return $this->toArray() === $array;
    }

    /**
     * Determines if an array is associative.
     */
    public function isAssoc(): bool
    {
        $keys = array_keys($this->toArray());

        return array_keys($keys) !== $keys;
    }

    /**
     *  Get all items from stored array.
     */
    public function all(): array
    {
        return $this->items;
    }

    /**
     * Get the first value from the current array.
     */
    public function first()
    {
        $key_first = $this->firstKey();

        if ($key_first === null) {
            return null;
        }

        return $this->get($key_first);
    }

    /**
     * Get the first key from the current array.
     */
    public function firstKey()
    {
        return array_key_first($this->toArray());
    }

    /**
     * Get the last value from the current array.
     */
    public function last()
    {
        $key_last = $this->lastKey();

        if ($key_last === null) {
            return null;
        }

        return $this->get($key_last);
    }

    /**
     * Get the last key from the current array.
     */
    public function lastKey()
    {
        return array_key_last($this->toArray());
    }

    /**
     * Convert the current array into a query string.
     */
    public function toQuery(): string
    {
        return http_build_query($this->items, '', '&', PHP_QUERY_RFC3986);
    }

    /**
     * Get all items from stored array and convert them to array.
     */
    public function toArray(): array
    {
        return $this->items;
    }

    /**
     * Convert the current array to JSON.
     *
     * @param int $options Bitmask consisting of encode options
     * @param int $depth   Encode Depth. Set the maximum depth. Must be greater than zero.
     */
    public function toJson(int $options = 0, int $depth = 512): string
    {
        $options = ($options ? 0 : JSON_UNESCAPED_UNICODE)
            | JSON_UNESCAPED_SLASHES
            | ($options ? JSON_PRETTY_PRINT : 0)
            | (defined('JSON_PRESERVE_ZERO_FRACTION') ? JSON_PRESERVE_ZERO_FRACTION : 0);

        $result = json_encode($this->toArray(), $options, $depth);

        if ($result === false) {
            return '';
        }

        return $result;
    }

    /**
     * Convert the current array to string recursively implodes an array with optional key inclusion.
     *
     * @param string $glue        Value that glues elements together.
     * @param bool   $includeKeys Include keys before their values.
     * @param bool   $trimAll     Trim ALL whitespace from string.
     */
    public function toString(string $glue = ',', bool $includeKeys = false, bool $trimAll = true): string
    {
        $string = '';

        $array = $this->toArray();

        // Recursively iterates array and adds key/value to glued string
        array_walk_recursive($array, static function ($value, $key) use ($glue, $includeKeys, &$string): void {
            $includeKeys and $string .= $key . $glue;
            $string                  .= $value . $glue;
        });

        // Removes last $glue from string
        mb_strlen($glue) > 0 and $string = mb_substr($string, 0, -mb_strlen($glue));

        // Trim ALL whitespace
        $trimAll and $string = preg_replace('/(\s)/ixsm', '', $string);

        return $string;
    }
}
