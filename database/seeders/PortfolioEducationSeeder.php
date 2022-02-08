<?php

namespace Database\Seeders;

use App\Models\Portfolio\PortfolioEducation;
use Illuminate\Database\Seeder;

class PortfolioEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            /**
             *
             *
             *
             */
            [
                'title' => 'Diploma in Computer Engineering',
                'description' => 'I am currently studying Computer Degree at Rajshahi Polytechnic Institute.',
                'start' => '2017',
                'end' => 'present',
            ],
            [
                'title' => 'Secondary School Certificate',
                'description' => 'I have completed my Secondary School Certificate examination from Nowhata Model High School. I got a GPA of 4.95 out of 5.',
                'start' => '2015',
                'end' => '2017',
            ],

        ];
        foreach ($data as  $item) {
            PortfolioEducation::create([
                'title' => $item['title'],
                'description'        => $item['description'],
                'start'      => $item['start'],
                'end'      => $item['end'],
            ]);
        }
    }
}
