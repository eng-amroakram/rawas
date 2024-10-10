<?php

namespace App\Http\Controllers\Backend;

use App\Authorizable;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Userprofile;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;
use Yajra\DataTables\DataTables;

class WorkController extends Controller
{
    use Authorizable;

    public $module_title = "";
    public $module_name = "";
    public $module_path = "";
    public $module_icon = "";
    public $module_model = "";

    public function __construct()
    {
        $this->module_title = "الاعمال";
        $this->module_name = 'works';
        $this->module_path = 'works';
        $this->module_icon = 'c-icon cil-people';
        $this->module_model = "App\Models\Work";
    }

    public function index(Project $project)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('response.list');

        $page_heading = ucfirst($module_title);
        $title = $page_heading . ' ' . ucfirst($module_action);

        $$module_name = Work::where('project_id', $project->id)->paginate();

        return view(
            "backend.$module_path.index_datatable",
            compact('module_title', 'module_name', "$module_name", 'module_path', 'module_icon', 'module_action', 'module_name_singular', 'page_heading', 'title', 'project')
        );
    }

    public function index_data(Project $project)
    {
        $module_name = $this->module_name;
        $module_model = $this->module_model;

        $$module_name = $module_model::select('id', 'title', 'sub_title', 'updated_at');
        $data = $$module_name;

        return Datatables::of(Work::select('id', 'title', 'sub_title', 'updated_at'))
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;

                return view('backend.includes.works_actions', compact('module_name', 'data'));
            })
            ->addColumn('name', function ($row) {
                return $row->name;
            })
            ->editColumn('updated_at', function ($data) {
                $module_name = $this->module_name;

                $diff = Carbon::now()->diffInHours($data->updated_at);

                if ($diff < 25) {
                    return $data->updated_at->diffForHumans();
                } else {
                    return $data->updated_at->isoFormat('LLLL');
                }
            })
            ->rawColumns(['name', 'action'])
            ->orderColumns(['id'], '-:column $1')
            ->make(true);
    }

    public function create(Project $project)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('response.create');

        return view(
            "backend.$module_name.create",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', 'project')
        );
    }

    public function store(Request $request)
    {
        $module_name = $this->module_name;

        $data = $request->validate([
            'title' => ['required'],
            'sub_title' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'file', 'mimes:png,jpg,jpeg'],
            'images' => ['required', 'array'],
            'project_id' => ['required', 'exists:projects,id']
        ]);

        if (isset($data['image']) && is_file($data['image'])) {
            $data['image'] = FileHelper::uploadFile($data['image'], 'works');
        }

        if (isset($data['images'])) {
            foreach ($data['images'] as $index => $image) {
                if (is_file($image)) {
                    $data['images'][$index] = FileHelper::uploadFile($image, 'works/images');
                }
            }
        }

        Work::create($data);
        Flash::success('<i class="fas fa-check"></i> ' . __('response.created_Successfully'))->important();

        return redirect("ar/admin/projects/$module_name/" . $data['project_id']);
    }

    public function show($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('response.show');

        $$module_name_singular = $module_model::findOrFail($id);
        $userprofile = Userprofile::where('user_id', $$module_name_singular->id)->first();

        return view(
            "backend.$module_name.show",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular", 'userprofile')
        );
    }

    public function edit($id)
    {
        if (!auth()->user()->can('edit_services')) {
            abort(404);
        }

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('response.edit');

        $$module_name_singular = $module_model::findOrFail($id);

        return view(
            "backend.$module_name.edit",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular")
        );
    }

    public function update(Request $request, $id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Update';

        $data = $request->validate([
            'title'   => ['required'],
            'sub_title'   => ['required'],
            'description' => ['required'],
            'image'  => ['nullable', 'file', 'mimes:png,jpg,jpeg'],
            'images'  => ['nullable', 'array'],
        ]);

        if (isset($data['image']) && is_file($data['image'])) {
            $data['image'] = FileHelper::uploadFile($data['image'], 'works');
        }

        if (isset($data['images'])) {
            foreach ($data['images'] as $index => $image) {
                if (is_file($image)) {
                    $data['images'][$index] = FileHelper::uploadFile($image, 'works/images');
                }
            }
        }

        $work = Work::findOrFail($id);

        $work->update($data);

        Flash::success('<i class="fas fa-check"></i> ' . __('response.update_Successfully'))->important();


        return redirect()->route('backend.projects.works', $work->project_id);
    }
}
