<?php

namespace Database\Seeders;

use App\Models\Portfolio\PortfolioService;
use Illuminate\Database\Seeder;

class PortfolioServiceSeeder extends Seeder
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
                'title' => 'Customizable CMS',
                'description' => 'We do various customized CMS. We do various customized projects according to user and client requirements.',
                'image' => 'portfolio-service/g6muqAeU3ikfd61XOP7nbrColjtbsDP9k44o4Frd.jpg',
            ],
            [
                'title' => 'Open source package',
                'description' => 'I contribute to various open source projects. If you want to contribute to an open source project, you can knock me.',
                'image' => 'portfolio-service/Tvud3ejpFAYsesTW0ePw4538ytlEVTAV2k95l4V1.png',
            ],
            [
                'title' => 'Real time chat application',
                'description' => 'We do various real name set application development.',
                'image' => 'portfolio-service/wDq6cE6Nqd1LDFL09UhrZeVLQ8akAFHIpWDXqIkg.png',
            ],
            [
                'title' => 'Software Solutions',
                'description' => 'We provide different web software. We do different software according to the client\'s requirement.',
                'image' => 'portfolio-service/ZQSnmhBwjzQ2qkmQdSdqPE3wlzz1AtbDOQqmmxIM.jpg',
            ],
            [
                'title' => 'School Management',
                'description' => 'We provide various school management software. We provide user friendly software with user and client in mind.',
                'image' => 'portfolio-service/kNnRuhGmsV3Qke6yyPz13F0ix5JkchUrZgRcEAvr.png',
            ],
            [
                'title' => 'Corporate Solution',
                'description' => 'We provide various software required for corporate. We provide various user friendly software keeping in mind the user and the client',
                'image' => 'portfolio-service/ngdqUr08DG6OW8sA4aXz4CrNu8yRa9QHI8gvyjmT.webp',
            ]
        ];
        foreach ($data as  $item) {
            PortfolioService::create([
                'title' => $item['title'],
                'description' => $item['description'],
                'image' => $item['image'],
            ]);
        }
    }
}
