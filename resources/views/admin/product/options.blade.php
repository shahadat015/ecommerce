<div data-repeater-item="" class="card">
	<div class="card-body">
		<div class="form-group row">
			<div class="col-sm-4">
				<label for="example-email-input1" class="col-form-label">Name</label>
				<input name="name" class="form-control" type="text"  value="{{ $option->name }}">
			</div>

			<div class="col-sm-4">
				<label for="example-email-input1" class="col-form-label">Type</label>
				<select name="type" class="form-control">
					<option value="dropdown" {{ $option->type == 'dropdown' ? 'selected' : '' }}>Dropdown</option>
                    <option value="checkbox" {{ $option->type == 'checkbox' ? 'selected' : '' }}>Checkbox</option>
                    <option value="radio" {{ $option->type == 'radio' ? 'selected' : '' }}>Radio Button</option>
                    <option value="multiple_select" {{ $option->type == 'multiple_select' ? 'selected' : '' }}>Multiple Select</option>
				</select>
			</div>

			<div class="col-sm-3">
				<label for="example-email-input1" class="col-form-label">Is Required?</label>
				<select name="is_required" class="form-control">
					<option value="1" {{ $option->is_required == 1 ? 'selected' : '' }}>Required</option>
					<option value="0" {{ $option->is_required == 0 ? 'selected' : '' }}>Not Required</option>
				</select>
			</div>

			<div class="col-sm-1 mt-4 pt-2">
				<span data-repeater-delete="" class="btn btn-danger">
					<span class="far fa-trash-alt"></span>
				</span>
			</div>
		</div>
		<div class="repeater-custom-show-hide-inner">
			<div data-repeater-list="values">
				@foreach($option->values as $value)
				<div data-repeater-item="">
					<div class="form-group row  d-flex align-items-end">                                        
						<div class="col-sm-4">
							<label class="control-label">Label</label>
							<input type="text" name="label" class="form-control" value="{{ $value->label }}">
						</div><!--end col-->

						<div class="col-sm-4">
							<label class="control-label">Price</label>
							<input type="text" name="price" class="form-control" value="{{ $value->price }}">
						</div><!--end col-->

						<div class="col-sm-3">
							<label class="control-label">Price Type</label>
							<select name="price_type" class="form-control">
								<option value="fixed" {{ $value->price_type == 'fixed' ? 'selected' : '' }}>Fixed</option>
								<option value="percent" {{ $value->price_type == 'percent' ? 'selected' : '' }}>Percent</option>
							</select>
						</div><!--end col-->

						<div class="col-sm-1">
							<span data-repeater-delete="" class="btn btn-danger">
								<span class="far fa-trash-alt"></span>
							</span>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="form-group mb-2">
				<span data-repeater-create="" class="btn btn-light btn-md">
					<span class="fa fa-plus"></span> Add Value
				</span>
			</div>
		</div>
	</div>
</div>