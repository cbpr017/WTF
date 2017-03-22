@extends('layouts.app')

@section('title')
kittAy - Employee List
@stop
@section('content')

<div class="container">

<div style="float:left;">
		<a href="{{ URL::to('employees/create') }}"><button>Add New Employee</button></a>
</div>

<div class="views" style="float:right;padding:15px;">
<span style="color:#3097d1;font-weight:bold;padding-right:5px;">Status</span> <span style="font-weight:bold;" class="current">Current</span> | <span class="release">Past</span>
</div>
	
		<table  class="table table-bordered table-striped tablecurrent">
			<thead>
				<tr>
					<td style="font-weight:bold;">Employee Name</td>
					<td style="font-weight:bold;">Position</td>
					<td style="font-weight:bold;">Salary</td>
					<td style="font-weight:bold;">Hire Date</td>
					<!-- <td style="font-weight:bold;">Downloads</td> -->
					<td style="font-weight:bold;">Actions</td>
				</tr>
			</thead>
			<tbody>
				@if ($employees->isEmpty())
						<tr><td  style="text-align:center;font-style:italic;" colspan="5">No Records Found</td></tr>
				@else
					@foreach($employees as $employee)
					
						@if(empty(DB::select( DB::raw("SELECT * FROM employees WHERE release_date IS NULL"))))
							<tr><td  style="text-align:center;font-style:italic;" colspan="5">No Records Found</td></tr>
							@break
						@endif
					
						@if(isset($employee->release_date))
							@continue
						@else

						<tr>
						
							<td>{{ $employee->first_name . ' ' . $employee->last_name }}</td>
								
							<td>{{ $employee->position }}</td>
							<td>{{ '$' . number_format($employee->salary, 2) }}</td>
							<td>{{ $employee->hire_date }}</td>
							
							<td>
								
								{!! Form::model($employee, [
									'method' => 'PATCH', 
									'route' => ['relemployees.update', $employee->id]]) 
								!!}
								
									<button type="submit" class="btn btn-warning" style="font-size:.8em;">Release Employee </button>
								{!! Form::close() !!}
									<a href="{{ route('employees.edit', $employee->id) }}">Edit Employee</a>
								
								
							</td>
						</tr>
						@endif
					@endforeach
				@endif
			</tbody>
		</table>

	

			<table style="display:none;" class="table table-bordered table-striped tablerelease">
			<thead>
				<tr>
					<td style="font-weight:bold;">Employee Name</td>
					<td style="font-weight:bold;">Position</td>
					<td style="font-weight:bold;">Salary</td>
					<td style="font-weight:bold;">Hire Date</td>
					<!-- <td style="font-weight:bold;">Downloads</td> -->
					<td style="font-weight:bold;">Release Date</td>
				</tr>
			</thead>
<tbody>
			@if ($employees->isEmpty())
			<tr><td  style="text-align:center;font-style:italic;" colspan="5">No Records Found</td></tr>
			@else
				@foreach($employees as $employee)
					@if(empty(DB::select( DB::raw("SELECT * FROM employees WHERE release_date IS NOT NULL"))))
						<tr><td  style="text-align:center;font-style:italic;" colspan="5">No Records Found</td></tr>
						@break
					@endif
				
					@if (!isset($employee->release_date))
						@continue
					@else
				
					<tr>
						<td>{{ $employee->first_name . ' ' . 
							$employee->last_name }}</td>
						<td>{{ $employee->position }}</td>
						<td>{{ '$' . number_format($employee->salary, 2) }}</td>
						<td>{{ $employee->hire_date }}</td>
						<td>{{ $employee->release_date }}</td>
						

					</tr>
					@endif
				@endforeach
			@endif
			</tbody>
		</table>
	

	
</div>

@endsection