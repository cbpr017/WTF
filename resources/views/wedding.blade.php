@extends('layouts.app')

@section('title')
kittAy - Wedding Planner
@stop
@section('content')
<?php
	$clients = DB::table('wedding_proj')->get();
	$projects = DB::table('wedding_projects')->get();

?>

<div class="container">


<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>

	@if($projects->count())
	
			{!! Form::open(array(
									'method' => 'GET',
									)) !!}
						Filter By Project: <select name="project_name">
								
						@foreach ($clients as $client)
							 <option value="<?php echo $client->project; ?>"> <?php
							echo $client->project; ?>
						@endforeach
						</option>
						</select>
							<button type="submit" style="height: 30px;margin: 10px;padding: 0;width: 40px;" class="btn btn-large btn-success">Go</button>
							
			{!! Form::close() !!}
	
		<table>
			<thead>
				<tr>
					<td></td>
					<td></td>
					<td style="font-weight:bold;">Project Name</td>
					<td style="font-weight:bold;">Task Name</td>
					<td style="font-weight:bold;">Status</td>
				</tr>
			</thead>
			<tbody>
			<!-- Apply Filter if selected -->
			
			@if (ISSET($_GET["project_name"]))
						@foreach($projects as $project)
									@if ($_GET["project_name"] == "$project->project_name")
											@include('proj.proj_table')
										@else
											<?php continue; ?>
									@endif
						@endforeach
			@else
						@foreach($projects as $project)
							@include('wedding.proj_table')
						@endforeach
			@endif
						
			</tbody>
		</table>
	@endif
	
	<h3>Enter a new project:</h3>
	<?php
	if (count($errors) > 0) {
		echo  '<div class="alert alert-danger"><ul>';
		foreach ($errors->all() as $error) {
			echo "<li>$error</li>";
		};
		echo '</ul></div>';
	};
	?>
	{!! Form::open() !!}
		<select name="project_name">
		<?php 
			foreach ($clients as $client) {
				?> <option value="<?php echo $client->project; ?>"> <?php
				echo $client->project;
			}
				?> </option>
		</select>
		
		<input style="height:40px;display:block;margin-top:20px;" type="text" name="task_name" placeholder="Task Name">
		<textarea style="width:80%;height:40px;display:block;margin-top:10px;" name="task_description"  placeholder="Task Description"></textarea>
		<button type="submit" style="margin-top:10px;"		class="btn btn-large btn-primary">Submit</button>
	{!! Form::close() !!}
	
	
</div>

@endsection