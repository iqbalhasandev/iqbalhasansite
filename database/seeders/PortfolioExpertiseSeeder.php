<?php

namespace Database\Seeders;

use App\Models\Portfolio\PortfolioExpertise;
use Illuminate\Database\Seeder;

class PortfolioExpertiseSeeder extends Seeder
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
                'name' => 'Epic It',
                'title' => 'Front-end Developer',
                'description' => 'I am a Front-end Developer at an IT company called EpicIt As was. There I contributed to various projects including student training',
                'start' => '2018',
                'end' => '2019',
            ],
            [
                'name' => 'Geomax IT',
                'title' => 'Senior PHP Developer',
                'description' => 'I was a senior PHP developer at an IT company called Geomax-It. There I completed a professional 5+ project.',
                'start' => '2019',
                'end' => '2021'
            ],
            [
                'name' => 'Dev-Zar',
                'title' => 'Junior VueJs Developer',
                'description' => 'I have been working with Vue js for over 2.5 year now and now I have more than 5+ professional project running.',
                'start' => '2020',
                'end' => 'present',
            ],
            [
                'name' => 'Dev-Zar',
                'title' => 'Laravel developer / Sr. Web App Develope',
                'description' => 'I have been working with Laravel for over 1 year now and I am currently running more than 10+ professional projects. I am currently with a virtual IT company called Dev-Zar. There I am working on Project Base Project',
                'start' => '2020',
                'end' => 'present',
            ],
            [
                'name' => 'Divine IT Limited',
                'title' => 'Python Developer Internship',
                'description' => 'ow Software Technology Parks Work, How They Build International Software to Keep Up with World Standards, How to Work in a Corporate Company. This is my small attempt to experience all these real experiences.',
                'start' => '2022',
                'end' => 'present',
            ],


        ];
        foreach ($data as  $item) {
            PortfolioExpertise::create([
                'name' => $item['name'],
                'title' => $item['title'],
                'start' => $item['start'],
                'end'  => $item['end'],
            ]);
        }
    }
}
