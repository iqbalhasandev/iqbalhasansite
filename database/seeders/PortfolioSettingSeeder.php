<?php

namespace Database\Seeders;

use App\Models\Portfolio\PortfolioSetting;
use Illuminate\Database\Seeder;

class PortfolioSettingSeeder extends Seeder
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
             * Banner Group
             *
             */

            [
                'display_name' => 'Image',
                'key'        => 'banner.image',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'image',
                'order'        => 1,
                'group'        => 'Banner',
            ],
            [
                'display_name' => 'Skill Clip',
                'key' => 'banner.skill_clip',
                'value' => '["Developer","Designer","Freelancer"]',
                'details' => '["language":"json"]',
                'note'      => \null,
                'type' => 'code_editor',
                'order'        => 1,
                'group'        => 'Banner',
            ],
            [
                'display_name' => 'Bio',
                'key'        => 'banner.details',
                'value'        => 'I am a student studying Diploma in Computer Engineering. I love working on various technologies in addition to my studies. I love coding and programming. I am currently working on web development for the last 3 years. And in addition to freelancing, I am contributing to various open source projects and packages.',
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text_area',
                'order'        => 1,
                'group'        => 'Banner',
            ],

            [
                'display_name' => 'Button Scheme',
                'key' => 'banner.button',
                'value' => '{"About Me":"#about-area","Hire Me":"#contact-area"}',
                'details' => '{"language":"json"}',
                'note'      => \null,
                'type' => 'code_editor',
                'order'        => 1,
                'group'        => 'Banner',
            ],

            /**
             *
             * About Us
             *
             */
            [
                'display_name' => 'Image',
                'key'        => 'about_us.image',
                'value'        => 'setting/9uw1CKE8bPa1AzOkj3YTco5oyHVYre3Em04un5xC.jpg',
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'image',
                'order'        => 1,
                'group'        => 'About Us',
            ],
            [
                'display_name' => 'Full Name',
                'key'        => 'about_us.name',
                'value'        => 'IQBAL HASAN',
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'About Us',
            ],
            [
                'display_name' => 'Nick Name',
                'key'        => 'about_us.nickname',
                'value'        => 'IQBAL',
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'About Us',
            ],
            [
                'display_name' => 'Bio',
                'key'        => 'about_us.details',
                'value'        => 'I am Iqbal Hasan. I am a student studying Diploma in Computer Engineering. I love working on various technologies in addition to my studies. I love coding and programming. I am currently working on web development for the last 3 years. And in addition to freelancing, I am contributing to various open source projects. I currently have more than 3 job experiences.',
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text_area',
                'order'        => 1,
                'group'        => 'About Us',
            ],
            [
                'display_name' => 'Skills',
                'key'        => 'about_us.skills',
                'value'        => 'Photoshop, JavaScript, PHP, HTML/CSS, Python, Vue',
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'About Us',
            ],
            [
                'display_name' => 'Birth Date',
                'key'        => 'about_us.birth_date',
                'value'        => '05 Dec 2001',
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'About Us',
            ],
            [
                'display_name' => 'Age',
                'key'        => 'about_us.age',
                'value'        => '20',
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'About Us',
            ],
            [
                'display_name' => 'Residence',
                'key'        => 'about_us.residence',
                'value'        => 'BD|Bangladesh',
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'About Us',
            ],
            [
                'display_name' => 'Freelance Status',
                'key'        => 'about_us.freelance_status',
                'value'        => 'Available',
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'About Us',
            ],
            [
                'display_name' => 'Degree',
                'key'        => 'about_us.degree',
                'value'        => 'Diploma Engineer',
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'About Us',
            ],
            [
                'display_name' => 'Phone',
                'key'        => 'about_us.phone',
                'value'        => '+8801762445377',
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'About Us',
            ],

            [
                'display_name' => 'Email',
                'key'        => 'about_us.email',
                'value'        => 'info@iqbalhasan.dev',
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'About Us',
            ],
            [
                'display_name' => 'Address',
                'key'        => 'about_us.address',
                'value'        => 'Rajshahi,Bangladesh-6210',
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'About Us',
            ],
            [
                'display_name' => 'Button Scheme',
                'key' => 'about_us.button',
                'value' => '{"Download CV":"https://iqbalhasan.dev/storage/settingjTYMU9ftgVgIXy72pnKoJteK6ZSVhYXT6Xdj0cp5.pdf","Hire Me":"#contact-area"}',
                'details' => '{"language":"json"}',
                'note'      => \null,
                'type' => 'code_editor',
                'order'        => 1,
                'group'        => 'About Us',
            ],
            [
                'display_name' => 'Mobile Menu Image',
                'key'        => 'about_us.mobile_menu_image',
                'value'        => 'setting/Ik7Z4QCDQS9bVBid3h0uhFOkJkGMCTNm0Lz74iKD.jpg',
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'image',
                'order'        => 1,
                'group'        => 'About Us',
            ],

            [
                'display_name' => 'Curriculum Vita',
                'key'        => 'about_us.curriculum_vita',
                'value'        => 'setting/ZQLLcghOQMvKvWHlajdvO9DPhHwFO9zSBK8GagKM.pdf',
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'file',
                'order'        => 1,
                'group'        => 'About Us',
            ],


        ];
        foreach ($data as  $item) {
            $setting = $this->findSetting($item['key']);
            if (!$setting->exists) {
                $setting->fill([
                    'display_name' => $item['display_name'],
                    'value'        => $item['value'],
                    'details'      => $item['details'],
                    'note'      => $item['note'],
                    'type'         => $item['type'],
                    'order'        => $item['order'],
                    'group'        => $item['group'],
                ])->save();
            }
        }
    }

    /**
     * [setting description].
     *
     * @param [type] $key [description]
     *
     * @return [type] [description]
     */
    protected function findSetting($key)
    {
        return PortfolioSetting::firstOrNew(['key' => $key]);
    }
}
