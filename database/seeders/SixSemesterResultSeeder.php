<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BTEB\SixSemesterResult;

class SixSemesterResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        insert_result_seeder(file_get_contents(\storage_path('app/bteb-result/6th.txt')), '2018-19', '4th', new SixSemesterResult());
    }
}
