<?php

namespace Database\Seeders;

use App\Models\Portfolio\PortfolioTestimonial;
use Illuminate\Database\Seeder;

class PortfolioTestimonialSeeder extends Seeder
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
                'image' => '0',
                'name' => 'Moshiur Rahman ( Web Developer )',
                'quote' => 'Iqbal is a good and friendly developer. I got a lot of good service from his work.',
            ],
            [
                'image' => '0',
                'name' => 'Ashif Iqbal (Web App and Networking Expert)',
                'quote' => 'He is diligent towards time. He projects on time, I like her habit a lot',
            ],
            [
                'image' => '0',
                'name' => 'Ariful Hasan Muaz ( Marketing expert )',
                'quote' => 'I like his work enough as every one of his projects is user friendly. And he is very diligent towards time',
            ]


        ];
        foreach ($data as  $item) {
            PortfolioTestimonial::create([
                'image' => $item['image'],
                'name'        => $item['name'],
                'quote'      => $item['quote'],
            ]);
        }
    }
}
