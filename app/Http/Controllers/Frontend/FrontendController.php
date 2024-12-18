<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Work;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

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
            'video',
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
        $projects = Project::select(['id', 'title', 'sub_title', 'image'])->get();

        return view('frontend.index', compact('body_class', 'settings', 'services', 'partners', 'projects'));
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
        $settings_records = Setting::whereIn('name', [
            'system_name_ar',
            'logo',
            'mail',
            'video',
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

        $services = Service::select(['id', 'name'])->get();

        return view('frontend.contact', compact('body_class', 'settings', 'services'));
    }

    public function projects(Project $project)
    {
        $body_class = '';
        $settings_records = Setting::whereIn('name', [
            'system_name_ar',
            'logo',
            'mail',
            'video',
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

        return view('frontend.projects', compact('project', 'settings'));
    }

    public function work(Work $work)
    {
        $body_class = '';
        $settings_records = Setting::whereIn('name', [
            'system_name_ar',
            'logo',
            'mail',
            'video',
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

        $projects = Project::all();

        return view('frontend.works', compact('work', 'settings', 'projects'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:191'],
            'email' => ['nullable'],
            'phone' => ['required', 'min:3', 'max:10'],
            'service' => ['nullable'],
            'message' => ['nullable'],
            // 'logo' => ['required', new ArrayWithKeys(Constant::OUR_LANGUAGES)],
            // 'logo.*' => ['required', 'file', 'mimes:png,jpg,jpeg'],
        ]);

        // if (isset($data['logo']) && count($data['logo'])) {
        //     $data['logo']['en'] = FileHelper::uploadFile($data['logo']['en'], 'contacts');
        //     $data['logo']['ar'] = FileHelper::uploadFile($data['logo']['ar'], 'contacts');
        // }


        $data['email'] = "null";
        $data['service'] = "null";
        $data['message'] = "null";

        Contact::create($data);
        Flash::success('<i class="fas fa-check"></i> ' . __('response.created_Successfully'))->important();

        return redirect()->back();
        // return redirect("ar/admin/$module_name");
    }
}
