<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\FileHelper;
use Laracasts\Flash\Flash;

class SettingController extends Controller
{
    public $module_title = "";
    public $module_name = "";
    public $module_path = "";
    public $module_icon = "";
    public $module_model = "";

    public function __construct()
    {
        // Page Title
        $this->module_title = __('oa_menues.backend.sidebar.settings');

        // module name
        $this->module_name = 'settings';

        // directory path of the module
        $this->module_path = 'settings';

        // module icon
        $this->module_icon = 'fas fa-cogs';

        // module model name, path
        $this->module_model = "App\Models\Setting";
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('response.list');

        $$module_name = $module_model::paginate();
        // dd($module_name,$$module_name);

        return view(
            "backend.$module_path.index",
            compact('module_title', 'module_name', "$module_name", 'module_path', 'module_icon', 'module_action', 'module_name_singular')
        );
    }

    public function store(Request $request)
    {
        $settings = $request->except(['_token', 'method']);

        foreach ($settings['settings'] as $group => $fields) {
            foreach ($fields as $field => $value) {
                $type = 'text';
                if (is_file($value)) {
                    $value = url('storage/' . FileHelper::uploadFile($value, 'settings'));
                    $type = 'file';
                }

                Setting::updateOrCreate([
                    'name' => $field,
                    'group' => $group,
                ], [
                    'name' => $field,
                    'group' => $group,
                    'val' => $value,
                    'type' => $type,
                ]);
            }
        }
        Flash::success('<i class="fas fa-check"></i> ' . __('response.update_Successfully'))->important();

        return redirect()->back();
    }
}
