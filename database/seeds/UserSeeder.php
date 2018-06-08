<?php

use Illuminate\Database\Seeder;
use App\Role;
Use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //membuar role admin
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();

        //membuat role member
        $memberRole = new Role();
        $memberRole->name = "member";
        $memberRole->display_name = "Member";
        $memberRole->save();

        //membuat simple admin
        $admin = new User();
        $admin->name = "Admin";
        $admin->email = "admin@gmail.com";
        $admin->password = bcrypt('rahasia');
        $admin->save();
        $admin->attachRole($adminRole);

        //membuat simple member
        $member = new User();
        $member->name = "Sample member";
        $member->email = "member@gmail.com";
        $member->password = bcrypt('rahasia');
        $member->save();
        $member->attachRole($memberRole);


    }
}
