<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            PermissionRoleTableSeeder::class,
            RoleUserTableSeeder::class,
            DaysTableSeeder::class,
            CategorySeeder::class,
            DistrictSeeder::class,
            SectorSeeder::class,
            CellSeeder::class,

        ]);
    }
}
