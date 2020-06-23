<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
                    [
                        'role_id' => 1,
                        'model_type' => 'App\User',
                        'model_id' => 1
                    ],
                    [
                        'role_id' => 1,
                        'model_type' => 'App\User',
                        'model_id' => 2
                    ],
                    [
                        'role_id' => 1,
                        'model_type' => 'App\User',
                        'model_id' => 3
                    ],
                    [
                        'role_id' => 1,
                        'model_type' => 'App\User',
                        'model_id' => 4
                    ],
                    [
                        'role_id' => 1,
                        'model_type' => 'App\User',
                        'model_id' => 5
                    ],
                    [
                        'role_id' => 1,
                        'model_type' => 'App\User',
                        'model_id' => 6
                    ],
                    [
                        'role_id' => 2,
                        'model_type' => 'App\User',
                        'model_id' => 7
                    ],
                    [
                        'role_id' => 2,
                        'model_type' => 'App\User',
                        'model_id' => 8
                    ],
                    [
                        'role_id' => 2,
                        'model_type' => 'App\User',
                        'model_id' => 9
                    ],
                    [
                        'role_id' => 3,
                        'model_type' => 'App\User',
                        'model_id' => 10
                    ],
                ];
        // for($i=1; $i<=10;$i++){
        //     if( 1 <= $i && $i > 6){ // User
        //         $data[] = [
        //             'role_id' => 1,
        //             'model_type' => 'App\User',
        //             'model_id' => $i
        //         ];
        //     }else if(7 <= $i && $i>10){ //Specialist
        //         $data[] = [
        //             'role_id' => 2,
        //             'model_type' => 'App\User',
        //             'model_id' => $i
        //         ];
        //     } else { //Admin
        //         $data[] = [
        //             'role_id' => 3,
        //             'model_type' => 'App\User',
        //             'model_id' => $i
        //         ];
        //     }
          
        // }
        DB::table('model_has_roles')->insert($data);
    }
}
