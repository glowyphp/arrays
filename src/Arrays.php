<?php

declare(strict_types=1);

namespace Atomastic\Arrays;

use function array_chunk;
use function array_combine;
use function array_diff;
use function array_filter;
use function array_flip;
use function array_intersect;
use function array_intersect_assoc;
use function array_intersect_key;
use function array_key_first;
use function array_key_last;
use function array_keys;
use function array_map;
use function array_merge;
use function array_merge_recursive;
use function array_pad;
use function array_reduce;
use function array_replace;
use function array_replace_recursive;
use function array_reverse;
use function array_search;
use function array_shift;
use function array_slice;
use function array_unique;
use function array_unshift;
use function array_values;
use function array_walk;
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
use function json_decode;
use function json_encode;
use function mb_strlen;
use function mb_strtolower;
use function mb_substr;
use function mt_srand;
use function natsort;
use function preg_replace;
use function range;
use function shuffle;
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
use const SORT_STRING;

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
     * Create a new arrayable object from the given JSON string.
     *
     * @param string $input A string containing JSON.
     * @param bool   $assoc Decode assoc. When TRUE, returned objects will be converted into associative arrays.
     * @param int    $depth Decode Depth. Set the maximum depth. Must be greater than zero.
     * @param int    $flags Bitmask consisting of decode options
     */
    public static function createFromJson(string $input, bool $assoc = true, int $depth = 512, int $flags = 0): Arrays
    {
        return new Arrays(json_decode($input, $assoc, $depth, $flags));
    }

    /**
     * Create a new arrayable object from the given string.
     *
     * @param string $string    Input string.
     * @param string $separator Elements separator.
     */
    public static function createFromString(string $string, string $separator): Arrays
    {
        return new Arrays(explode($separator, $string));
    }

    /**
     * Create a new arrayable object with a range of elements.
     *
     * @param mixed $low  First value of the sequence.
     * @param mixed $high The sequence is ended upon reaching the end value.
     * @param int   $step If a step value is given, it will be used as the increment between elements in the sequence.
     *                    step should be given as a positive number. If not specified, step will default to 1.
     */
    public static function createWithRange($low, $high, int $step = 1): Arrays
    {
        return new Arrays(range($low, $high, $step));
    }

    /**
     * Reduce the array to a single value iteratively combining all values using $callback.
     *
     * @param callable   $callback Callback with ($carry, $item)
     * @param mixed|null $initial  If the optional initial is available,
     *                             it will be used at the beginning of the process,
     *                             or as a final result in case the array is empty.
     */
    public function reduce(callable $callback, $initial = null)
    {
        return array_reduce($this->items, $callback, $initial);
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
     * Return an array of all values stored array.
     */
    public function getValues()
    {
        return array_values($this->items);
    }

    /**
     * Alias of search() method. Search for a given item and return
     * the index of its first occurrence.
     *
     * @param mixed $needle The searched value.
     */
    public function indexOf($needle)
    {
        return $this->search($needle);
    }

    /**
     * Searches the array for a given value and returns the first corresponding key if successful.
     *
     * @param mixed $needle The searched value.
     */
    public function search($needle)
    {
        return array_search($needle, $this->items, true);
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
     * Push an item into the end of an array.
     *
     * @param mixed $value The new item to append
     */
    function append($value = null): self
    {
        $this->items[] = $value;

        return $this;
    }

    /**
     * Push an item into the beginning of an array.
     *
     * @param mixed $value The new item to append
     */
    function prepend($value = null): self
    {
        array_unshift($this->items, $value);

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
     * Sorts a associative array by a certain sub key.
     *
     * @param  string $subKey    The name of the sub key.
     * @param  string $direction Order type DESC (descending) or ASC (ascending)
     * @param  int    $sortFlags A PHP sort method flags.
     *                           https://www.php.net/manual/ru/function.sort.php
     */
    public function sortBySubKey(string $subKey, string $direction = 'ASC', int $sortFlags = SORT_REGULAR): self
    {
        $array = $this->items;

        if (count($array) <= 0) {
            return $this;
        }

        foreach ($array as $k => $row) {
            $helper[$k] = function_exists('mb_strtolower') ? mb_strtolower(strval(static::create($row)->get($subKey))) : strtolower(strval(static::create($row)->get($subKey)));
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
     * @param  int|string|null $key Key
     */
    public function count($key = null): int
    {
        return count($this->get($key));
    }

    /**
     * Check if the current array is equal to the given $array or not.
     *
     * @param array $array Array to check.
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
     * Create a chunked version of current array.
     *
     * @param int  $size         Size of each chunk.
     * @param bool $preserveKeys Whether array keys are preserved or no.
     */
    public function chunk(int $size, bool $preserveKeys = false): self
    {
         $this->items = array_chunk($this->items, $size, $preserveKeys);

        return $this;
    }

    /**
     * Create an array using the current array as keys and the other array as values.
     *
     * @param array $array Values array
     */
    public function combine(array $array): self
    {
        $this->items = array_combine($this->items, $array);

        return $this;
    }

    /**
     * Compute the current array values which not present in the given one.
     *
     * @param array $array Array for diff.
     */
    public function diff(array $array): self
    {
        $this->items = array_diff($this->items, $array);

        return $this;
    }

    /**
     * Filter the current array for elements satisfying the predicate $callback function.
     *
     * @param callable $callback The callback function.
     */
    public function filter(callable $callback): self
    {
        $this->items = array_filter($this->items, $callback);

        return $this;
    }

    /**
     * Exchanges all keys of current array with their associated values.
     */
    public function flip(): self
    {
        $this->items = array_flip($this->items);

        return $this;
    }

    /**
     * Compute the current array values which present in the given one.
     *
     * @param array $array Array for intersect.
     */
    public function intersect(array $array): self
    {
        $this->items = array_intersect($this->items, $array);

        return $this;
    }

    /**
     * Compute the current array values with additional index check.
     *
     * @param array $array Array for intersect.
     */
    public function intersectAssoc(array $array): self
    {
        $this->items = array_intersect_assoc($this->items, $array);

        return $this;
    }

    /**
     * Compute the current array using keys for comparison which present in the given one.
     *
     * @param array $array Array for intersect.
     */
    public function intersectKey(array $array): self
    {
        $this->items = array_intersect_key($this->items, $array);

        return $this;
    }

    /**
     * Apply the given $callback function to the every element of the current array,
     * collecting the results.
     *
     * @param callable $callback The callback function.
     */
    public function map(callable $callback): self
    {
        $this->items = array_map($callback, $this->items);

        return $this;
    }

    /**
     * Merge the current array with the provided one.
     *
     * @param array $array     Array to merge with (overwrites).
     * @param bool  $recursive Whether array will be merged recursively or no. Default is false.
     */
    public function merge(array $array, bool $recursive = false): self
    {
        if ($recursive) {
            $this->items = array_merge_recursive($this->items, $array);
        } else {
            $this->items = array_merge($this->items, $array);
        }

        return $this;
    }

    /**
     * Pad the current array to the specified size with a given value.
     *
     * @param int   $size  Size of the result array.
     * @param mixed $value Empty value by default.
     */
    public function pad(int $size, $value): self
    {
        $this->items = array_pad($this->items, $size, $value);

        return $this;
    }

    /**
     * Create a numerically re-indexed array based on the current array.
     */
    public function reindex(): self
    {
        $this->items = array_values($this->items);

        return $this;
    }

    /**
     * Replace values in the current array with values in the given one
     * that have the same key.
     *
     * @param array $array     Array of replacing values.
     * @param bool  $recursive Whether array will be replaced recursively or no. Default is false.
     */
    public function replace(array $array, bool $recursive = false): self
    {
        if ($recursive) {
            $this->items = array_replace_recursive($this->items, $array);
        } else {
            $this->items = array_replace($this->items, $array);
        }

        return $this;
    }

    /**
     * Reverse the values order of the current array.
     *
     * @param bool $preserveKeys Whether array keys are preserved or no. Default is false.
     */
    public function reverse(bool $preserveKeys = false): self
    {
        $this->items = array_reverse($this->items, $preserveKeys);

        return $this;
    }

    /**
     * Extract a slice of the current array.
     *
     * @param int      $offset       Slice begin index.
     * @param int|null $length       Length of the slice. Default is null.
     * @param bool     $preserveKeys Whether array keys are preserved or no. Default is false.
     */
    public function slice(int $offset, ?int $length = null, bool $preserveKeys = false): self
    {
        $this->items = array_slice($this->items, $offset, $length, $preserveKeys);

        return $this;
    }

    /**
     * Shuffle the given array and return the result.
     *
     * @param  int|null $seed An arbitrary integer seed value.
     */
    public function shuffle(?int $seed = null): self
    {
        $array = $this->items;

        if (is_null($seed)) {
            shuffle($array);
        } else {
            mt_srand($seed);
            shuffle($array);
            mt_srand();
        }

        $this->items = $array;

        return $this;
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

    /**
     * Remove duplicate values from the current array.
     *
     * @param int $sortFlags Sort flags used to modify the sorting behavior.
     *                       Sorting type flags:
     *                       https://www.php.net/manual/en/function.array-unique
     */
    public function unique(int $sortFlags = SORT_STRING): self
    {
        $this->items = array_unique($this->items, $sortFlags);

        return $this;
    }

    /**
     * Apply the given function to the every element of the current array,
     * discarding the results.
     *
     * @param bool $recursively Whether array will be walked recursively or no. Default is false.
     */
    public function walk(callable $callable, bool $recursive = false): self
    {
        if ($recursive) {
            array_walk_recursive($this->items, $callable);
        } else {
            array_walk($this->items, $callable);
        }

        return $this;
    }

    /**
     * Return slice of an array with just a given keys.
     *
     * @param array $keys List of keys to return.
     */
    public function only(array $keys): self
    {
        $this->items = array_intersect_key($this->items, array_flip($keys));

        return $this;
    }
}
