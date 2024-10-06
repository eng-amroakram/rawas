<?php

namespace App\Http\Controllers\Backend;

use App\Authorizable;
use App\Events\Backend\UserProfileUpdated;
use App\Events\Backend\UserUpdated;
use App\Exceptions\GeneralException;
use App\Helpers\Constant;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\Userprofile;
use App\Models\UserProvider;
use App\Rules\ArrayWithKeys;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Log;
use Yajra\DataTables\DataTables;

class ClientController extends Controller
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = __('response.clients');

        // module name
        $this->module_name = 'clients';

        // directory path of the module
        $this->module_path = 'clients';

        // module icon
        $this->module_icon = 'c-icon cil-people';

        // module model name, path
        $this->module_model = "App\Models\Client";
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

        $page_heading = ucfirst($module_title);
        $title = $page_heading . ' ' . ucfirst($module_action);

        $$module_name = $module_model::paginate();

        return view(
            "backend.$module_path.index_datatable",
            compact('module_title', 'module_name', "$module_name", 'module_path', 'module_icon', 'module_action', 'module_name_singular', 'page_heading', 'title')
        );
    }

    public function index_data()
    {
        $module_name = $this->module_name;
        $module_model = $this->module_model;

        $$module_name = $module_model::select('id', 'name', 'updated_at');
        $data = $$module_name;

        return Datatables::of(Client::select('id', 'name', 'updated_at'))
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;

                return view('backend.includes.client_actions', compact('module_name', 'data'));
            })
            ->editColumn('name', '<strong>{{$name}}</strong>')
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

    /**
     * Select Options for Select 2 Request/ Response.
     *
     * @return Response
     */
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

        // foreach ($query_data as $row) {
        //     $$module_name[] = [
        //         'id'   => $row->id,
        //         'text' => $row->name.' (Email: '.$row->email.')',
        //     ];
        // }

        return response()->json($$module_name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;

        $module_action = 'Details';

        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:191'],
            'logo' => ['required', new ArrayWithKeys(Constant::OUR_LANGUAGES)],
            'logo.*' => ['required', 'file', 'mimes:png,jpg,jpeg'],
        ]);

        if (isset($data['logo']) && count($data['logo'])) {
            $data['logo']['en'] = FileHelper::uploadFile($data['logo']['en'], 'clients');
            $data['logo']['ar'] = FileHelper::uploadFile($data['logo']['ar'], 'clients');
        }
        Client::create($data);
        Flash::success('<i class="fas fa-check"></i> '. __('response.created_Successfully'))->important();

        return redirect("admin/$module_name");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
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

        Log::info(label_case($module_title . ' ' . $module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return view(
            "backend.$module_name.show",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular", 'userprofile')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('edit_clients')) {
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

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->can('edit_clients')) {
            abort(404);
        }

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Update';

        $data = $request->validate([
            'name' => ['nullable', 'min:3', 'max:191'],
            'logo' => ['nullable', new ArrayWithKeys(Constant::OUR_LANGUAGES)],
            'logo.*' => ['nullable', 'file', 'mimes:png,jpg,jpeg'],
        ]);

        if ($request->hasFile('logo.en')) {
            $data['logo']['en'] = FileHelper::uploadFile($data['logo']['en'], 'clients');
        }
        if ($request->hasFile('logo.ar')) {
            $data['logo']['ar'] = FileHelper::uploadFile($data['logo']['ar'], 'clients');
        }

        $$module_name_singular = Client::findOrFail($id);

        $$module_name_singular->update($data);

        Flash::success('<i class="fas fa-check"></i> '. __('response.update_Successfully'))->important();

        return redirect("admin/$module_name");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $module_name = $this->module_name;
        $module_name_singular = Str::singular($this->module_name);
        $module_path = $this->module_path;
        $module_model = $this->module_model;

        $module_action = 'destroy';

        $$module_name_singular = $module_model::findOrFail($id);

        $$module_name_singular->delete();

        flash('<i class="fas fa-check"></i> ' . $$module_name_singular->name . ' ' . __('response.deleted_Successfully'))->success();

        return redirect("admin/$module_name");
    }

}
