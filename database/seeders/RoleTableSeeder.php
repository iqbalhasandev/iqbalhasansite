<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin\Role;
use Illuminate\Database\Seeder;
use App\Models\Admin\Permission;
use Illuminate\Support\Facades\Hash;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions = [
            //User Status
            'user_status_management',
            //Role
            'user_role_management',
            //Permission
            'user_permission_management',
            //User
            'user_browse',
            'user_show',
            'user_create',
            'user_edit',
            'user_delete',
            // Setting
            'setting_management',
            'portfolio_management',
            'report_issue_management',
            'short_link_edit',
            'short_link_delete'
        ];

        $role = [
            'Administrator',
            'Manager',
            'Team Member',
            'Contributor',
            'Author',
        ];

        $Administrator = Role::create(['name' => 'Administrator']);
        $Manager = Role::create(['name' => 'Manager']);
        $Team_Member = Role::create(['name' => 'Team Member']);
        $Contributor = Role::create(['name' => 'Contributor']);
        $Author = Role::create(['name' => 'Author']);

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission])->assignRole($Administrator);
        }

        $Manager->givePermissionTo([]);
        $Team_Member->givePermissionTo([]);
        $Contributor->givePermissionTo([]);
        $Author->givePermissionTo([]);



        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@domain.com',
                'password' => Hash::make('admin'),
                'email_verified_at' => now(),
                'user_status_id' => 2
            ]
        ];
        foreach ($users as  $user) {
            User::create($user);
        }
        User::first()->assignRole('Administrator');
    }
}
