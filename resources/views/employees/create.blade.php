@extends('layouts.app')

@section('title')
kittAy - Create Employee
@stop
@section('content')

	<div class="container">
			<h3>Hire New Employee:</h3>
			<?php
			if (count($errors) > 0) {
				echo  '<div class="alert alert-danger"><ul>';
				foreach ($errors->all() as $error) {
					echo "<li>$error</li>";
				};
				echo '</ul></div>';
			};
			?>
			{!! Form::open(array('class' => 'form-inline newemp', 'style' => 'display:table;')) !!}
			
				<label style="width:100px;">Full Name:</label> <input style="height:40px;margin:10px;" type="text" name="first_name" placeholder="First">
				<input style="height:40px;" type="text" name="last_name"  placeholder="Last"><br />
				<label style="width:100px;">Position:</label> <input style="height:40px;margin:10px;" type="text" name="position"  placeholder="Position"><br />
				<label style="width:100px;">Salary:</label> <input style="height:40px;margin:10px;" type="number" min="1" step="any" name="salary"  placeholder="Salary"><br />
				<label style="width:100px;">Hire Date:</label><input style="height:40px;margin:10px;" type="date" name="hire_date"><br />
			<div id="datepicker"></div>
				<!-- <input style="height:40px;" type="file" name="attachment"> -->
				
			<button type="submit" class="btn btn-large btn-primary">Submit</button>
			<a href="{{ URL::to('employees') }}"><button type="button" class="btn btn-large btn-primary" style="margin-left:10px;">Cancel</button></a>
			{!! Form::close() !!}
				
	</div>
	
@endsection