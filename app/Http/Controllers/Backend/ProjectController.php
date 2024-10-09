<?php

namespace App\Http\Controllers\Backend;

use App\Authorizable;
use App\Events\Backend\UserCreated;
use App\Events\Backend\UserProfileUpdated;
use App\Events\Backend\UserUpdated;
use App\Exceptions\GeneralException;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use App\Models\Userprofile;
use App\Models\UserProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{
    use Authorizable;

    public $module_title = "";
    public $module_name = "";
    public $module_path = "";
    public $module_icon = "";
    public $module_model = "";

    public function __construct()
    {
        // Page Title
        $this->module_title = __('response.projects');

        // module name
        $this->module_name = 'projects';

        // directory path of the module
        $this->module_path = 'projects';

        // module icon
        $this->module_icon = 'c-icon cil-people';

        // module model name, path
        $this->module_model = "App\Models\Project";
    }


    public function works(Project $project)
    {
        dd($project);
    }


    public function index()
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

        $$module_name = $module_model::paginate();

        // Log::info("'$title' viewed by User:".auth()->user()->name.'(ID:'.auth()->user()->id.')');

        return view(
            "backend.$module_path.index_datatable",
            compact('module_title', 'module_name', "$module_name", 'module_path', 'module_icon', 'module_action', 'module_name_singular', 'page_heading', 'title')
        );
    }

    public function index_data()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $$module_name = $module_model::select('id', 'title', 'sub_title', 'updated_at');

        $data = $$module_name;

        return Datatables::of(Project::select('id', 'title', 'sub_title', 'updated_at'))
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;

                return view('backend.includes.project_actions', compact('module_name', 'data'));
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
            ->rawColumns(['title', 'sub_title'])
            ->orderColumns(['id'], '-:column $1')
            ->make(true);
    }


    public function index_list(Request $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $page_heading = label_case($module_title);
        $title = $page_heading . ' ' . label_case($module_action);

        $term = trim($request->q);

        if (empty($term)) {
            return response()->json([]);
        }

        $query_data = $module_model::where('title', 'LIKE', "%$term%")->limit(10)->get();

        $$module_name = [];

        foreach ($query_data as $row) {
            $$module_name[] = [
                'id'   => $row->id,
                'text' => $row->name . ' (Email: ' . $row->email . ')',
            ];
        }

        return response()->json($$module_name);
    }

    public function create()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = __('response.create');

        $roles = Role::get();
        $permissions = Permission::select('name', 'id')->get();

        return view(
            "backend.$module_name.create",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', 'roles', 'permissions')
        );
    }

    public function store(Request $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;

        $module_action = 'Details';

        $request['description'] = $request->includes;
        $request['images'] = $request->featured_images;

        $data = $request->validate([
            'title' => ['required'],
            'sub_title' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'file', 'mimes:png,jpg,jpeg'],
            // 'images' => ['required', 'array'],
        ]);

        if (isset($data['image']) && is_file($data['image'])) {
            $data['image'] = FileHelper::uploadFile($data['image'], 'projects');
        }

        // if (isset($data['images'])) {
        //     foreach ($data['images'] as $index => $image) {
        //         if (is_file($image)) {
        //             $data['images'][$index] = FileHelper::uploadFile($image, 'projects/images');
        //         }
        //     }
        // }

        // dd($data);

        Project::create($data);
        Flash::success('<i class="fas fa-check"></i> ' . __('response.created_Successfully'))->important();

        return redirect("ar/admin/$module_name");
    }

    public function show($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Show';

        $$module_name_singular = $module_model::findOrFail($id);
        $userprofile = Userprofile::where('user_id', $$module_name_singular->id)->first();

        Log::info(label_case($module_title . ' ' . $module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return view(
            "backend.$module_name.show",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular", 'userprofile')
        );
    }

    public function edit($id)
    {
        if (!auth()->user()->can('edit_projects')) {
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

        // $userRoles = $$module_name_singular->roles->pluck('name')->all();
        // $userPermissions = $$module_name_singular->permissions->pluck('name')->all();

        // $roles = Role::get();
        // $permissions = Permission::select('name', 'id')->get();

        // Log::info(label_case($module_title . ' ' . $module_action) . " | '" . $$module_name_singular->name . '(ID:' . $$module_name_singular->id . ") ' by User:" . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return view(
            "backend.$module_name.edit",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular")
        );
    }


    public function update(Request $request, $id)
    {
        if (!auth()->user()->can('edit_projects')) {
            abort(404);
        }

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Update';

        $data = $request->validate([
            'title' => 'required|min:3|max:191',
            'sub_title' => 'required|min:3|max:191',
            'description' => 'nullable|min:3|max:191',
            'image' => 'nullable',
        ]);

        if (isset($data['image']) && is_file($data['image'])) {
            $data['image'] = FileHelper::uploadFile($data['image'], 'projects');
        }

        $$module_name_singular = Project::findOrFail($id);

        $$module_name_singular->update($data);

        Flash::success("<i class='fas fa-check'></i> '" . Str::singular($module_title) . "' Updated Successfully")->important();

        return redirect("ar/admin/$module_name");
    }

    public function destroy($id)
    {
        if (auth()->user()->id == $id || $id == 1) {
            Flash::warning("<i class='fas fa-exclamation-triangle'></i> You can not delete this user!")->important();

            Log::notice(label_case($module_title . ' ' . $module_action) . ' Failed | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');
        }

        $module_name = $this->module_name;
        $module_name_singular = Str::singular($this->module_name);
        $module_path = $this->module_path;
        $module_model = $this->module_model;

        $module_action = 'destroy';

        $$module_name_singular = $module_model::findOrFail($id);

        $$module_name_singular->delete();

        event(new UserUpdated($$module_name_singular));

        flash('<i class="fas fa-check"></i> ' . $$module_name_singular->name . ' User Successfully Deleted!')->success();

        Log::info(label_case($module_action) . " '$module_name': '" . $$module_name_singular->name . ', ID:' . $$module_name_singular->id . " ' by User:" . auth()->user()->name);

        return redirect("admin/$module_name");
    }
}
