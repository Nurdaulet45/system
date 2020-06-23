<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleHasPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for($i=1; $i<=10;$i++){
            if( 1 === $i ){ // User
                $data[] = [
                    'permission_id' => 4,
                    'role_id' => 1
                ];
                $data[] = [
                    'permission_id' => 5,
                    'role_id' => 1
                ];
            }else if(7 == $i){ //Specialist
                $data[] = [
                    'permission_id' => 6,
                    'role_id' => 2
                ];
                $data[] = [
                    'permission_id' => 7,
                    'role_id' => 2
                ];
            } else if($i==10)
             { //Admin
                    $data[] = [
                        'permission_id' => 1,
                        'role_id' => 3
                    ];
                    $data[] = [
                        'permission_id' => 2,
                        'role_id' => 3
                    ];
                    $data[] = [
                        'permission_id' => 3,
                        'role_id' => 3
                    ];
                    $data[] = [
                        'permission_id' => 8,
                        'role_id' => 3
                    ];
                    $data[] = [
                        'permission_id' => 9,
                        'role_id' => 3
                    ];
                }
                    
            }
            DB::table('role_has_permissions')->insert($data);

    }
}
