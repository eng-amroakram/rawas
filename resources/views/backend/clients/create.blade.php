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
                    <i class="{{$module_icon}}"></i> {{ __('labels.backend.clients.index.title') }}
                    <small class="text-muted">{{ __('labels.backend.clients.create.action') }} </small>
                </h4>
                <div class="small text-muted">
                    {{ __('labels.backend.clients.index.sub-title') }}
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

                {{ html()->form('POST', route('backend.clients.store'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
                    {{ csrf_field() }}
    
                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.clients.fields.name'))->class('col-sm-2 form-control-label')->for('name') }}
                        <div class="col-sm-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.clients.fields.name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.clients.fields.logo_ar'))->class('col-sm-2 form-control-label')->for('logo_ar') }}
                        <div class="col-sm-10">
                            {{ html()->file('logo[ar]')
                                ->class('form-control')
                                ->attribute('id', 'logo_ar')
                                ->required() }}
                
                            <!-- Image Preview -->
                            <img id="logo_ar_preview" src="" alt="Image Preview" style="max-width: 200px; display:none; margin-top: 10px;" />
                        </div>
                    </div><!--form-group-->
                
                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.clients.fields.logo_en'))->class('col-sm-2 form-control-label')->for('logo_en') }}
                        <div class="col-sm-10">
                            {{ html()->file('logo[en]')
                                ->class('form-control')
                                ->attribute('id', 'logo_en')
                                ->required() }}
                
                            <!-- Image Preview -->
                            <img id="logo_en_preview" src="" alt="Image Preview" style="max-width: 200px; display:none; margin-top: 10px;" />
                        </div>
                    </div><!--form-group-->


                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <x-buttons.create title="">
                                    {{__('response.save')}}
                                </x-buttons.create>
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
<!-- JavaScript for Image Preview -->
<script>
    // Preview for Arabic logo
    document.getElementById('logo_ar').addEventListener('change', function(event) {
        let logoArPreview = document.getElementById('logo_ar_preview');
        let file = event.target.files[0];
    
        if (file) {
            let reader = new FileReader();
    
            reader.onload = function(e) {
                logoArPreview.src = e.target.result;
                logoArPreview.style.display = 'block'; 
            }
    
            reader.readAsDataURL(file); 
        }
    });

    // Preview for English logo
    document.getElementById('logo_en').addEventListener('change', function(event) {
        let logoEnPreview = document.getElementById('logo_en_preview');
        let file = event.target.files[0];
    
        if (file) {
            let reader = new FileReader();
    
            reader.onload = function(e) {
                logoEnPreview.src = e.target.result;
                logoEnPreview.style.display = 'block'; 
            }
    
            reader.readAsDataURL(file); 
        }
    });
</script>
    
@endpush


@endsection
