<div class="form-group">
	<label >Start Date</label>
	<input type="text" class="form-control datepicker" name="from" value="{{ $request->from ?? '' }}">
</div><div class="form-group">
	<label>End Date</label>
	<input type="text" class="form-control datepicker" name="to" value="{{ $request->to ?? '' }}">
</div>
<div class="form-group">
	<label>Order Status</label>
	<select name="status" class="form-control">
	    <option value="">Please Select</option>
	    <option value="canceled" {{ $request->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
	    <option value="completed" {{ $request->status == 'completed' ? 'selected' : '' }}>Completed</option>
	    <option value="pending" {{ $request->status == 'pending' ? 'selected' : '' }}>Pending</option>
	    <option value="processing" {{ $request->status == 'processing' ? 'selected' : '' }}>Processing</option>
	    <option value="refunded" {{ $request->status == 'refunded' ? 'selected' : '' }}>Refunded</option>
	</select>
</div>
<div class="form-group">
	<label>Group By</label>
	<select name="group" class="form-control">
	    <option value="">Please Select</option>
	    <option value="days" {{ $request->group == 'days' ? 'selected' : '' }}>Days</option>
	    <option value="weeks" {{ $request->group == 'weeks' ? 'selected' : '' }}>Weeks</option>
	    <option value="months" {{ $request->group == 'months' ? 'selected' : '' }}>Months</option>
	    <option value="years" {{ $request->group == 'years' ? 'selected' : '' }}>Years</option>
	</select>
</div>
