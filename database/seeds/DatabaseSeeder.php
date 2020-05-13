<?php

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
        $this->call(adminsTableSeeder::class);
        $this->call(coachesTableSeeder::class);
        factory(App\User::class, 20)->create();
    }
}
