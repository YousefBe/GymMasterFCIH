<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        role::create(['name'=>'Admin']);
        role::create(['name'=>'Coach']);
        role::create(['name'=>'User']);

    }
}
