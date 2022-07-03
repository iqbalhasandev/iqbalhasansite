<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            UserStatusSeeder::class,
            RoleTableSeeder::class,
            PortfolioSettingSeeder::class,
            SettingSeeder::class,
            PortfolioEducationSeeder::class,
            PortfolioExpertiseSeeder::class,
            PortfolioSkillSeeder::class,
            PortfolioFaqSeeder::class,
            PortfolioGallerySeeder::class,
            PortfolioClientSeeder::class,
            PortfolioServiceSeeder::class,
            PortfolioTestimonialSeeder::class,
            PageBuilderSeeder::class,
        ]);


        // $this->call([
        //     FourthSemesterResultSeeder::class,
        //     SixSemesterResultSeeder::class,
        //     EightSemesterResultSeeder::class,
        // ]);



        Artisan::call('optimize:clear');
    }
}
