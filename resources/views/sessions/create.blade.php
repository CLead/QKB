<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Quad Knowledge Base</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">  
        <link rel="stylesheet" href="{{ URL::asset('css/default.css') }}?t=51">

        

    </head>
    <body>

    <header>
    @include('layout.headbar')
    </header>

    <div id="main">
        <div class="wrapper">


<div class="wrapper blue-grey darken-4 loaded row">

		<div class="col s12 l6 offset-l3 m6 offset-m3 center z-depth-4 card-panel" style="margin-top:40px;">
			<form id="formLogin" method="POST" action="/login">
			{{ csrf_field()}}
		        <div class="row">
		          <div class="input-field col s12 center">
		            <img src="images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
		            <p class="center login-form-text">Enter your credentials for Quad Knowledge Base</p>
		          </div>
		        </div>
		        <div class="row margin">
		          <div class="input-field col s12">
		            <i class="material-icons prefix">person_outline</i>
		            <input id="username" name=username type="text">
		            <label for="username" class="center-align">Username</label>
		          </div>
		        </div>
		        <div class="row margin">
		          <div class="input-field col s12">
		            <i class="material-icons prefix">lock_outline</i>
		            <input id="password" name="password" type="password">
		            <label for="password" class="">Password</label>
		          </div>
		        </div>
		        <div class="row">

		          <div class="input-field col s12">
		          	<button type="submit" form="formLogin" value="Submit" class="btn waves-effect waves-light col s12">Submit

		          	</button>
		          </div>
		        </div>

		        @include('layout.errors')

				</form>
    		</div>

<script>
$(document).ready(function(){
	$('body').addClass("blue-grey darken-4");	
})
</script>

</div>


        </div>        
    </div>

    <script>

      $(function() {
        $(".button-collapse").sideNav();
      });


    </script>

    </body>
</html>