<?php

namespace Database\Seeders;

use App\Models\Portfolio\PortfolioClient;
use Illuminate\Database\Seeder;

class PortfolioClientSeeder extends Seeder
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
                'name' => 'Tornado Express BD',
                'logo' => 'portfolio-client/if4kPK4qwaM7tD6aIGxfwWeyvEOYB5iDYQs2U8BX.png',
                'site' => 'https://tornadoexpressbd.com/',
            ],
            [
                'name' => 'Kinoyee Express',
                'logo' => 'portfolio-client/7DJI8mw5xpjU1ExALxuJWfFSvC4yxyhSjOAMBxlV.png',
                'site' => 'https://kinoyeeexpress.com/',
            ],
            [
                'name' => 'বরেন্দ্র বহুমুখী উন্নয়ন কর্তৃপক্ষ',
                'logo' => 'portfolio-client/p91qoLpLp6QrRd4Z0aseaGcWRFivK8XPrDhiIUtB.png',
                'site' => 'https://bmda.info/',
            ],
            [
                'name' => 'Dev Zar',
                'logo' => 'portfolio-client/aCLIHYw0rioQZtWT6McGyK29pxGjbn5hngV3P0dE.png',
                'site' => 'https://devzar.com/',
            ],
            [
                'name' => 'Moumachi',
                'logo' => 'portfolio-client/Brxr4hqTaf8dgkk75ej9EUIhZ1N9SuxlKYwPqOU4.png',
                'site' => 'https://moumachi.biz/',
            ]

        ];
        foreach ($data as  $item) {
            PortfolioClient::create([
                'name' => $item['name'],
                'logo' => $item['logo'],
                'site' => $item['site'],
            ]);
        }
    }
}
