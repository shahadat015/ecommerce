<div class="custom-control custom-checkbox d-inline">
    <input type="checkbox" class="delete-checkbox custom-control-input" id="horizontalCheckbox{{$action->id}}" value="{{ $action->id }}">
    <label class="custom-control-label" for="horizontalCheckbox{{$action->id}}"></label>
</div>
@if($switch ?? false)
<div class="custom-control custom-switch switch-primary d-inline">
    <input type="checkbox" class="custom-control-input" id="customSwitchPrimary{{$action->id}}" data-url="{{ route('admin.' . str_singular($route) . '.update', $action->id) }}" {{ $action->status ? 'checked' : '' }}>
    <label class="custom-control-label" for="customSwitchPrimary{{$action->id}}"></label>
</div>
@endif
@if($view ?? true)
<a href="{{ route('admin.' . $route . '.show', $action->id) }}"><i class="far fa-eye text-info mr-1 mt-1 font-16"></i></a>
@endif
@if($edit ?? true)
<a href="{{ route('admin.' . $route . '.edit', $action->id) }}"><i class="far fa-edit text-info mr-1 mt-1 font-16"></i></a>
@endif
@if($delete ?? true)
<a href="#" data-url="{{ route('admin.' . str_singular($route) . '.destroy') }}" data-id="{{ $action->id }}" class="btn-delete"><i class="far fa-trash-alt text-danger mt-1 font-16"></i></a>
@endif
@if($image ?? false)
<a href="{{ asset($action->path()) }}" data-src="{{ $action->path() }}" data-id="{{ $action->id }}" class="select-image"><i class="far fa-check-square text-info font-16 ml-2"></i></a>
@endif