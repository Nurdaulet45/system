<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Model\Specialist;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Specialist::class, function (Faker $faker) {
    $role = ['admin', 'user', 'specialist'];
    return [
        'login' => $faker->name . "@system.kz",
        'first_name' => $faker->name,
        'last_name' => $faker->lastName,
        'middle_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'phone' => $faker->phoneNumber,
        'role' => $role[random_int(0,2)],  
        'password' => md5('password'), // password
        'remember_token' => Str::random(10),
    ];
});
