<?php

use Illuminate\Database\Seeder;
use App\Admin;
class adminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $admin =Admin::create([
        'name'=>"youssef",
        'email' =>"joebelal71@gmail.com",
        'password' => bcrypt(123)
       ]);


       $admin2=Admin::create([
        'name'=>"mostafa",
        'email' =>"mostafa@gmail.com",
        'password' =>bcrypt(123)
       ]);
       $admin3=Admin::create([
        'name'=>"sa3ed",
        'email' =>"sa3ed@gmail.com",
        'password' => bcrypt(123)
       ]);
    }
}
