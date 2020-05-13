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
         'email' =>"test@gmail.com",
         'password' =>bcrypt(123),
         'age' => 35 ,
         'salary' => 7000
        ]);
        $coach4 = Coach::create([
            'name'=>"3adalawy",
            'email' =>"3dalawy@gmail.com",
            'password' => bcrypt(123),
            'age' => 35 ,
            'salary' => 5000
           ]);
        $coach3 = Coach::create([
            'name'=>"marwan",
            'email' =>"marwan@gmail.com",
            'password' => bcrypt(123),
            'age' => 38 ,
            'salary' => 6000
           ]);
           $coach2 = Coach::create([
            'name'=>"nerm",
            'email' =>"nerm@gmail.com",
            'password' => bcrypt(123),
            'age' => 76 ,
            'salary' => 6000
           ]);
           $coach4 = Coach::create([
            'name'=>"yasen",
            'email' =>"yasen@gmail.com",
            'password' => bcrypt(123),
            'age' => 38 ,
            'salary' => 6000
           ]);
           $coach5 = Coach::create([
            'name'=>"ahmed",
            'email' =>"ahmed@gmail.com",
            'password' => bcrypt(123),
            'age' => 21 ,
            'salary' => 4000
           ]);
           $coach6 = Coach::create([
            'name'=>"mohamed",
            'email' =>"mohamed@gmail.com",
            'password' => bcrypt(123),
            'age' => 53 ,
            'salary' => 6500
           ]);
           $coach7 = Coach::create([
            'name'=>"mena",
            'email' =>"mena@gmail.com",
            'password' => bcrypt(123),
            'age' => 32 ,
            'salary' => 6100
           ]);
           $coach8 = Coach::create([
            'name'=>"3adel shakal",
            'email' =>"AdelShakal@gmail.com",
            'password' => bcrypt(123),
            'age' => 38 ,
            'salary' => 1000000
           ]);
    }
}
