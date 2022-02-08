<?php

namespace Database\Seeders;

use App\Models\Portfolio\PortfolioGallery;
use Illuminate\Database\Seeder;

class PortfolioGallerySeeder extends Seeder
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
                'image' => 'portfolio-gallery/HCYO48r1lLEQ6fT2lAwwCIQsl5PGDTN6KkwQa1jN.jpg',
                'caption' => 'moumachi.biz Brings Fresh & 100% Pure RAW Honey to You From Our Own Bee Farm.',
                'url' => 'https://moumachi.biz/',
                'group' => 'E-commerce',
            ],
            [
                'image' => 'portfolio-gallery/1oQ52cu8f6JtAYN2G7bM5mk0Hb9Dw9mD5cHfur73.jpg',
                'caption' => 'Our Devzar Team successfully completed the pixelsbd\'s E-commerce project. Thanks to Pixels Computer for giving us the opportunity to do their work',
                'url' => 'https://pixelsbd.com/',
                'group' => 'E-commerce',
            ],
            [
                'image' => 'portfolio-gallery/bEbmFJyp0IIy6HjPDbPoR93xeAMWADDWi2yK68Ec.jpg',
                'caption' => NULL,
                'url' => 'https://bmda.info/',
                'group' => 'Web App',
            ]

        ];
        foreach ($data as  $item) {
            PortfolioGallery::create([
                'image' => $item['image'],
                'caption' => $item['caption'],
                'url' => $item['url'],
                'group' => $item['group'],
            ]);
        }
    }
}
