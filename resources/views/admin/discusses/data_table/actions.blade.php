@if ($published)
    <form action="{{ route('admin.discusses.change', $id) }}" class="my-1 my-xl-0" method="post" style="display: inline-block;">
        @csrf
        @method('post')
        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-times-circle"></i> @lang('site.reject')</button>
    </form> 
@else
    <form action="{{ route('admin.discusses.change', $id) }}" class="my-1 my-xl-0" method="post" style="display: inline-block;">
        @csrf
        @method('post')
        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> @lang('site.approve')</button>
    </form>
@endif

@if (auth()->user()->hasPermission('update_discuss'))
    <a href="{{ route('admin.discusses.edit', $id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
@endif

@if (auth()->user()->hasPermission('delete_discuss'))
    <form action="{{ route('admin.discusses.destroy', $id) }}" class="my-1 my-xl-0" method="post" style="display: inline-block;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> @lang('site.delete')</button>
    </form>
@endif
