<?php

declare(strict_types = 1);

use Atomastic\Arrays\Arrays;

test('test create() method', function() {
    $this->assertEquals(new Arrays(), Arrays::create());
});

test('test arrays() helper', function() {
    $this->assertEquals(Arrays::create(), arrays());
});

test('test toArray() method', function() {
    $this->assertEquals(['SG-1', 'SG-2'], Arrays::create(['SG-1', 'SG-2'])->toArray());
});

test('test set() method', function() {
    $this->assertEquals(['stars' => ['Jack', 'Daniel', 'Sam']],
                        Arrays::create([])->set('stars', ['Jack', 'Daniel', 'Sam'])->toArray());
});

test('test get() method', function() {
    $this->assertEquals(['Jack', 'Daniel', 'Sam'],
                        Arrays::create(['stars' => ['Jack', 'Daniel', 'Sam']])->get('stars'));
    $this->assertEquals(['Jack', 'Daniel', 'Sam'],
                        Arrays::create(['film' => ['stars' => ['Jack', 'Daniel', 'Sam']]])->get('film.stars'));
    $this->assertEquals(['test'],
                        Arrays::create(['film' => ['stars' => ['Jack', 'Daniel', 'Sam']]])->get('film.scores', ['test']));
});

test('test has() method', function() {
    $this->assertTrue(Arrays::create(['film' => ['stars' => ['Jack', 'Daniel', 'Sam']]])->has('film.stars'));
    $this->assertFalse(Arrays::create(['film' => ['stars' => ['Jack', 'Daniel', 'Sam']]])->has('film.scores'));
});

test('test delete() method', function() {
    $this->assertTrue(Arrays::create(['film' => ['stars' => ['Jack', 'Daniel', 'Sam']]])->delete('film.stars'));
    //$this->assertFalse(Arrays::create(['film' => ['stars' => ['Jack', 'Daniel', 'Sam']]])->delete('film.scores'));
});
