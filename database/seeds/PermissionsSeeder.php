<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
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
                'name' => 'users',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'name' => 'specialists',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d') 
            ],
            [
                'name' => 'incidents',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d') 
            ],
            [
                'name' => 'add_incident',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d') 
            ],
            [
                'name' => 'view_incident',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d') 
            ],
            [
                'name' => 'incident_in_work',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d') 
            ],
            [
                'name' => 'incident_done',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d') 
            ],
            [
                'name' => 'permissions',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d') 
            ],
            [
                'name' => 'roles',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d') 
            ],

        ];
        DB::table('permissions')->insert($data);
    }
}
