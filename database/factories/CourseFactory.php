<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Course;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'free' => rand(0, 1),
        'difficulty' => Arr::random(['beginner', 'intermediate', 'advanced']),
        'type' => Arr::random(['theory', 'project', 'snippet']),
    ];
});
