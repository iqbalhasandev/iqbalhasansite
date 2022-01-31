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
                'value' => '["Designer","Developer"]',
                'details' => '["language":"json"]',
                'note'      => \null,
                'type' => 'code_editor',
                'order'        => 1,
                'group'        => 'About Us',
            ],  [
                'display_name' => 'Bio',
                'key'        => 'banner.details',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text_area',
                'order'        => 1,
                'group'        => 'Banner',
            ],

            [
                'display_name' => 'Button Scheme',
                'key' => 'banner.button',
                'value' => '{"Download CV":"#register"}',
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
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'image',
                'order'        => 1,
                'group'        => 'About Us',
            ],
            [
                'display_name' => 'Bio',
                'key'        => 'about_us.details',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text_area',
                'order'        => 1,
                'group'        => 'About Us',
            ],
            [
                'display_name' => 'Age',
                'key'        => 'about_us.age',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'About Us',
            ],

            [
                'display_name' => 'Degree',
                'key'        => 'about_us.degree',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'About Us',
            ],
            [
                'display_name' => 'Phone',
                'key'        => 'about_us.phone',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'About Us',
            ],

            [
                'display_name' => 'Email',
                'key'        => 'about_us.email',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'About Us',
            ],
            [
                'display_name' => 'Address',
                'key'        => 'about_us.address',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'About Us',
            ],
            [
                'display_name' => 'Button Scheme',
                'key' => 'about_us.button',
                'value' => '{"Download CV":"#register"}',
                'details' => '{"language":"json"}',
                'note'      => \null,
                'type' => 'code_editor',
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
