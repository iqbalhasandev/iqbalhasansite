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
                'image' => 'portfolio-testimonial/kdx8amefcB5GehRk0C0bL6SNvhunrjkfVCVNS8QQ.jpg',
                'name' => 'Moshiur Rahman ( Web Developer )',
                'quote' => 'Iqbal is a good and friendly developer. I got a lot of good service from his work.',
            ],
            [
                'image' => 'portfolio-testimonial/BvmGAWZW3KBaeG8WJDGPmy0i36INYqAi65xsCfFs.jpg',
                'name' => 'Ashif Iqbal (Web App and Networking Expert)',
                'quote' => 'He is diligent towards time. He projects on time, I like her habit a lot',
            ],
            [
                'image' => 'portfolio-testimonial/YyIFHoGPCM6ZNyrMCKipApiuCwqk3y43rJk5dDxL.jpg',
                'name' => 'Ariful Hasan Muaz ( Marketing expert )',
                'quote' => 'I like his work enough as every one of his projects is user friendly. And he is very diligent towards time',
            ],
            [
                'image' => 'portfolio-testimonial/EkKyzPyq9G6h7SVcyyPePRH3nr13h750nbUiGmBA.jpg',
                'name' => 'Khadiza Sweete ( Graphic Designer  )',
                'quote' => 'Without doubt one of the most talented programmers out there.  I always go back to Warren when I\'m out of my depth and he\'s never failed to deliver what I ask for.   Smart, trustworthy and professional.   You won\'t be disappointed.',
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
