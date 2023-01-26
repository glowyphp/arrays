<a name="5.1.0"></a>
# [5.1.0](https://github.com/glowyphp/arrays) (2023-XX-XX)
* Added take() method.

<a name="5.0.0"></a>
# [5.0.0](https://github.com/glowyphp/arrays) (2022-07-03)
* Moving to PHP 8.1
* All Helpers functions are placed into the Glowy/Arrays namespace.

<a name="4.2.0"></a>
# [4.2.0](https://github.com/glowyphp/arrays) (2022-06-17)
* Added ability to compare unix timestamps in `where` method.

<a name="4.1.0"></a>
# [4.1.0](https://github.com/glowyphp/arrays) (2022-05-09)
* Added createFromQueryString() method.

<a name="4.0.0"></a>
# [4.0.0](https://github.com/glowyphp/arrays) (2021-12-23)
* Released under Glowy PHP Organization.
* Add PHP 8.1 support.
* Updated dependencies.

<a name="3.1.0"></a>
# [3.1.0](https://github.com/glowyphp/arrays) (2021-10-26)
* Use `getArray` for every methods and set default items value = null

<a name="3.0.5"></a>
# [3.0.5](https://github.com/glowyphp/arrays) (2021-08-02)
* Fixed except() method.

<a name="3.0.4"></a>
# [3.0.4](https://github.com/glowyphp/arrays) (2021-07-09)
* Fixed PHPstan tests

<a name="3.0.3"></a>
# [3.0.3](https://github.com/glowyphp/arrays) (2021-07-09)
* Fixed delete() method and improve tests

<a name="3.0.2"></a>
# [3.0.2](https://github.com/glowyphp/arrays) (2021-02-19)
* Fixed dependencies.

<a name="3.0.1"></a>
# [3.0.1](https://github.com/glowyphp/arrays) (2021-02-18)
* Fixed where() method.

<a name="3.0.0"></a>
# [3.0.0](https://github.com/glowyphp/arrays) (2021-02-18)
* move to PHP 7.4

<a name="2.2.0"></a>
# [2.2.0](https://github.com/glowyphp/arrays) (2020-12-10)
* Added whereIn() method.
* Added whereNotIn() method.
* Added whereBetween() method.
* Added whereNotBetween() method.
* Added whereLess() method.
* Added whereLessOrEqual() method.
* Added whereGreater() method.
* Added whereGreaterOrEqual() method.
* Added whereContains() method.
* Added whereNotContains() method.
* Added whereEqual() method.
* Added whereNotEqual() method.
* Added whereStartsWith() method.
* Added whereEndsWith() method.
* Added whereNewer() method.
* Added whereOlder() method.
* Added whereRegexp() method.
* Added whereNotRegexp() method.
* Added sortByDesc() method.
* Added sortByAsc() method.
* Added skip() method.
* Improved sortBy() method.

<a name="2.1.0"></a>
# [2.1.0](https://github.com/glowyphp/arrays) (2020-12-05)
* Added ability to extend Arrays class with Macros.

    ```php
    use Glowy\Arrays\Arrays;
    use Glowy\Macroable\Macroable;

    Arrays::macro('customMethod', function($arg1 = 1, $arg2 = 1) {
        return $this->count() + $arg1 + $arg2;
    });

    $arrays = new Arrays([1, 2, 3]);

    echo $arrays->customMethod(1, 2);
    echo $arrays->customMethod();
    ```

# [2.0.0](https://github.com/glowyphp/arrays) (2020-12-02)
* Added new operators added for where() method.

    Supported operators:
    ```
    in, nin, lt, <, lte,
    >, gt, gte, >=, contains, ncontains
    >=, <=, like, nlike, regexp, nregexp,
    eq, =, neq, !=, starts_with,
    ends_with, between, nbetween, older, newer
    ```

* Fixed issue in set() method with null key.
* Fixed combine() method when two arrays are different.
* rename sortBySubkey() method to sortBy() method.
* Improved combine() method.
* Improved tests for get() method.
* Improved tests for get() method.
* Improved tests for sort() method.
* Improved tests for first() method.
* Improved tests for last() method.
* Improved tests for random() method.
* Improved tests for sortBy() method.
* Improved tests workflow.

### BREAKING CHANGES

* USE sortBy() INSTEAD OF sortBySubkey() method.

<a name="1.3.0"></a>
# [1.3.0](https://github.com/glowyphp/arrays) (2020-11-15)
* Added where() method.
* Added dump() method.
* Added dd() method.
* Added extract() method.
* Added column() method.
* Added pipe() method.
* Added sum() method.
* Added every() method.
* Added product() method.
* general tests improvements.
* Added new requirements for php modules: ext-json and ext-mbstring.

<a name="1.2.0"></a>
# [1.2.0](https://github.com/glowyphp/arrays) (2020-11-11)
* Added offset() method.
* Added limit() method.
* Added copy() method.
* Added except() method.
* Added nth() method.
* Added offsetGet() method.
* Added offsetSet() method.
* Added offsetExists() method.
* Added offsetUnset() method.
* Added getIterator() method.
* Added protected getArray() method.
* Added phpstan.neon config file.
* Implemented ArrayAccess, ArrayIntegrator, Countable, IneratrorAggregate, Traversable.
* Improved create() method, add ability to path not only arrays inside.
* Improved flush() method - return self instead of void
* Improved filter() method - add ability to set $flag, default is ARRAY_FILTER_USE_BOTH
* Improved set() method. add ability to set $key as null.
* Fixed issue for get() method in cace if $key type is int provided.
* Fixed php doc sesction for all methods.
* Fixed return result for delete() method if count($keys) === 0
* Fixed combine() method error with not accept array|false.
* Fixed toString() method when result $string is null we should return empty string instead of null.


<a name="1.1.0"></a>
# [1.1.0](https://github.com/glowyphp/arrays) (2020-10-30)
* Added next() method.
* Added prev() method.
* Added current() method.
* Added groupBy() method.

<a name="1.0.0"></a>
# [1.0.0](https://github.com/glowyphp/arrays) (2020-10-03)
* Initial release
