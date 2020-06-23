<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
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
                'name' => 'user',
                // 'guard_name' => 'web',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'name' => 'specialist',
                // 'guard_name' => 'web',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'name' => 'admin',
                // 'guard_name' => 'web',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ]
        ];
        DB::table('roles')->insert($data);
    }
}
