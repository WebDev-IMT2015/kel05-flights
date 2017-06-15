<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $permissions=[
               [
                   'name' => 'user-read',
                   'display_name' => 'Display User Listing',
                   'description' => 'See only Listing Of User'
               ],
               [
                   'name' => 'user-create',
                   'display_name' => 'Create User',
                   'description' => 'Create New User'
               ],
               [
                   'name' => 'user-edit',
                   'display_name' => 'Edit User',
                   'description' => 'Edit User'
               ],
               [
                   'name' => 'user-delete',
                   'display_name' => 'Delete User',
                   'description' => 'Delete User'
               ],
               [
                   'name' => 'flight-list',
                   'display_name' => 'Display Flight Listing',
                   'description' => 'See only Listing Of Flight'
               ],
               [
                   'name' => 'flight-create',
                   'display_name' => 'Create Flight',
                   'description' => 'Create New Flight'
               ],
               [
                   'name' => 'flight-edit',
                   'display_name' => 'Edit Flight',
                   'description' => 'Edit Flight'
               ],
               [
                   'name' => 'flight-delete',
                   'display_name' => 'Delete Flight',
                   'description' => 'Delete Flight'
               ],
               [
                   'name' => 'ticket-create',
                   'display_name' => 'Create Ticket',
                   'description' => 'Create New Ticket'
               ],
               [
                   'name' => 'ticket-edit',
                   'display_name' => 'Edit Ticket',
                   'description' => 'Edit Ticket'
               ],
               [
                   'name' => 'ticket-delete',
                   'display_name' => 'Delete Ticket',
                   'description' => 'Delete Ticket'
               ],
               [
                   'name' => 'ticket-print',
                   'display_name' => 'Print Ticket',
                   'description' => 'Print Ticket'
               ],
               [
                   'name' => 'report-view',
                   'display_name' => 'View Report',
                   'description' => 'View Sales Report'
               ]

       ];


        foreach ($permissions as $key=>$value){
        	Permission::create($value);
        }
    }
}
