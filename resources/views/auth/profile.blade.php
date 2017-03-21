@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Your Profile <span style="float:right;"><a href="/profile/edit"><button style="btn btn-info">Edit Profile</button></a></span></div>

                <div class="panel-body">
				
				
				@if (Auth::user()->avatar)
						<img style ="float:left;margin:15px;width:100px;height:100px;" src="{{ Auth::user()->avatar }}">
				@else
						<img style ="float:left;margin:15px;width:100px;height:100px;" src="{!! asset('images/default-picture.jpg') !!}">
				@endif
				

					<h2>{{ Auth::user()->name }}</h2>
					Email: {{ Auth::user()->email }}<br />
					
					<div>
					{{ Auth::user()->bio }}
					
					</div>
					
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
