@extends('backend.layouts.app')

@section('title')
    {{ __($module_action) }} {{ $module_title }}
@endsection

@section('breadcrumbs')
    <x-backend-breadcrumbs>
        <x-backend-breadcrumb-item route='{{ route("backend.$module_name.index") }}' icon='{{ $module_icon }}'>
            اعمال للمشروع
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
                        <i class="{{ $module_icon }}"></i>
                        {{ 'اعمال للمشروع' }}
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

                    {{ html()->form('POST', route('backend.works.store'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
                    {{ csrf_field() }}

                    <input type="hidden" name="project_id" value="{{ $project->id }}">

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.title'))->class('col-sm-2 form-control-label')->for('title') }}
                        <div class="col-sm-10">
                            {{ html()->text('title')->class('form-control')->placeholder(__('labels.backend.projects.fields.title'))->attribute('maxlength', 191)->required() }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.sub_title'))->class('col-sm-2 form-control-label')->for('sub_title') }}
                        <div class="col-sm-10">
                            {{ html()->text('sub_title')->class('form-control')->placeholder(__('labels.backend.projects.fields.sub_title'))->attribute('maxlength', 191)->required() }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.description'))->class('col-sm-2 form-control-label')->for('description') }}
                        <div class="col-sm-10">
                            {{ html()->textarea('description')->class('form-control')->placeholder(__('labels.backend.projects.fields.description'))->attribute('maxlength', 1000)->required() }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.services.fields.image'))->class('col-sm-2 form-control-label')->for('image') }}
                        <div class="col-sm-10">
                            {{ html()->file('image')->class('form-control')->attribute('id', 'image')->required() }}

                            <!-- Image Preview -->
                            <img id="image_preview" src="" alt="Image Preview"
                                style="max-width: 200px; display:none; margin-top: 10px;" />
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('images', 'صور اخرى للعمل') !!} {!! fielf_required('required') !!}
                                <div class="input-group mb-3">
                                    {{ html()->file('images[]')->multiple()->class('form-control')->attribute('multiple') }}

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


                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <x-buttons.create title="">
                                    {{ __('response.save') }}
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

    @push('after-scripts')
        <script>
            // Preview for Arabic logo
            document.getElementById('image').addEventListener('change', function(event) {
                let logoArPreview = document.getElementById('image_preview');
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
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.select2-category').select2({
                    theme: "bootstrap",
                    placeholder: '@lang('Select an option')',
                    minimumInputLength: 2,
                    allowClear: true,
                    ajax: {
                        url: '{{ route('backend.categories.index_list') }}',
                        dataType: 'json',
                        data: function(params) {
                            return {
                                q: $.trim(params.term)
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: data
                            };
                        },
                        cache: true
                    }
                });

                $('.select2-tags').select2({
                    theme: "bootstrap",
                    placeholder: '@lang('Select an option')',
                    minimumInputLength: 2,
                    allowClear: true,
                    ajax: {
                        url: '{{ route('backend.tags.index_list') }}',
                        dataType: 'json',
                        data: function(params) {
                            return {
                                q: $.trim(params.term)
                            };
                        },
                        processResults: function(data) {
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
            CKEDITOR.replace('description', {
                filebrowserImageBrowseUrl: '/file-manager/ckeditor',
                language: '{{ App::getLocale() }}',
                defaultLanguage: 'en'
            });

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


        @push('after-styles')
            <!-- File Manager -->
            <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
        @endpush

        @push('after-scripts')
            <!-- JavaScript for Image Preview -->
            <script>
                // Preview for Arabic logo
                document.getElementById('image').addEventListener('change', function(event) {
                    let logoArPreview = document.getElementById('image_preview');
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
            </script>
        @endpush
    @endpush

































@endsection
