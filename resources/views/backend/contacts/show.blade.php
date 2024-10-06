@extends ('backend.layouts.app')

@section('title') {{ $module_action }} {{ $module_title }} @endsection

@section('breadcrumbs')
<x-backend-breadcrumbs>
    <x-backend-breadcrumb-item route='{{route("backend.$module_name.index")}}' icon='{{ $module_icon }}' >
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
                    <i class="{{$module_icon}}"></i> {{__('response.contacts')}}
                    <small class="text-muted">{{ __('labels.backend.contacts.show.action') }} </small>
                </h4>
                <div class="small text-muted">
                    {{ __('labels.backend.contacts.index.sub-title') }}
                </div>
            </div>
        </div>
        <!--/.row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover">

                        <tr>
                            <th>{{ __('labels.backend.contacts.fields.name') }}</th>
                            <td>{{ $contact->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('labels.backend.contacts.fields.email') }}</th>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('labels.backend.contacts.fields.service') }}</th>
                            <td>{{ $contact->service->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('labels.backend.contacts.fields.subject') }}</th>
                            <td>{{ $contact->subject }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('labels.backend.contacts.fields.message') }}</th>
                            <td>{{ $contact->message }}</td>
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
                    Updated: {{$contact->updated_at->diffForHumans()}},
                    Created at: {{$contact->created_at->isoFormat('LLLL')}}
                </small>
            </div>
        </div>
    </div>
</div>
@endsection
