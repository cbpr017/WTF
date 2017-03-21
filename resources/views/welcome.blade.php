@extends('layouts.app')

@section('title')
kittAy - Home
@stop
@section('content')

 <!-- Jumbotron -->
 <div class="container">
      <div class="jumbotron">
        <h1>Employee Records</h1>
        <p class="lead">My newest web application is an employee record keeper. You can add and remove employees! It's fun...hire your friends and fire your enemies. Why? Just because...</p>
        <a class="btn btn-large btn-success" href="/employees">Check it out</a>
      </div>
	  
	   <div class="jumbotron">
        <h1>Project Management</h1>
        <p class="lead">This is a work in progress! I'm working on building a user friendly tool to track projects.</p>
        <a class="btn btn-large btn-success" href="/projects">Check it out</a>
      </div>
	  
	   <div class="jumbotron">
        <h1>Wedding Planner</h1>
        <p class="lead">This is a work in progress! I'm working on building my own wedding planner!</p>
        <a class="btn btn-large btn-success" href="/wedding">Check it out</a>
      </div>

      <hr>

      <!-- Example row of columns
      <div class="row-fluid">
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
       </div>
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
      </div> -->
	  <Center><h2>I'll add more applications here as I build them!</h2></center>
</div>

@endsection