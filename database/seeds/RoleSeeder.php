<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Section administrator',
                'postNews' => true,
                'isStaff' => true,
                'approveNews' => true,
                'moderate' => true,
                'promoteUsers' => true,
            ],
                [
                'name' => 'Editor',
                'isStaff' => true,
                'postNews' => true,
                'approveNews' => true,
                'moderate' => false,
                'promoteUsers' => false,
            ],
            [
                'name' => 'Newser',
                'isStaff' => true,
                'postNews' => true,
                'approveNews' => false,
                'moderate' => false,
                'promoteUsers' => false,
            ],
            [
                'name' => 'Moderator',
                'isStaff' => true,
                'postNews' => false,
                'approveNews' => false,
                'moderate' => true,
                'promoteUsers' => false,
            ],
            [
                'name' => 'User',
                'isStaff' => false,
                'postNews' => false,
                'approveNews' => false,
                'moderate' => false,
                'promoteUsers' => false,
            ],
        ];

        foreach($roles as $role)
            \App\Role::create($role);
    }
}

