<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class IncidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $priority =["Urgent", "High", "Medium", "Low"];
        $statuss = ["выявлен", "в работе", "сделано"];

        $data = [];
        for($i=1; $i<=20;$i++){
            if( 1 <= $i && $i > 6){ // User
                $data[] = [
                    "title" => $faker->title,
                    "description" => $faker->realText($maxNbChars = 200, $indexSize = 2),
                    "image" => $faker->imageUrl($width = 640, $height = 480),
                    "priority" => $priority[random_int(0,3)],
                    "user_id"=> $i,
                    'comment' => '',
                    "status" => 'выявлен'
                ];
            }else if(7 <= $i && $i>10){ //Specialist
                $data[] = [
                    "title" => $faker->title,
                    "description" => $faker->realText($maxNbChars = 200, $indexSize = 2),
                    "image" => $faker->imageUrl($width = 640, $height = 480),
                    "priority" => $priority[random_int(0,3)],
                    "user_id"=> $i,
                    'comment' => '',
                    "status" => $statuss[random_int(1,2)]
                ];
            } else if($i !== 10 && $i>10 ) { //Admin
                $data[] = [
                    "title" => $faker->title,
                    "description" => $faker->realText($maxNbChars = 200, $indexSize = 2),
                    "image" => $faker->imageUrl($width = 640, $height = 480),
                    "priority" => $priority[random_int(0,3)],
                    "user_id"=> range(0,12),
                    'comment' => '',
                    "status" => 'выявлен'
                ];
            } 
        }
        DB::table('incidents')->insert($data);
  
    }
}
