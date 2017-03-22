@extends('layouts.app')

@section('title')
kittAy - Employee Edit
@stop
@section('content')

<div class="container">
	
	<div class="newemployee">
			<h3>Edit Employee:</h3>
			<?php
			if (count($errors) > 0) {
				echo  '<div class="alert alert-danger"><ul>';
				foreach ($errors->all() as $error) {
					echo "<li>$error</li>";
				};
				echo '</ul></div>';
			};
			?>
			<?php $edit = true; ?>
			{!! Form::model($employees, [
					'method' => 'PATCH', 
					'route' => ['employees.update', $employees->id]]) 
			!!}
			
				<label style="width:100px;">Full Name:</label> <input style="height:40px;margin:10px;" type="text" name="first_name" value="{{ $employees->first_name }}">
				<input style="height:40px;" type="text" name="last_name"  value="{{ $employees->last_name }}"><br />
				<label style="width:100px;">Position:</label> <input style="height:40px;margin:10px;" type="text" name="position"  value="{{ $employees->position }}"><br />
				<label style="width:100px;">Salary:</label> <input style="height:40px;margin:10px;" type="number" min="1" step="any" name="salary"  value="{{ $employees->salary }}"><br />
				<label style="width:100px;">Hire Date:</label><input style="height:40px;margin:10px;" type="date" name="hire_date" value="{{ $employees->hire_date }}"><br />
				
				<button type="submit" class="btn btn-large btn-primary">Submit</button>
				<a href="{{ URL::to('employees') }}"><button type="button" class="btn btn-large btn-primary" style="margin-left:10px;">Cancel</button></a>
			{!! Form::close() !!}
				
	</div>
</div>
@endsection