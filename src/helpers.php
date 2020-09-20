<?php

declare(strict_types=1);

use Atomastic\Arrays\Arrays;

if (! function_exists('arrays')) {
    /**
     * Create a new arrayable object from the given elements.
     *
     * Initializes a Arrays object and assigns $items the supplied values.
     *
     * @param mixed $items Elements
     */
    function arrays(array $items = []): Arrays
    {
        return new Arrays($items);
    }
}
