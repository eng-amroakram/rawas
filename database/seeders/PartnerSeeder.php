<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partners = [
            [
                'name' => 'عسل عزران',
                'image' => 'partners/8.png'
            ],
            [
                'name' => 'عسل الرواد',
                'image' => 'partners/7.png'
            ],
            [
                'name' => 'مكارم الجود العقارية',
                'image' => 'partners/6.png'
            ],
            [
                'name' => 'منازل العز للتطوير العقاري',
                'image' => 'partners/5.png'
            ],
            [
                'name' => 'البراق الذهبي للتطوير العقاري',
                'image' => 'partners/4.png'
            ],
            [
                'name' => 'تاكنيكا',
                'image' => 'partners/3.jpeg'
            ],
            [
                'name' => 'SAAD OUD',
                'image' => 'partners/2.jpg'
            ],
            [
                'name' => 'Cats Houses',
                'image' => 'partners/1.jpg'
            ],

        ];

        foreach ($partners as $partner) {

            Partner::updateOrCreate([
                'name' => $partner['name'],
                'image' => $partner['image'],
            ], $partner);
        }
    }
}
