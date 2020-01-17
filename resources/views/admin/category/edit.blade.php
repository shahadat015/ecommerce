<form action="{{ route('admin.categories.update', $category->id) }}" method="post" id="update-category" class="form-horizontal form-wizard-wrapper">
    @method('put')
    @csrf
    <div class="form-group">
        <label for="example-email-input1" class="col-form-label">Category Name</label>
        <input name="name" class="form-control" type="text" value="{{ $category->name }}">
    </div>

    <div class="form-group">
        <label for="example-email-input1" class="col-form-label">Category URL</label>
        <input name="url" class="form-control" type="text" value="{{ $category->slug }}">
    </div>

    <div class="form-group">
        <label for="example-email-input1" class="col-form-label">Parent Category</label>
        <select name="parent_id" class="form-control">
            <option value="">Parent Category</option>
            @foreach($categories as $key=>$value)
                <option value="{{ $key }}" {{ $category->parent_id == $key ? 'selected' : ''}}>{{ $value }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-check-inline my-2">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" name="status" class="custom-control-input" id="customCheck" data-parsley-multiple="groups" data-parsley-mincheck="2" {{ $category->status == 1 ? 'checked' : '' }}>
            <label class="custom-control-label" for="customCheck">Status</label>
        </div>
    </div>

    <div class="mt-2">
        <button type="submit" class="btn btn-submit btn-primary waves-effect waves-light">Update</button>
        <a href="#" data-url="{{ route('admin.category.destroy') }}" id="{{ $category->id }}" class="btn btn-danger delete-category waves-effect waves-light">Delete</a>
    </div>
</form>