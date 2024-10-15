<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $settings = [

            // GENERAL SETTINGS
            ['name' => 'system_name_ar', 'val' => 'نظام رواس', 'type' => 'text', 'group' => 'GENERAL_SETTINGS',],
            // ['name' => 'system_name_en', 'val' => 'text', 'type' => 'text', 'group' => 'GENERAL_SETTINGS',],
            ['name' => 'logo', 'val' => asset('img/preview.jpg'), 'type' => 'file', 'group' => 'GENERAL_SETTINGS',],
            ['name' => 'mail', 'val' => 'website@gmail.com', 'type' => '', 'group' => 'GENERAL_SETTINGS',],
            ['name' => 'video', 'val' => 'text', 'type' => '', 'group' => 'GENERAL_SETTINGS',],
            ['name' => 'phone_number', 'val' => '96657663447+', 'type' => '', 'group' => 'GENERAL_SETTINGS',],
            ['name' => 'whatsapp_number', 'val' => 'text', 'type' => '', 'group' => 'GENERAL_SETTINGS',],
            ['name' => 'facebook_url', 'val' => 'text', 'type' => '', 'group' => 'GENERAL_SETTINGS',],
            ['name' => 'x_url', 'val' => 'text', 'type' => '', 'group' => 'GENERAL_SETTINGS',],
            ['name' => 'linked_in_url', 'val' => 'text', 'type' => '', 'group' => 'GENERAL_SETTINGS',],
            ['name' => 'instagram_url', 'val' => 'text', 'type' => '', 'group' => 'GENERAL_SETTINGS',],

            // HERO SECTION
            ['name' => 'main_title_ar', 'val' => 'رواس للتسويق الرقمي', 'type' => 'text', 'group' => 'HERO_SECTION'],
            // ['name' => 'main_title_en','val' => 'Main Title','type' => 'text', 'group' => 'HERO_SECTION'],
            ['name' => 'description_ar', 'val' => 'نقدم لك تجربة عميل مرنة، لأننا نفهم بعمق احتياجاتك بخدمات التسويق وتنظيم الفعاليات', 'type' => '', 'group' => 'HERO_SECTION',],
            // ['name' => 'description_en', 'val' => 'text', 'type' => '', 'group' => 'HERO_SECTION',],
            ['name' => 'circle_text_ar', 'val' => 'شاهد احدث <br> انجازاتنا', 'type' => '', 'group' => 'HERO_SECTION',],
            // ['name' => 'circle_text_en', 'val' => 'text', 'type' => '', 'group' => 'HERO_SECTION',],
            // ['name' => 'year_of_experience', 'val' => 'text', 'type' => '', 'group' => 'HERO_SECTION',],
            // ['name' => 'experience_text_ar', 'val' => 'text', 'type' => '', 'group' => 'HERO_SECTION',],
            // ['name' => 'experience_text_en', 'val' => 'text', 'type' => '', 'group' => 'HERO_SECTION',],
            // ['name' => 'completed_project', 'val' => 'text', 'type' => '', 'group' => 'HERO_SECTION',],
            // ['name' => 'completed_project_text_ar', 'val' => 'text', 'type' => '', 'group' => 'HERO_SECTION',],
            // ['name' => 'completed_project_text_en', 'val' => 'text', 'type' => '', 'group' => 'HERO_SECTION',],
            ['name' => 'background_image', 'val' => asset('img/preview.jpg'), 'type' => 'file', 'group' => 'HERO_SECTION',],

            // ABOUT US
            ['name' => 'caption_ar',  'val' => ' تعرف علي رواس', 'type' => '', 'group' => 'ABOUT_US',],
            // ['name' => 'caption_en',       'val' => 'text', 'type' => '', 'group' => 'ABOUT_US',],
            ['name' => 'main_title_ar',    'val' => 'نحن شركاء في تحقيق رؤيتكم', 'type' => '', 'group' => 'ABOUT_US',],
            // ['name' => 'main_title_en',    'val' => 'text', 'type' => '', 'group' => 'ABOUT_US',],
            ['name' => 'description_ar',   'val' => 'شركة تسويقية في ابتكار حلول التسويق , وتطمح أن تكون الاولى عالمياً ومحلياً , في الاستثمار , نص تجريبي إضافي هنا تسويقية في ابتكار حلول التسويق , وتطمح أن تكون الاولى عالمياً ومحلياً , في الاستثمار والتسويق الرقميوالتسويق الرقمي شركة تسويقية في ابتكار حلول التسويق , وتطمح أن تكون الاولى عالمياً ومحلياً , في الاستثمار', 'type' => '', 'group' => 'ABOUT_US',],
            // ['name' => 'description_en',   'val' => 'text', 'type' => '', 'group' => 'ABOUT_US',],
            ['name' => 'button_text_ar',   'val' => 'text', 'type' => '', 'group' => 'ABOUT_US',],
            // ['name' => 'button_text_en',   'val' => 'text', 'type' => '', 'group' => 'ABOUT_US',],

            ['name' => 'feature_main_title_1',    'val' => 'تطوير استراتيجيات تسويقية', 'type' => '', 'group' => 'ABOUT_US',],
            ['name' => 'feature_main_title_2',    'val' => 'نحول رؤيتك الي نجاح', 'type' => '', 'group' => 'ABOUT_US',],
            ['name' => 'feature_description_1',   'val' => 'حن هنا لنكون شريك رحلتك، ونساعدك في تطوير استراتيجيات تسويقية وبناء علامة تجارية قوية لتحقيق نتائج استثنائية', 'type' => '', 'group' => 'ABOUT_US',],
            ['name' => 'feature_description_2',   'val' => 'دعم تكامل خدمات تخطيط وتنظيم الفعاليات والإنتاج المرئي لنحول رؤيتك إلى حقيقة مرئية.', 'type' => '', 'group' => 'ABOUT_US',],


            ['name' => 'image_one',     'val' => asset('assets/img/about/five/about-5-thumb-1.jpg'), 'type' => 'file', 'group' => 'ABOUT_US',],
            ['name' => 'image_two',     'val' => asset('assets/img/about/five/about-5-thumb-2.jpg'), 'type' => 'file', 'group' => 'ABOUT_US',],

            // OUR WORKS
            ['name' => 'main_title_ar', 'val' => 'text', 'type' => '', 'group' => 'OUR_WORK',],
            // ['name' => 'main_title_en', 'val' => 'text', 'type' => '', 'group' => 'OUR_WORK',],

            //OUR Service
            // ['name' => 'caption_ar', 'val' => 'text', 'type' => '', 'group' => 'OUR_SERVICE',],
            // // ['name' => 'caption_en', 'val' => 'text', 'type' => '', 'group' => 'OUR_SERVICE',],
            // ['name' => 'main_title_ar', 'val' => 'text', 'type' => '', 'group' => 'OUR_SERVICE',],
            // // ['name' => 'main_title_en', 'val' => 'text', 'type' => '', 'group' => 'OUR_SERVICE',],
            // ['name' => 'description_ar', 'val' => 'text', 'type' => '', 'group' => 'OUR_SERVICE',],
            // // ['name' => 'description_en', 'val' => 'text', 'type' => '', 'group' => 'OUR_SERVICE',],
            // ['name' => 'button_text_ar', 'val' => 'text', 'type' => '', 'group' => 'OUR_SERVICE',],
            // ['name' => 'button_text_en', 'val' => 'text', 'type' => '', 'group' => 'OUR_SERVICE',],

            //OUR Client
            // ['name' => 'main_title_ar', 'val' => 'text', 'type' => '', 'group' => 'OUR_CLIENTS',],
            // // ['name' => 'main_title_en', 'val' => 'text', 'type' => '', 'group' => 'OUR_CLIENTS',],
            // ['name' => 'button_text_ar', 'val' => 'text', 'type' => '', 'group' => 'OUR_CLIENTS',],
            // // ['name' => 'button_text_en', 'val' => 'text', 'type' => '', 'group' => 'OUR_CLIENTS',],
            // ['name' => 'button_link', 'val' => 'text', 'type' => '', 'group' => 'OUR_CLIENTS',],

            //FOOTER
            ['name' => 'location', 'val' => 'المملكة العربية السعوية - جدة- حي الرويس ', 'type' => '', 'group' => 'FOOTER'],
            ['name' => 'description_ar', 'val' => 'نص تجريبي لنبذة عن المؤسسة يكتب هنا نص تجريبي لتفاصيل التعريف بالمؤسسة يكتب هنا', 'type' => '', 'group' => 'FOOTER',],
            ['name' => 'logo', 'val' => asset('assets/img/logo/logo-black.png'), 'type' => 'file', 'group' => 'FOOTER',],
            // ['name' => 'button_text_en', 'val' => 'text', 'type' => '', 'group' => 'FOOTER',],
            ['name' => 'copyright_text_ar', 'val' => 'جميع الحقوق محفوظة لمؤسسة رواس 2024 ', 'type' => '', 'group' => 'FOOTER',],
            // ['name' => 'copyright_text_en', 'val' => 'text', 'type' => '', 'group' => 'FOOTER',],

        ];

        foreach ($settings as $setting) {

            Setting::updateOrCreate([
                'name' => $setting['name'],
                'group' => $setting['group'],
            ], $setting);
        }
    }
}
