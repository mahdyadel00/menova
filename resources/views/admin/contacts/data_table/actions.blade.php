@if (auth()->user()->hasPermission('read_contacts'))
    <a href="{{ route('admin.contacts.show', $id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> @lang('site.show')</a>
@endif

@if (auth()->user()->hasPermission('delete_contacts'))
    <form action="{{ route('admin.contacts.destroy', $id) }}" class="my-1 my-xl-0" method="post" style="display: inline-block;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> @lang('site.delete')</button>
    </form>
@endif
