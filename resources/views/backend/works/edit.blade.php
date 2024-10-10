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
                    {{ html()->modelForm($work, 'PATCH', route('backend.works.update', $work->id))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.title'))->class('col-sm-2 form-control-label')->for('title') }}

                        <div class="col-sm-10">
                            {{ html()->text('title')->class('form-control')->value($work->title)->placeholder(__('labels.backend.projects.fields.title'))->attribute('maxlength', 191)->required() }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.sub_title'))->class('col-sm-2 form-control-label')->for('sub_title') }}

                        <div class="col-sm-10">
                            {{ html()->text('sub_title')->class('form-control')->value($work->sub_title)->placeholder(__('labels.backend.projects.fields.sub_title'))->attribute('maxlength', 191)->required() }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.description'))->class('col-sm-2 form-control-label')->for('description') }}
                        <div class="col-sm-10">
                            {{ html()->textarea('description')->class('form-control')->value($work->description)->placeholder(__('labels.backend.projects.fields.description'))->attribute('maxlength', 1000)->required() }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.projects.fields.image'))->class('col-sm-2 form-control-label')->for('image') }}
                        <div class="col-sm-10">
                            {{ html()->file('image')->class('form-control')->attribute('id', 'image')->required(false) }}

                            <!-- Current Arabic Logo Preview -->
                            <img id="image_preview" src="{{ asset('storage/' . $work->image) }}" alt="Image"
                                style="max-width: 200px; display:block; margin-top: 10px;" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                {!! Form::label('images', 'صور اخرى للعمل') !!} {!! fielf_required('required') !!}
                                <div class="input-group mb-3">
                                    {{ html()->file('images[]')->multiple()->class('form-control')->attribute('multiple') }}

                                </div>

                                @foreach ($work->images as $image)
                                    <img id="image_preview" src="{{ asset('storage/' . $image) }}" alt="Image"
                                        style="max-width: 200px; display:block; margin-top: 10px;" />
                                @endforeach

                            </div>
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
                        Updated: {{ $work->updated_at->diffForHumans() }},
                        Created at: {{ $work->created_at->isoFormat('LLLL') }}
                    </small>
                </div>
            </div>
        </div>
    </div>

    @push('after-scripts')
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
                document.getElementById('images').value = $url;
            }
        </script>
    @endpush
@endsection
