<?php

namespace Database\Seeders;

use App\Models\Portfolio\PortfolioFaq;
use Illuminate\Database\Seeder;

class PortfolioFaqSeeder extends Seeder
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
                'question' => 'What\'s Your Name?',
                'answer' => 'My Name is IQBAL HASAN.',
            ],
            [
                'question' => 'Where are you from ?',
                'answer' => 'I\'m from Rajshahi,Bangladesh-6210',
            ]
        ];
        foreach ($data as  $item) {
            PortfolioFaq::create([
                'question' => $item['question'],
                'answer' => $item['answer'],
            ]);
        }
    }
}
