<?php

declare(strict_types=1);

use Atomastic\Arrays\Arrays;

if (! function_exists('arrays')) {
    /**
     * Create a new arrayable object from the given elements.
     *
     * Initializes a Arrays object and assigns $elements the supplied values.
     *
     * @param mixed $elements Elements
     */
    function arrays(array $elements = []): Arrays
    {
        return new Arrays($elements);
    }
}
