<div class="details_size">
    <div class="row">
        @foreach($product->options as $option)
            @if($option->type == 'radio')
                <legend class="col-form-label col-sm-2 pt-0">{{ $option->name }} :</legend>
                <div class="col-sm-10">
                    <div class="form-group">
                        @foreach($option->values as $key=>$value)
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline{{$value->id}}" name="options[{{ $option->id }}]" class="custom-control-input"  value="{{ $value->id }}" {{ $key+1 == 1 ? 'checked' : '' }}>
                          <label class="custom-control-label" for="customRadioInline{{$value->id}}">{{ $value->label }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if($option->type == 'checkbox')
                <legend class="col-form-label col-sm-2 pt-0">{{ $option->name }} :</legend>
                <div class="col-sm-10">
                    <div class="form-group">
                        @foreach($option->values as $value)
                        <div class="custom-control custom-checkbox d-inline">
                          <input type="checkbox" class="custom-control-input" name="options[{{ $option->id }}][]" id="customCheck{{$value->id}}" value="{{ $value->id }}">
                          <label class="custom-control-label mr-3" for="customCheck{{$value->id}}">{{ $value->label }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if($option->type == 'multiple_select' || $option->type == 'dropdown')
                <legend class="col-form-label col-sm-2 pt-0">{{ $option->name }} </legend>
                <div class="col-sm-10">
                    <div class="form-group">
                        <select name="options[{{ $option->id }}]{{ $option->type === 'multiple_select' ? '[]' : '' }}" class="selectize" style="width: 50%" {{ $option->type === 'multiple_select' ? 'multiple' : '' }}>
                            <option value="">Select Option</option>
                            @foreach($option->values as $value)
                            <option value="{{ $value->id }}">{{ $value->label }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>