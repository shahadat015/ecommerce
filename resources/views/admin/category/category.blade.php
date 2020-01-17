<option value="">Parent Category</option>
@foreach($categories as $key=>$value)
<option value="{{ $key }}">{{ $value }}</option>
@endforeach
                                    