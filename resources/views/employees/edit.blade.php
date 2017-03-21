@extends('layouts.app')

@section('title')
kittAy - Employee Edit
@stop
@section('content')

<?php $workers = DB::table('employees')->get();
?>
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
			}
			?>
			{!! Form::model($employees,[employees.store, $employees->id] !!}
			
				<label style="width:100px;">Full Name:</label> <input style="height:40px;margin:10px;" type="text" name="first_name" value="<?php echo $employees->first_name; ?>">
				<input style="height:40px;" type="text" name="last_name"  value="<?php echo $employees->last_name; ?>"><br />
				<label style="width:100px;">Position:</label> <input style="height:40px;margin:10px;" type="text" name="position"  value="<?php echo $employees->position; ?>"><br />
				<label style="width:100px;">Salary:</label> <input style="height:40px;margin:10px;" type="number" min="1" step="any" name="salary"  value="<?php echo $employees->salary; ?>"><br />
				<label style="width:100px;">Hire Date:</label><input style="height:40px;margin:10px;" type="date" name="hire_date" value="<?php echo $employees->hire_date; ?>"><br />
				<!-- <input style="height:40px;" type="file" name="attachment"> -->
				
				<button type="submit" class="btn btn-large btn-primary">Submit</button>
			{!! Form::close() !!}
				
	</div>
</div>
@stop