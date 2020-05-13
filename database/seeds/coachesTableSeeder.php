<?php

use Illuminate\Database\Seeder;
use App\Coach;
class coachesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coach = Coach::create([
         'name'=>"TheRock",
         'email' =>"joebelal71@gmail.com",
         'password' => 123 ,
         'age' => 35 ,
         'salary' => 7000
        ]);
        $coach4 = Coach::create([
            'name'=>"3adalawy",
            'email' =>"3dalawy@gmail.com",
            'password' => 123,
            'age' => 35 ,
            'salary' => 5000
           ]);
        $coach3 = Coach::create([
            'name'=>"cena",
            'email' =>"cena@gmail.com",
            'password' => 123 ,
            'age' => 38 ,
            'salary' => 6000
           ]);
    }
}
