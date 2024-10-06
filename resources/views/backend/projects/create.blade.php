@extends('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ $module_title }} @endsection

@section('breadcrumbs')
<x-backend-breadcrumbs>
    <x-backend-breadcrumb-item route='{{route("backend.$module_name.index")}}' icon='{{ $module_icon }}' >
        {{ $module_title }}
    </x-backend-breadcrumb-item>

    <x-backend-breadcrumb-item type="active">{{ __($module_action) }}</x-backend-breadcrumb-item>
</x-backend-breadcrumbs>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h4 class="card-title mb-0">
                    <i class="{{$module_icon}}"></i> {{ __('labels.backend.projects.index.title') }}
                    <small class="text-muted">{{ __('labels.backend.projects.create.action') }} </small>
                </h4>
                <div class="small text-muted">
                    {{ __('labels.backend.projects.index.sub-title') }}
                </div>
            </div>
            <!--/.col-->
            <div class="col-4">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                    <x-buttons.return-back />
                </div>
            </div>
            <!--/.col-->
        </div>
        <!--/.row-->

        <hr>

        <div class="row mt-4">
            <div class="col">

                {{ html()->form('POST', route('backend.projects.store'))->class('form-horizontal')->open() }}
                    {{ csrf_field() }}
                    
                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.title'))->class('col-sm-2 form-control-label')->for('title') }}
                        <div class="col-sm-10">
                            {{ html()->text('title')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.projects.fields.title'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div>
                    </div><!--form-group-->


                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.description'))->class('col-sm-2 form-control-label')->for('description') }}
                        <div class="col-sm-10">
                            {{ html()->textarea('description')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.projects.fields.description'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.company'))->class('col-sm-2 form-control-label')->for('company') }}
                        <div class="col-sm-10">
                            {{ html()->text('company')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.projects.fields.company'))
                                ->required() }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.start_at'))->class('col-sm-2 form-control-label')->for('start_at') }}
                        <div class="col-sm-10">
                            {{ html()->date('start_at')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.projects.fields.start_at'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.start_at'))->class('col-sm-2 form-control-label')->for('start_at') }}
                        <div class="col-sm-10">
                            {{ html()->date('start_at')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.projects.fields.start_at'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        
                        {{ html()->label(__('labels.backend.projects.fields.sector'))->class('col-sm-2 form-control-label')->for('sector') }}
                        <div class="col-sm-10">
                            {{ html()->text('sector')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.projects.fields.sector'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.roadmap'))->class('col-sm-2 form-control-label')->for('roadmap') }}
                        <div class="col-sm-10">
                            {{ html()->textarea('roadmap')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.projects.fields.roadmap'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.result'))->class('col-sm-2 form-control-label')->for('result') }}
                        <div class="col-sm-10">
                            {{ html()->textarea('result')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.projects.fields.result'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.includes'))->class('col-sm-2 form-control-label')->for('includes') }}
                        <div class="col-sm-10">
                            {{ html()->textarea('includes')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.projects.fields.includes'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.quote'))->class('col-sm-2 form-control-label')->for('quote') }}

                        <div class="col-sm-10">
                            {{ html()->text('quote')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.projects.fields.quote'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.quote_creator'))->class('col-sm-2 form-control-label')->for('quote_creator') }}

                        <div class="col-sm-10">
                            {{ html()->text('quote_creator')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.projects.fields.quote_creator'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div>
                    </div><!--form-group-->

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <?php
                                $required = "required";
                                ?>
                            {{ html()->label(__('labels.backend.projects.fields.image'))->class('col-sm-2 form-control-label')->for('image') }}
                                <div class="input-group mb-3">
                                    {{ html()->file('image')
                                        ->class('form-control')
                                        ->attributes([
                                            "$required",
                                            'aria-label' => 'Image',
                                            'aria-describedby' => 'button-image'
                                        ]) 
                                    }}
                                    <div class="input-group-append">
                                        <button class="btn btn-info" type="button" id="button-image">
                                            <i class="fas fa-folder-open"></i> @lang('Browse')
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <?php
                                $field_name = 'featured_images'; 
                                $field_label = __("article::$module_name.$field_name");
                                $field_placeholder = $field_label;
                                $required = "required";
                                ?>
                                {!! Form::label("$field_name", "$field_label") !!} {!! fielf_required($required) !!}
                                <div class="input-group mb-3">
                                    {{ html()->file($field_name)
                                        ->multiple()
                                        ->class('form-control')
                                        ->attributes([
                                            "$required",
                                            'aria-label' => 'Images',
                                            'aria-describedby' => 'button-images'
                                        ]) 
                                    }}
                                    <div class="input-group-append">
                                        <button class="btn btn-info" type="button" id="button-images">
                                            <i class="fas fa-folder-open"></i> @lang('Browse')
                                        </button>
                                    </div>
                                </div>
                                <small class="form-text text-muted">
                                    @lang('Select multiple images to upload.')
                                </small>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.status'))->class('col-6 col-sm-2 form-control-label')->for('status') }}

                        <div class="col-6 col-sm-10">
                            {{ html()->checkbox('status', true, '1') }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.confirmed'))->class('col-6 col-sm-2 form-control-label')->for('confirmed') }}

                        <div class="col-6 col-sm-10">
                            {{ html()->checkbox('confirmed', true, '1') }}
                        </div>
                    </div><!--form-group--> --}}

                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <x-buttons.create title="{{__('Create')}} {{ ucwords(Str::singular($module_name)) }}">
                                    {{__('Create')}}
                                </x-buttons.create>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="float-right">
                                <div class="form-group">
                                    <x-buttons.cancel />
                                </div>
                            </div>
                        </div>
                    </div>
                {{ html()->form()->close() }}

            </div>
        </div>

    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">

                </small>
            </div>
        </div>
    </div>
</div>


@push('after-styles')
<!-- File Manager -->
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endpush

@push ('after-scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('.select2-category').select2({
        theme: "bootstrap",
        placeholder: '@lang("Select an option")',
        minimumInputLength: 2,
        allowClear: true,
        ajax: {
            url: '{{route("backend.categories.index_list")}}',
            dataType: 'json',
            data: function (params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });

    $('.select2-tags').select2({
        theme: "bootstrap",
        placeholder: '@lang("Select an option")',
        minimumInputLength: 2,
        allowClear: true,
        ajax: {
            url: '{{route("backend.tags.index_list")}}',
            dataType: 'json',
            data: function (params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
});
</script>

<!-- Date Time Picker & Moment Js-->
<script type="text/javascript">
$(function() {
    $('.datetime').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        icons: {
            time: 'far fa-clock',
            date: 'far fa-calendar-alt',
            up: 'fas fa-arrow-up',
            down: 'fas fa-arrow-down',
            previous: 'fas fa-chevron-left',
            next: 'fas fa-chevron-right',
            today: 'far fa-calendar-check',
            clear: 'far fa-trash-alt',
            close: 'fas fa-times'
        }
    });
});
</script>

<script type="text/javascript" src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

<script type="text/javascript">

CKEDITOR.replace('includes', {filebrowserImageBrowseUrl: '/file-manager/ckeditor', language:'{{App::getLocale()}}', defaultLanguage: 'en'});

document.addEventListener("DOMContentLoaded", function() {

  document.getElementById('button-image').addEventListener('click', (event) => {
    event.preventDefault();

    window.open('/file-manager/fm-button', 'fm', 'width=800,height=600');
  });
});

// set file link
function fmSetLink($url) {
  document.getElementById('featured_image').value = $url;
}
</script>
@endpush


@endsection
