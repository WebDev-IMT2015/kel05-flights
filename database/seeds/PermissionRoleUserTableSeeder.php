<?php

use App\Role;
use App\Permission;
use App\User;
use Illuminate\Database\Seeder;

class PermissionRoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission1 = new Permission;           
        $permission1->name = 'user-read';
        $permission1->display_name = 'Display User Listing';
        $permission1->description = 'See only Listing Of User';
        $permission1->save();

        $permission2 = new Permission;          
        $permission2->name = 'user-create';
        $permission2->display_name = 'Create User';
        $permission2->description = 'Create New User';
        $permission2->save();

        $permission3 = new Permission;        
        $permission3->name = 'user-edit';
        $permission3->display_name = 'Edit User';
        $permission3->description = 'Edit User';
        $permission3->save();

        $permission4 = new Permission;       
        $permission4->name = 'user-delete';
        $permission4->display_name = 'Delete User';
        $permission4->description = 'Delete User';
        $permission4->save();

        $permission5 = new Permission;       
        $permission5->name = 'flight-list';
        $permission5->display_name = 'Display Flight Listing';
        $permission5->description = 'See only Listing Of Flight';
        $permission5->save();

        $permission6 = new Permission;       
        $permission6->name = 'flight-create';
        $permission6->display_name = 'Create Flight';
        $permission6->description = 'Create New Flight';
        $permission6->save();

        $permission7 = new Permission;       
        $permission7->name = 'flight-edit';
        $permission7->display_name = 'Edit Flight';
        $permission7->description = 'Edit Flight';
        $permission7->save();

        $permission8 = new Permission;       
        $permission8->name = 'flight-delete';
        $permission8->display_name = 'Delete Flight';
        $permission8->description = 'Delete Flight';
        $permission8->save();

        $permission9 = new Permission;       
        $permission9->name = 'ticket-create';
        $permission9->display_name = 'Create Ticket';
        $permission9->description = 'Create New Ticket';
        $permission9->save();

        $permission10 = new Permission;      
        $permission10->name = 'ticket-edit';
        $permission10->display_name = 'Edit Ticket';
        $permission10->description = 'Edit Ticket';
        $permission10->save();

        $permission11 = new Permission;       
        $permission11->name = 'ticket-delete';
        $permission11->display_name = 'Delete Ticket';
        $permission11->description = 'Delete Ticket';
        $permission11->save();

        $permission12 = new Permission;       
        $permission12->name = 'ticket-print';
        $permission12->display_name = 'Print Ticket';
        $permission12->description = 'Print Ticket';
        $permission12->save();

        $permission13 = new Permission;       
        $permission13->name = 'report-view';
        $permission13->display_name = 'View Report';
        $permission13->description = 'View Sales Report';
        $permission13->save();

        $admin = new Role;
        $admin->name = 'admin';
        $admin->display_name = 'Admin';
        $admin->description = 'Manage Things';
        $admin->save();

        $cs = new Role;
        $cs->name = 'costumer-service';
        $cs->display_name = 'Costumer Service';
        $cs->description = 'Sell Things';
        $cs->save();

        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@super.com';
        $user->password = bcrypt('Admin');
        $user->save();

        $admin->attachPermissions(array($permission1, $permission2, $permission3, $permission4, $permission5, $permission6, $permission7, $permission8, $permission13));

        $cs->attachPermissions(array($permission9, $permission10, $permission11, $permission12));

        $user->attachRole($admin);
	}
}
