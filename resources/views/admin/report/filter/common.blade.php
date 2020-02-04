<div class="form-group">
	<label >Start Date</label>
	<input type="text" class="form-control datepicker" name="from" value="{{ $request->from ?? '' }}">
</div><div class="form-group">
	<label>End Date</label>
	<input type="text" class="form-control datepicker" name="to" value="{{ $request->to ?? '' }}">
</div>
<div class="form-group">
	<label>Order Status</label>
	@php $statuses = ['canceled', 'completed', 'pending', 'processing', 'refunded'] @endphp
	<select name="status" class="form-control">
	    <option value="">Please Select</option>
	    @foreach($statuses as $status)
	    <option value="canceled" {{ $request->status == $status ? 'selected' : '' }}>Canceled</option>
	    @endforeach
	</select>
</div>
<div class="form-group">
	<label>Group By</label>
	@php $groups = ['days', 'weeks', 'months', 'years'] @endphp
	<select name="group" class="form-control">
	    <option value="">Please Select</option>
	    @foreach($groups as $group)
	    <option value="days" {{ $request->group == $group ? 'selected' : '' }}>Days</option>
	    @endforeach
	</select>
</div>
