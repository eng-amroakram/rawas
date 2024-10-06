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
            <div class="col-8">
                {{-- <h4 class="card-title mb-0">
                    <i class="{{$module_icon}}"></i> {{ __('labels.backend.clients.edit.title') }}
                    <small class="text-muted">{{ __('labels.backend.clients.edit.action') }} </small>
                </h4> --}}
                <div class="small text-muted">
                    {{ __('labels.backend.clients.edit.sub-title') }}
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
                {{ html()->modelForm($client, 'PATCH', route('backend.clients.update', $client->id))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.clients.fields.name'))->class('col-sm-2 form-control-label')->for('name') }}

                        <div class="col-sm-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.clients.fields.email'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div>
                    </div><!--form-group-->

                    <!-- Arabic Logo -->

                  <div class="form-group row">
                    {{ html()->label(__('labels.backend.clients.fields.logo_ar'))->class('col-sm-2 form-control-label')->for('logo_ar') }}
                    <div class="col-sm-10">
                        {{ html()->file('logo[ar]')
                            ->class('form-control')
                            ->attribute('id', 'logo_ar')
                            ->required(false) }}
                
                        <!-- Current Arabic Logo Preview -->
                        <img id="logo_ar_preview" src="{{ asset('storage/' . $client->getTranslation('logo', 'ar')) }}" alt="Arabic Logo" style="max-width: 200px; display:block; margin-top: 10px;" />
                    </div>
                </div><!--form-group-->
                
                <div class="form-group row">
                    {{ html()->label(__('labels.backend.clients.fields.logo_en'))->class('col-sm-2 form-control-label')->for('logo_en') }}
                    <div class="col-sm-10">
                        {{ html()->file('logo[en]')
                            ->class('form-control')
                            ->attribute('id', 'logo_en')
                            ->required(false) }}
                
                        <!-- Current English Logo Preview -->
                        <img id="logo_en_preview" src="{{ asset('storage/' . $client->getTranslation('logo', 'en')) }}" alt="English Logo" style="max-width: 200px; display:block; margin-top: 10px;" />
                    </div>
                </div><!--form-group-->

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {{ html()->submit($text = icon('fas fa-save')." " . __('response.save'))->class('btn btn-success') }}
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
                    Updated: {{$client->updated_at->diffForHumans()}},
                    Created at: {{$client->created_at->isoFormat('LLLL')}}
                </small>
            </div>
        </div>
    </div>
</div>
@push ('after-scripts')

<script>
    // Handle Arabic logo preview update
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

    // Handle English logo preview update
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
