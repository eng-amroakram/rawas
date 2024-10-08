<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Setting;

class FrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $body_class = '';
        $settings_records = Setting::whereIn('name', [
            'system_name_ar',
            'logo',
            'mail',
            'phone_number',
            'whatsapp_number',
            'facebook_url',
            'x_url',
            'linked_in_url',
            'instagram_url',
            'main_title_ar',
            'description_ar',
            'circle_text_ar',
            'background_image',
            'caption_ar',
            'feature_main_title_1',
            'feature_description_1',
            'feature_main_title_2',
            'feature_description_2',
            'image_one',
            'image_two',
            'location',
            'copyright_text_ar',
        ])->get(['name', 'val', 'group']);

        $settings = $settings_records->groupBy('group')->map(function ($group) {
            return $group->pluck('val', 'name');
        })->toArray();


        $services = Service::get(['name', 'description'])->toArray();
        $partners = Partner::get(['image'])->toArray();


        return view('frontend.index', compact('body_class', 'settings', 'services', 'partners'));
    }

    /**
     * Privacy Policy Page
     *
     * @return \Illuminate\Http\Response
     */
    public function privacy()
    {
        $body_class = '';
        return view('frontend.privacy', compact('body_class'));
    }

    /**
     * Terms & Conditions Page
     *
     * @return \Illuminate\Http\Response
     */
    public function terms()
    {
        $body_class = '';
        return view('frontend.terms', compact('body_class'));
    }

    public function contact()
    {
        $body_class = '';
        return view('frontend.contact', compact('body_class'));
    }
}
