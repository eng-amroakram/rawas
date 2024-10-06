@extends('backend.layouts.app')

@section('title')
    {{ __($module_action) }} {{ $module_title }}
@endsection

@section('breadcrumbs')
    <x-backend-breadcrumbs>
        <x-backend-breadcrumb-item type="active" icon='{{ $module_icon }}'>{{ $module_title }}</x-backend-breadcrumb-item>
    </x-backend-breadcrumbs>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title mb-0">
                        <i class="{{ $module_icon }}"></i> {{ $module_title }} <small
                            class="text-muted">{{ __($module_action) }}</small>
                    </h4>
                    {{-- <div class="small text-muted"> --}}
                    {{-- @lang("settings_management_Dashboard", ['module_name'=>Str::title($module_name)]) --}}
                    {{-- </div> --}}
                </div>
                <!--/.col-->
                <div class="col-4">
                    <div class="float-right">
                        <div class="btn-group" role="group" aria-label="Toolbar button groups">
                        </div>
                    </div>
                </div>
                <!--/.col-->
            </div>
            <!--/.row-->

            <div class="row mt-4">
                <div class="col">
                    <form method="post" action="{{ route('backend.settings.store') }}" class="form-horizontal"
                        enctype="multipart/form-data" role="form">
                        {!! csrf_field() !!}
                        @php $settings = \App\Models\Setting::query()->get()->groupBy('group'); @endphp

                        @foreach ($settings as $section => $fields)
                            <div class="card card-accent-primary">
                                <div class="card-header" style="font-weight: bold">
                                    {{ __('response.' . $section) }}
                                </div>
                                <div class="card-body">
                                    {{-- <p class="text-muted">{{ $fields['desc'] }}</p> --}}

                                    <div class="row">
                                        <div class="col">
                                            {{-- @foreach ($fields['elements'] as $field) --}}
                                            {{-- @includeIf('backend.settings.fields.' . $field['type'] ) --}}
                                            {{-- @endforeach --}}
                                            @foreach ($fields as $field)
                                                @php
                                                    $fieldName = $field['name'];
                                                    $inputId = $section . '_' . $fieldName;
                                                    $fieldArrayName = 'settings[' . $section . '][' . $fieldName . ']';
                                                @endphp
                                                @if ($field['type'] == 'file')
                                                    <div class="form-group row">
                                                        {{ html()->label(__('labels.backend.settings.fields.' . $fieldName))->class('col-sm-2 form-control-label')->for($inputId) }}
                                                        <div class="col-sm-10">

                                                            {{ html()->file($fieldName)->class('form-control')->attribute('id', $inputId)->attribute('name', $fieldArrayName)->required(false) }}
                                                            <!-- Image Preview -->
                                                            <img id="{{ $inputId }}_preview"
                                                                src="{{ $field['val'] }}" alt="{{ $fieldName }}"
                                                                style="max-width: 200px; display:block; margin-top: 10px;" />
                                                        </div>
                                                    </div><!--form-group-->
                                                @else
                                                    <div class="form-group row">
                                                        {{ html()->label(__('labels.backend.settings.fields.' . $fieldName))->class('col-sm-2 form-control-label')->for($inputId) }}
                                                        <div class="col-sm-10">
                                                            {{ html()->text($fieldArrayName)->class('form-control')->value($field['value'])->attribute('maxlength', 191)->attribute('id', $inputId)->value($field['val'])->required(false) }}
                                                        </div>
                                                    </div><!--form-group-->
                                                @endif
                                                <!-- @includeIf('backend.settings.fields.' . $field['type']) -->
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{--                    @endif --}}

                        <div class="row m-b-md">
                            <div class="col-md-12">
                                <button class="btn-primary btn">
                                    <i class='fas fa-save'></i> @lang('response.save')
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">

            </div>
        </div>
    </div>



    @push('after-scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                function previewImage(input, previewElementId) {
                    const file = input.files[0];
                    if (file) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            const previewElement = document.getElementById(previewElementId);
                            previewElement.src = e.target.result;
                            previewElement.style.display = 'block';
                        };

                        reader.readAsDataURL(file);
                    } else {
                        const previewElement = document.getElementById(previewElementId);
                        previewElement.src = '';
                        previewElement.style.display = 'none';
                    }
                }

                document.querySelectorAll('input[type="file"]').forEach(input => {
                    input.addEventListener('change', function() {
                        const previewId = this.getAttribute('id') + '_preview';
                        previewImage(this, previewId);
                    });
                });
            });
        </script>
    @endpush
@endsection
