<form action="{{ route('admin.categories.update', $category->id) }}" method="post" id="category-form" class="form-horizontal form-wizard-wrapper">
    @method('put')
    @csrf
    <div class="form-group">
        <label for="example-email-input1" class="col-form-label">Category Name</label>
        <input name="name" class="form-control" type="text" value="{{ $category->name }}">
    </div>

    <div class="form-group">
        <label for="example-email-input1" class="col-form-label">Selete Category</label>
        <select name="category_id" class="form-control" id="category">
            <option value="">Choose Category</option>
            @foreach($categories as $maincategory)
                <option value="{{ $maincategory->id }}" {{ $maincategory->id == $category->category_id ? 'selected' : '' }}>{{ $maincategory->name }}</option>
                @foreach($maincategory->subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" {{ $subcategory->id == $category->category_id ? 'selected' : '' }}>|--{{ $subcategory->name }}</option>
                @endforeach
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
        <a href="#" data-url="{{ route('admin.category.destroy') }}" data-id="{{ $category->id }}" class="btn btn-danger delete-category waves-effect waves-light">Delete</a>
    </div>
</form>