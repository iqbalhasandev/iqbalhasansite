<?php

namespace Database\Seeders;

use App\Models\Admin\UserStatus;
use Illuminate\Database\Seeder;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                'name' => 'Pending',
                'default' => true,


            ],
            [
                'name' => 'Active',
                'default' => false,

            ],
            [
                'name' => 'Suspend',
                'default' => false
            ]
        ];

        foreach ($status as $s) {
            UserStatus::create(['name' => $s['name'], 'default' => $s['default']]);
        }
    }
}
