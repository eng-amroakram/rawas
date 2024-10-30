<?php

namespace App\Http\Controllers\Backend;

use App\Authorizable;
use App\Helpers\Constant;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Userprofile;
use App\Rules\ArrayWithKeys;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;
use Log;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
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
        $this->module_title = __('response.contacts');

        // module name
        $this->module_name = 'contacts';

        // directory path of the module
        $this->module_path = 'contacts';

        // module icon
        $this->module_icon = 'c-icon cil-people';

        // module model name, path
        $this->module_model = "App\Models\Contact";
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

        return view(
            "backend.$module_path.index_datatable",
            compact('module_title', 'module_name', "$module_name", 'module_path', 'module_icon', 'module_action', 'module_name_singular', 'page_heading', 'title')
        );
    }

    public function index_data()
    {
        $module_name = $this->module_name;
        $module_model = $this->module_model;

        $$module_name = $module_model::select('id', 'name', 'email', 'phone', 'message', 'updated_at');
        $data = $$module_name;

        return Datatables::of(Contact::select('*'))
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;

                return view('backend.includes.contact_actions', compact('module_name', 'data'));
            })
            ->editColumn('name', '<strong>{{$name}}</strong>')
            // ->addColumn('service', function ($row) {
            //     return $row->service->name;
            // })
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


        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:191'],
            'email' => ['min:3', 'max:191'],
            'phone' => ['required', 'min:3', 'max:10'],
            'service' => ['min:3', 'max:191'],
            'message' => ['min:3', 'max:350'],
            // 'logo' => ['required', new ArrayWithKeys(Constant::OUR_LANGUAGES)],
            // 'logo.*' => ['required', 'file', 'mimes:png,jpg,jpeg'],
        ]);

        // if (isset($data['logo']) && count($data['logo'])) {
        //     $data['logo']['en'] = FileHelper::uploadFile($data['logo']['en'], 'contacts');
        //     $data['logo']['ar'] = FileHelper::uploadFile($data['logo']['ar'], 'contacts');
        // }

        Contact::create($data);
        Flash::success('<i class="fas fa-check"></i> ' . __('response.created_Successfully'))->important();

        return redirect()->back();
        // return redirect("ar/admin/$module_name");
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
        if (!auth()->user()->can('edit_contacts')) {
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
        if (!auth()->user()->can('edit_contacts')) {
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
            $data['logo']['en'] = FileHelper::uploadFile($data['logo']['en'], 'contacts');
        }
        if ($request->hasFile('logo.ar')) {
            $data['logo']['ar'] = FileHelper::uploadFile($data['logo']['ar'], 'contacts');
        }

        $$module_name_singular = Contact::findOrFail($id);

        $$module_name_singular->update($data);

        Flash::success('<i class="fas fa-check"></i> ' . __('response.update_Successfully'))->important();

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

        flash('<i class="fas fa-check"></i> ' . $$module_name_singular->name . ' User Successfully Deleted!')->success();

        return redirect("admin/$module_name");
    }
}
