<?php

namespace Database\Seeders;

use App\Models\BTEB\EightSemesterResult;
use Illuminate\Database\Seeder;

class EightSemesterResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        insert_result_seeder(file_get_contents(\storage_path('app/bteb-result/8th.txt')), '2017-18', '8th', new EightSemesterResult());
    }
}
