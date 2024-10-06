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
                    {{-- <h4 class="card-title mb-0">
                    <i class="{{$module_icon}}"></i> {{ __('labels.backend.partners.edit.title') }}
                    <small class="text-muted">{{ __('labels.backend.partners.edit.action') }} </small>
                </h4> --}}
                    <div class="small text-muted">
                        {{ __('labels.backend.partners.edit.sub-title') }}
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
                    {{ html()->modelForm($partner, 'PATCH', route('backend.partners.update', $partner->id))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.partners.fields.name'))->class('col-sm-2 form-control-label')->for('name') }}

                        <div class="col-sm-10">
                            {{ html()->text('name')->class('form-control')->value($partner->name)->placeholder(__('labels.backend.partners.fields.name'))->attribute('maxlength', 191)->required() }}
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        {{ html()->label(__('labels.backend.partners.fields.description'))->class('col-sm-2 form-control-label')->for('description') }}

                        <div class="col-sm-10">
                            {{ html()->text('description')->class('form-control')->value($partner->description)->placeholder(__('labels.backend.partners.fields.description'))->attribute('maxlength', 191)->required() }}
                        </div>
                    </div> --}}

                    <!-- Image -->

                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.partners.fields.image'))->class('col-sm-2 form-control-label')->for('image') }}
                        <div class="col-sm-10">
                            {{ html()->file('image')->class('form-control')->attribute('id', 'image')->required(false) }}

                            <!-- Current Arabic Logo Preview -->
                            <img id="image_preview" src="{{ asset('storage/' . $partner->image) }}" alt="Image"
                                style="max-width: 200px; display:block; margin-top: 10px;" />
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {{ html()->submit($text = icon('fas fa-save') . ' ' . __('response.save'))->class('btn btn-success') }}
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
                        Updated: {{ $partner->updated_at->diffForHumans() }},
                        Created at: {{ $partner->created_at->isoFormat('LLLL') }}
                    </small>
                </div>
            </div>
        </div>
    </div>
    @push('after-scripts')
        <script>
            // Handle Arabic logo preview update
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
@endsection
