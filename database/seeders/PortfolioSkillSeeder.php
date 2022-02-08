<?php

namespace Database\Seeders;

use App\Models\Portfolio\PortfolioSkill;
use Illuminate\Database\Seeder;

class PortfolioSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Wireframe',
                'percentage' => '91',
            ],
            [
                'title' => 'Photoshop & Figma',
                'percentage' => '86',
            ],
            [
                'title' => 'Mockup Design',
                'percentage' => '80',
            ],
            [
                'title' => 'UI Design',
                'percentage' => '83',
            ],
            [
                'title' => 'Graphic Design',
                'percentage' => '66',
            ],
            [
                'title' => 'CSS',
                'percentage' => '95',
            ],
            [
                'title' => 'HTML',
                'percentage' => '97',
            ],
            [
                'title' => 'JavaScript',
                'percentage' => '89',
            ],
            [
                'title' => 'Vue Js',
                'percentage' => '90',
            ],
            [
                'title' => 'PHP',
                'percentage' => '83',
            ],
            [
                'title' => 'Laravel',
                'percentage' => '95',
            ]
        ];

        foreach ($data as  $item) {
            PortfolioSkill::create([
                'title' => $item['title'],
                'percentage' => $item['percentage'],
            ]);
        }
    }
}
