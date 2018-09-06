<?php

use Faker\Generator as Faker;

$factory->define(App\Models\News::class, function (Faker $faker) {
    $is_published = rand(0,1);
    $published_at = null;
    if($is_published) $published_at = \Carbon\Carbon::now();
    return [
        'title' => $faker->sentence(rand(4,9)),
        'content' => $faker->paragraphs(rand(2,7), true),
        'published_at' => $published_at,
    ];
});
