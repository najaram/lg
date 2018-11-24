<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'user_id'     => function () {
            return factory(App\User::class)->create()->id;
        },
        'title'       => $faker->sentence,
        'description' => $faker->text
    ];
});
