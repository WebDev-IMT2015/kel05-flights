<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $role=[
               [
                   'name' => 'admin',
                   'display_name' => 'Admin',
                   'description' => 'Manage Things'
               ],
               [
                   'name' => 'costumer-service',
                   'display_name' => 'Costumer Service',
                   'description' => 'Sell Things'
               ]

       ];


        foreach ($role as $key=>$value){
        	Role::create($value);
        }
    }
}
