@if($show)
<a href="{{ route($show, $action->id) }}"><i class="far fa-eye text-info mr-1 font-16"></i></a>
@endif
@if($edit)
<a href="{{ route($edit, $action->id) }}"><i class="far fa-edit text-info mr-1 font-16"></i></a>
@endif
@if($delte)
<a href="{{ route($delte, $action->id) }}" class="delete"><i class="far fa-trash-alt text-danger font-16"></i></a>
@endif