<?php

namespace Database\Seeders;



use App\Models\Admin\Setting\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
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
             * Site
             *
             */
            [
                'display_name' => 'Title',
                'key'        => 'site.title',
                'value'        => 'IQBAL HASAN',
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Description',
                'key'        => 'site.description',
                'value'        => "iqbalhasan.dev is a portfolio and multipurpose website. This website will be used primarily as a portfolio of IQBAL HASAN and will be used for public blogging, open source packages, free tutorials and client management through several subdomains.",
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text_area',
                'order'        => 2,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Site Url',
                'key'        => 'site.url',
                'value'        => 'https://iqbalhasan.dev',
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 3,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Logo Small',
                'key'        => 'site.logo_sm',
                'value'        => 'setting/c4MbQPJosb3g29aQa8bBtSYr7AaQ72YggoY2DK8G.png',
                'details'      => '[]',
                'note'      => "Default image size 120x61",
                'type'         => 'image',
                'order'        => 4,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Logo Light',
                'key'        => 'site.logo_light',
                'value'        => 'setting/Ax2YPbDLbhhbaef0N88qtRO1KUpXWW0Vd7nyqoPi.png',
                'details'      => '[]',
                'note'      => "Default image size 120x61",
                'type'         => 'image',
                'order'        => 5,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Logo Dark',
                'key'        => 'site.logo_dark',
                'value'        => 'setting/Z8XDiSfGPpadY5eSh3Ct3Umq34sgngP79CU3pjrx.png',
                'details'      => '[]',
                'note'      => "Default image size 120x61",
                'type'         => 'image',
                'order'        => 6,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Logo White',
                'key'        => 'site.logo.white',
                'value'        => 'setting/Ax2YPbDLbhhbaef0N88qtRO1KUpXWW0Vd7nyqoPi.png',
                'details'      => '[]',
                'note'      => "Default image size 120x61",
                'type'         => 'image',
                'order'        => 7,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Favicon',
                'key'        => 'site.favicon',
                'value'        => 'setting/c4MbQPJosb3g29aQa8bBtSYr7AaQ72YggoY2DK8G.png',
                'details'      => '[]',
                'note'      => "",
                'type'         => 'image',
                'order'        => 8,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Opening Time',
                'key'        => 'site.opening_time',
                'value'        => "",
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 9,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Phone',
                'key'        => 'site.phn',
                'value'        => "01762445377",
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 10,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Email',
                'key'        => 'site.email',
                'value'        => "info@iqbalhasan.dev",
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 11,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Address',
                'key'        => 'site.address',
                'value'        => "Rajshahi-6210, Bangladesh",
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 12,
                'group'        => 'Site',
            ],



            [
                'group' => 'Social',
                'key' => 'social.facebook',
                'display_name' => 'Facebook',
                'value' => 'https://www.facebook.com/iqbalhasan.dev',
                'type' => 'text',
                'details' => '{}',
                'note' => '[]',
                'order' => '1'
            ],
            [
                'group' => 'Social',
                'key' => 'social.twitter',
                'display_name' => 'Twitter',
                'value' => 'https://twitter.com/iqbalhasandev',
                'type' => 'text',
                'details' => '{}',
                'note' => '[]',
                'order' => '2'
            ],
            [
                'group' => 'Social',
                'key' => 'social.instagram',
                'display_name' => 'Instagram',
                'value' => 'https://www.instagram.com/iqbalhasan.dev',
                'type' => 'text',
                'details' => '{}',
                'note' => '[]',
                'order' => '3'
            ],
            [
                'group' => 'Social',
                'key' => 'social.linkedin',
                'display_name' => 'Linkedin',
                'value' => 'https://www.linkedin.com/in/iqbalhasandev',
                'type' => 'text',
                'details' => '{}',
                'note' => '[]',
                'order' => '4'
            ],
            [
                'group' => 'Social',
                'key' => 'social.github',
                'display_name' => 'Github',
                'value' => 'https://github.com/iqbalhasandev',
                'type' => 'text',
                'details' => '{}',
                'note' => '[]',
                'order' => '5'
            ],
            [
                'group' => 'Social',
                'key' => 'social.ask_fm',
                'display_name' => 'Ask fm',
                'value' => 'https://ask.fm/iqbalhasandev',
                'type' => 'text',
                'details' => '{}',
                'note' => '[]',
                'order' => '6'
            ],
            [
                'group' => 'Social',
                'key' => 'social.tumblr',
                'display_name' => 'Tumblr',
                'value' => 'https://iqbalhasandev.tumblr.com',
                'type' => 'text',
                'details' => '{}',
                'note' => '[]',
                'order' => '7'
            ],
            [
                'group' => 'Social',
                'key' => 'social.youtube',
                'display_name' => 'YouTube',
                'value' => 'https://www.youtube.com/channel/UC_cRoDLSVHe2nvJb6pjyF6A',
                'type' => 'text',
                'details' => '{}',
                'note' => '[]',
                'order' => '8',
            ],
            [
                'group' => 'Social',
                'key' => 'social.skype',
                'display_name' => 'Skype',
                'value' => 'live:iqbalhasan.dev',
                'type' => 'text',
                'details' => '{}',
                'note' => '[]',
                'order' => '9',
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
        return Setting::firstOrNew(['key' => $key]);
    }
}
