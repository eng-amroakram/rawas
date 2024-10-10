<div class="text-right">
    <a href="{{route('backend.works.show', $data)}}" class="btn btn-success btn-sm mt-1" data-toggle="tooltip" title="{{__('labels.backend.show')}}"><i class="fas fa-eye"></i></a>
    <a href="{{route('backend.works.edit', $data)}}" class="btn btn-primary btn-sm mt-1" data-toggle="tooltip" title="{{__('labels.backend.edit')}}"><i class="fas fa-edit"></i></a>
    <button
    type="submit"
    form="delete_item_{{ $data }}"
    title="{{__('labels.backend.delete')}}"
    class="btn btn-danger btn-sm mt-1 delete_form">
    <i class="fa fa-trash-alt"></i>
</button>
<form
    action="{{route('backend.works.destroy', $data)}}"
    id="delete_item_{{ $data }}"
    method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('DELETE')
</form>
</div>
