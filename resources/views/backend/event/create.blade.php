@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('breadcrumb-links')
   
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Events
                    <small class="text-muted">Create Event</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <hr>
        <form role="form" method="post" class="addform" action="{{ url('admin/event/create') }}" enctype="multipart/form-date">
        	
	       	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	       	<div class="form-group">
	       		<label class="">Title*</label>
	       		<input type="text" class="form-control col-sm-5" name="title" required="required">
	       		<small class="error-msg" style="display: none">this filed is required</small>
	       	</div>	
	       	<div class="form-group">
	       		<label class="">Start Date *</label>
				<input class="form-control col-sm-5" id="date-input" type="date" name="start_date" placeholder="date" required="required">
	       		<small class="error-msg" style="display: none">this filed is required</small>
	       	</div>
	       	<div class="form-group">
	       		<label class="">End Date *</label>
	       		<input class="form-control col-sm-5" id="date-input" type="date" name="end_date" placeholder="date" required="required">
	       		<small class="error-msg" style="display: none">this filed is required</small>
	       	</div>
	       	<div class="form-group">
	       		<label class="">Event:</label>
	       		<label for="repeat" class="row">
	       			<input type="radio" class="radio col-sm-1" name="recurrence_type" value="repeat">Repeat
	       			<select name="repeat_days" class="form-control col-sm-2">
	       				<option value="1">Every</option>
	       				<option value="2">Every Other</option>
	       				<option value="3">Every Third</option>
	       				<option value="4">Every Fourth</option>
	       			</select>
	       			<select name="repeat_type" class="form-control col-sm-2">
	       				<option value="days">Day</option>
                        <option value="weeks">Week</option>
                        <option value="months">Month</option>
                        <option value="years">Year</option>
	       			</select>
	       		</label>
	       		<small class="error-msg" style="display: none">this filed is required</small>
	       	</div>
	       	<div class="form-group">
	       	
	       		<label for="repeat" class="row">
	       			<input type="radio" class="radio col-sm-1" name="recurrence_type" value="repeat_on_the">Repeat on the
	       			<select id="" class="form-control col-sm-2" name="repeat_days">
				        <option selected="selected"  value="1">First</option>
				        <option value="2">Second</option>
				        <option value="3">Third</option>
				        <option value="4">Fourth</option>
				    </select>
	       			<select id="" class="form-control col-sm-2" name="repeat_week">
					    <option selected="selected" value="1">Sun</option>
					    <option value="2">Mon</option>
					    <option value="3">Tue</option>
					    <option value="4">Wed</option>
					    <option value="5">Thu</option>
					    <option value="6">Fri</option>
					    <option value="7">Sat</option>
					</select>
					<span class="col-sm-1">of the</span>
					<select id="" class="form-control col-sm-2" name="repeat_month">
                        <option selected="selected" value="1">Month</option>
                        <option value="3">3 Months</option>
                        <option value="4">4 Months</option>
                        <option value="6">6 Months</option>
                        <option value="12">Year</option>
                    </select>
	       		</label>
	       		<small class="error-msg" style="display: none">this filed is required</small>
	       	</div>
	       	<button class="btn btn-sm btn-primary" type="submit"> Submit</button>
	       	<a class="btn btn-sm btn-danger" href="{{ url('admin/event') }}" > Cancel</a>
    	</form>
	</div><!--card-body-->
</div><!--card-->
@endsection
