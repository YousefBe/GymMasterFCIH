<?php

use Illuminate\Database\Seeder;
use App\User;
Use App\Role;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $adminrole = Role::where('name','Admin')->first();
        $Coachrole = Role::where('name','Coach')->first();
        $Userrole = Role::where('name','User')->first();

        $admin = User::create([
            'name'=>'Admin' ,
            'email'=>'emails@email.com' ,
            'password' => bcrypt('admin')
        ]);
        $joe = User::create([
            'name'=>'Joe' ,
            'email'=>'Joebelal7@gmail.com' ,
            'password' => bcrypt('123')
        ]);
        $Coach = User::create([
            'name'=>'Coach' ,
            'email'=>'emailz@email.com' ,
            'password' => bcrypt('Coach')
        ]);

        $User = User::create([
            'name'=>'7lawa' ,
            'email'=>'emaoil@email.com' ,
            'password' => bcrypt('123')
        ]);

         $admin->roles()->attach($adminrole);
         $Coach->roles()->attach( $Coachrole);
         $User->roles()->attach($Userrole);
         $joe->roles()->attach($adminrole);

    }
}
