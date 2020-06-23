<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Incident;
use Faker\Generator as Faker;

$factory->define(Incident::class, function (Faker $faker) {
    $priority =["Urgent", "High", "Medium", "Low"];
    $statuss = ["выявлен", "в работе", "сделано", ];
    return [
        "title" => $faker->title,
        "description" => $faker->realText($maxNbChars = 200, $indexSize = 2),
        "image" => $faker->imageUrl($width = 640, $height = 480),
        "priority" => $priority[random_int(0,3)],
        "user_id"=> random_int(6,9),
        'comment' => $faker->realText($maxNbChars = 200),
        "status" => 'подтверждено',
        'created_at' => '2020-06-05',
        'updated_at' => '2020-06-'. random_int(10,23) //'2020-05-05 07:05' 
    ];
});
