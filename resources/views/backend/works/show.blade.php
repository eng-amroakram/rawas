@extends ('backend.layouts.app')

@section('title')
    {{ $module_action }} {{ $module_title }}
@endsection

@section('breadcrumbs')
    <x-backend-breadcrumbs>
        <x-backend-breadcrumb-item route='{{ route("backend.$module_name.index") }}' icon='{{ $module_icon }}'>
            {{ $module_title }}
        </x-backend-breadcrumb-item>

        <x-backend-breadcrumb-item type="active">{{ $module_action }}</x-backend-breadcrumb-item>
    </x-backend-breadcrumbs>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title mb-0">
                        <i class="{{ $module_icon }}"></i> العمل
                        <small class="text-muted">{{ __('labels.backend.services.show.action') }} </small>
                    </h4>
                    <div class="small text-muted">
                        ادارة اعمال المشاريع
                    </div>
                </div>
            </div>
            <!--/.row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-hover">

                            <tr>
                                <th>{{ __('labels.backend.projects.fields.title') }}</th>
                                <td>{{ $work->title }}</td>
                            </tr>

                            <tr>
                                <th>{{ __('labels.backend.projects.fields.sub_title') }}</th>
                                <td>{{ $work->sub_title }}</td>
                            </tr>

                            <tr>
                                <th>{{ __('labels.backend.projects.fields.description') }}</th>
                                <td>{!! $work->description !!}</td>
                            </tr>

                            <tr>
                                <th>{{ __('labels.backend.projects.fields.image') }}</th>
                                <td><img src="{{ asset('storage/' . $work->image) }}"
                                        class="user-profile-image img-fluid img-thumbnail"
                                        style="max-height:200px; max-width:200px;" /></td>
                            </tr>

                            <tr>
                                <th>{{ __('labels.backend.projects.fields.images') }}</th>

                                <td>
                                    @foreach ($work->images as $image)
                                        <img src="{{ asset('storage/' . $image) }}"
                                            class="user-profile-image img-fluid img-thumbnail"
                                            style="max-height:200px; max-width:200px;" />
                                    @endforeach
                                </td>
                            </tr>

                        </table>
                    </div><!--/table-responsive-->

                </div><!--/col-->

            </div>
            <!--/.row-->
        </div>


        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                        Updated: {{ $work->updated_at->diffForHumans() }},
                        Created at: {{ $work->created_at->isoFormat('LLLL') }}
                    </small>
                </div>
            </div>
        </div>


    </div>
@endsection
