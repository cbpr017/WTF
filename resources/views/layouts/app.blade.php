<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
	{!! Html::style('css/bootstrap.css') !!}
	{!! Html::style('css/bootstrap-responsive.min.css') !!}
	{!! Html::style('css/app.css') !!}
    <!-- Scripts -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
	<script>
			// Change employee view from current and released
			$(document).ready(function(){
				$('.release').click(function() {
					$('.tablecurrent').hide();
					$('.tablerelease').show();
					$('.release').css('font-weight', 'bold');
					$('.current').css('font-weight', 'normal');
				});
				$('.current').click(function(){
					$('.tablerelease').hide();
					$('.tablecurrent').show();
					$('.current').css('font-weight', 'bold');
					$('.release').css('font-weight', 'normal');
				});
			// Add New Employee Button
				$('.addnew').click(function(){
					$('.tablerelease').hide();
					$('.tablecurrent').hide();
					$('.newemployee').show();
					$('.statusview').hide();
					$('.addnew').hide();
					$('.views').hide();
				});
				$('.addcancel').click(function(){
					$('.newemployee').hide();
					$('.tablecurrent').show();
					$('.statusview').show();
					$('.views').show();
					$('.addnew').show();
				});
				
				//Color Inverting Script
				$('.colors').click(function(){
					function load_script(src, callback) {
						var s = document.createElement('script');
						s.src=src;
						s.onload=callback;
						document.getElementsByTagName('head')[0].appendChild(s);
					}
					function invertColors(){
						var colorProperties = ['color', 'background-color'];
						$('*').each(function() {
							var color = null;
							for(var prop in colorProperties) {
								prop = colorProperties[prop];
								if (!$(this).css(prop)) continue;
								color=new RGBColor($(this).css(prop));
								if(color.ok){
									$(this).css(prop,'rgb('+(255-color.r)+', '+(255-color.g)+', '+(255-color.b)+')');
								}
								color=null;
							}
						});
					}
					load_script('http://www.phpied.com/files/rgbcolor/rgbcolor.js', function(){
						if(!window.jQuery)load_script('https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js',invertColors);
						else invertColors();
					});	
				});
				
				
			//Date Picker
			$( "#datepicker" ).datepicker();
			});
			
			
	</script>
	
	<script>
			// Show/Hide Notes
			$(document).ready(function(){
				$('.notes p').click(function() {
					$(this).next('tr').toggle();
				});
				
			});
	</script>
	<script>
			//Insert checked values into database
			$(document).ready(function(){
				$('.get_value').click(function(){
					var insert = [];
					 
					$('.get_value').each(function(){
				    	if($(this).is(":checked"))
							{
							 insert.push($(this).val());
							 }
					 });
					 
					 insert = insert.toString();
					 
					 $.ajax({
						 url: "/insert.php",
						 method: "POST",
						 data:{insert:insert},
						 success:function(data){
						 $('#result').html(data);
						}
					 });
				});
				
			});
			
	</script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

<!-- Facebook JavaScript SDK -->
 <script>
  // window.fbAsyncInit = function() {
    // FB.init({
      // appId      : '1216088978476124',
      // xfbml      : true,
      // version    : 'v2.8'
    // });
    // FB.AppEvents.logPageView();
  // };

  // (function(d, s, id){
     // var js, fjs = d.getElementsByTagName(s)[0];
     // if (d.getElementById(id)) {return;}
     // js = d.createElement(s); js.id = id;
     // js.src = "//connect.facebook.net/en_US/sdk.js";
     // fjs.parentNode.insertBefore(js, fjs);
   // }(document, 'script', 'facebook-jssdk'));
</script>

<!-- END Facebook JavaScript SDK -->

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand colors" href="{{ url('/') }}">
                       <img style="width:30px;" src={{asset('images/logo.png')}} alt="Logo">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><A href="/">Home</a></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Web Apps <b class="caret"></b></a>
                        <ul class="dropdown-menu">
						<li><A href="/employees">Employee Records</a></li>
						<li><A href="/projects">Project Manager</a></li>
						<li><A href="/wedding">Wedding Planner</a></li>
						<li><A href="/eyes">Eyes</a></li>
						</ul>
						<li><a href="/about">About This Workspace</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
									<li>
                                        <a href="{{ route('profile') }}">
                                            Your Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
									
                                </ul>
								<li>
									<a>
									<span class="colors"><img style="width:25px;height:25px;" src="http://www.ntsc-tv.com/images/tv/c-bars-lg.gif"></a></span>
									</li>
                            </li>
                        @endif
                    </ul>
					
                </div>
				
            </div>
			
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
