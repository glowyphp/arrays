<?php

declare(strict_types=1);

namespace Atomastic\Arrays;

use function array_key_exists;
use function array_shift;
use function count;
use function explode;
use function is_array;
use function is_null;

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
     * @param  mixed $key Key
     */
    public function has($key): bool
    {
        $array = $this->elements;

        $segments = explode('.', $key);

        foreach ($segments as $segment) {
            if (! is_array($array) or ! array_key_exists($segment, $array)) {
                return false;
            }

            $array = $array[$segment];
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
            if (is_array($array) && isset($array[$segment])) {
                $array = $array[$segment];
            } else {
                return $default;
            }
        }

        return $array;
    }

    /**
     * Deletes an array value using "dot notation".
     *
     * @param  string $key Key
     */
    public function delete(string $key): bool
    {
        $array = $this->elements;

        $segments = explode('.', $key);

        while (count($segments) > 1) {
            $segment = array_shift($segments);

            if (! isset($array[$segment]) || ! is_array($array[$segment])) {
                return false;
            }

            $array =& $array[$segment];
        }

        unset($array[array_shift($segments)]);

        return true;
    }

    /**
     * Convert the current array to a native PHP array.
     */
    public function toArray(): array
    {
        return $this->elements;
    }
}
