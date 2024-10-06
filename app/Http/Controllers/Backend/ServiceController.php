<?php

namespace App\Http\Controllers\Backend;

use App\Authorizable;
use App\Helpers\Constant;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Userprofile;
use App\Rules\ArrayWithKeys;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
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
        $this->module_title = __('response.services');

        // module name
        $this->module_name = 'services';

        // directory path of the module
        $this->module_path = 'services';

        // module icon
        $this->module_icon = 'c-icon cil-people';

        // module model name, path
        $this->module_model = "App\Models\Service";
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

        return Datatables::of(Service::select('id', 'name', 'updated_at'))
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;

                return view('backend.includes.service_actions', compact('module_name', 'data'));
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

        return view(
            "backend.$module_name.create",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular')
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
            'name' => ['required'],
            'description' => ['required'],
            // 'name.*' => ['required', 'string'],
            // 'image' => ['required', 'file', 'mimes:png,jpg,jpeg'],
        ]);


        // if (isset($data['image']) && is_file($data['image'])) {
        //     $data['image'] = FileHelper::uploadFile($data['image'], 'services');
        // }

        Service::create($data);
        Flash::success('<i class="fas fa-check"></i> ' . __('response.created_Successfully'))->important();

        return redirect("ar/admin/$module_name");
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
        if (!auth()->user()->can('edit_services')) {
            abort(404);
        }

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Update';

        $data = $request->validate([
            'name'   => ['nullable'],
            'description' => ['required'],
            // 'name.*' => ['nullable', 'string'],
            // 'image'  => ['nullable', 'file', 'mimes:png,jpg,jpeg'],
        ]);

        // if (isset($data['image']) && is_file($data['image'])) {
        //     $data['image'] = FileHelper::uploadFile($data['image'], 'services');
        // }

        $$module_name_singular = Service::findOrFail($id);

        $$module_name_singular->update($data);

        Flash::success('<i class="fas fa-check"></i> ' . __('response.update_Successfully'))->important();

        return redirect("ar/admin/$module_name");
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

        return redirect("ar/admin/$module_name");
    }
}
