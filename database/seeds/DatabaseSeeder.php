<?php

use App\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create();
        // factory(App\Model\Specialist::class, 10)->create();
        // factory(App\Model\Incident::class, 10)->create();

        $this->call(RoleSeeder::class);
        $this->call(ModelHasRoleSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(IncidentSeeder::class);
        factory(App\Model\Incident::class, 50)->create();

        $this->call(RoleHasPermissions::class);
    }
}
