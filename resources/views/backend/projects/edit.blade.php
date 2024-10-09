@extends('backend.layouts.app')

@section('title')
    {{ __($module_action) }} {{ $module_title }}
@endsection

@section('breadcrumbs')
    <x-backend-breadcrumbs>
        <x-backend-breadcrumb-item route='{{ route("backend.$module_name.index") }}' icon='{{ $module_icon }}'>
            {{ $module_title }}
        </x-backend-breadcrumb-item>

        <x-backend-breadcrumb-item type="active">{{ __($module_action) }}</x-backend-breadcrumb-item>
    </x-backend-breadcrumbs>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title mb-0">
                        <i class="{{ $module_icon }}"></i> {{ __('labels.backend.projects.edit.title') }}
                        <small class="text-muted">{{ __('labels.backend.users.edit.action') }} </small>
                    </h4>
                    <div class="small text-muted">
                        {{ __('labels.backend.projects.edit.sub-title') }}
                    </div>
                </div>
                <!--/.col-->
                <div class="col-4">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                        <x-buttons.return-back />
                    </div>
                </div>
            </div>
            <hr>

            <div class="row mt-4">
                <div class="col">
                    {{ html()->modelForm($project, 'PATCH', route('backend.projects.update', $project->id))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.title'))->class('col-sm-2 form-control-label')->for('title') }}

                        <div class="col-sm-10">
                            {{ html()->text('title')->class('form-control')->value($project->title)->placeholder(__('labels.backend.projects.fields.title'))->attribute('maxlength', 191)->required() }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.sub_title'))->class('col-sm-2 form-control-label')->for('sub_title') }}

                        <div class="col-sm-10">
                            {{ html()->text('sub_title')->class('form-control')->value($project->sub_title)->placeholder(__('labels.backend.projects.fields.sub_title'))->attribute('maxlength', 191)->required() }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.description'))->class('col-sm-2 form-control-label')->for('description') }}
                        <div class="col-sm-10">
                            {{ html()->textarea('description')->class('form-control')->value($project->description)->placeholder(__('labels.backend.projects.fields.description'))->attribute('maxlength', 1000)->required() }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.image'))->class('col-sm-2 form-control-label')->for('image') }}
                        <div class="col-sm-10">
                            {{ html()->file('image')->class('form-control')->attribute('id', 'image')->required(false) }}

                            <!-- Current Arabic Logo Preview -->
                            <img id="image_preview" src="{{ asset('storage/' . $project->image) }}" alt="Image"
                                style="max-width: 200px; display:block; margin-top: 10px;" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {{ html()->submit($text = icon('fas fa-save') . ' Save')->class('btn btn-success') }}
                            </div>
                        </div>
                    </div>

                    {{ html()->closeModelForm() }}
                </div>
                <!--/.col-->
            </div>
            <!--/.row-->
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                        Updated: {{ $project->updated_at->diffForHumans() }},
                        Created at: {{ $project->created_at->isoFormat('LLLL') }}
                    </small>
                </div>
            </div>
        </div>
    </div>
@endsection
