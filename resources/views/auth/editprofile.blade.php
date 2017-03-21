@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Your Profile</div>

                <div class="panel-body">
				
				
				@if (Auth::user()->avatar)
						<img style ="float:left;margin:15px;width:100px;height:100px;" src="{{ Auth::user()->avatar }}">
				@else
						<img style ="float:left;margin:15px;width:100px;height:100px;" src="{!! asset('images/default-picture.jpg') !!}">
				@endif
				

					<h2>{{ Auth::user()->name }}</h2>
					Email: {{ Auth::user()->email }}<br />
					
					<div style="display:block;position:relative;">
					{!! Form::open() !!}
						<h4>Biography:</h4><textarea style="width:100%;height:100%;" name="bio" value="{{ Auth::user()->bio }}">
					
					{!! Form::close() !!}
					</div>
					
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
