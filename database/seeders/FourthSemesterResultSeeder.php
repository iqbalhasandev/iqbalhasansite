<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BTEB\FourthSemesterResult;

class FourthSemesterResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        insert_result_seeder(file_get_contents(\storage_path('app/bteb-result/4th.txt')), '2019-20', '4th', new FourthSemesterResult());
    }
}
