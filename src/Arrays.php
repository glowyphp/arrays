<?php

declare(strict_types=1);

namespace Atomastic\Arrays;

use function array_key_exists;
use function array_shift;
use function count;
use function explode;
use function is_array;
use function is_null;
use function strpos;

class Arrays
{
    /**
     * The underlying array elements.
     *
     * @var array
     */
    protected $elements = [];

    /**
     * Create a new arrayable object from the given elements.
     *
     * Initializes a Arrays object and assigns $elements the supplied values.
     *
     * @param mixed $elements Elements
     */
    public function __construct(array $elements = [])
    {
        $this->elements = (array) $elements;
    }

    /**
     * Create a new arrayable object from the given elements.
     *
     * Initializes a Arrays object and assigns $elements the supplied values.
     *
     * @param mixed $elements Elements
     */
    public static function create(array $elements = []): Arrays
    {
        return new Arrays($elements);
    }

    /**
     * Set an array item to a given value using "dot" notation.
     *
     * If no key is given to the method, the entire array will be replaced.
     *
     * @param  mixed $value
     */
    public function set(string $key, $value): self
    {
        $array = $this->elements;

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

        $this->elements = $array;

        return $this;
    }

    /**
     * Checks if the given dot-notated key exists in the array.
     *
     * @param  string|array  $keys
     */
    public function has($keys): bool
    {
        $array = $this->elements;

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
              if (is_array($subKeyArray) && isset($subKeyArray[$segment])) {
                  $subKeyArray = $subKeyArray[$segment];
              } else {
                  return false;
              }
          }
        }

        return true;
    }

    /**
     * Get an item from an array using "dot" notation.
     *
     * @param  string|int|null $key     Key
     * @param  mixed           $default Default
     */
    public function get($key, $default = null)
    {
        $array = $this->elements;

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
     * @param  array|string $keys
     */
    public function delete($keys): self
    {
        $array = $this->elements;

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

        $this->elements = $array;

        return $this;
    }

    /**
     * Expands a dot notation array into a full multi-dimensional array.
     */
    public function undot(): self
    {
        $array = $this->elements;
        //$this->elements = [];

        foreach ($array as $key => $value) {
            $this->set($key, $value);
        }

print_r($this->elements);
die();
        return $this;
    }

    /**
     * Flatten a multi-dimensional associative array with dots.
     *
     * @param  string $prepend Prepend string
     */
    public function dot(string $prepend = ''): self
    {
        $_dot = function ($array, $prepend) use (&$_dot) {
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

        $this->elements = $_dot($this->elements, $prepend);

        return $this;
    }

    /**
     * Convert the current array to a native PHP array.
     */
    public function toArray(): array
    {
        return $this->elements;
    }
}
