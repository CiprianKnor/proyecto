<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Discussion;
use Faker\Generator as Faker;

$factory->define(Discussion::class, function (Faker $faker) {
    return [
        'user_id' => $this->faker->numberBetween(1,100),
        'title' => $this->faker->text(40),
        'content' => $this->faker->paragraph(),
        'reply_id' => $this->faker->numberBetween(0,0),
        'slug' => $this->faker->text(40),
        'channel_id' => $this->faker->numberBetween(1,5),
    ];
});
