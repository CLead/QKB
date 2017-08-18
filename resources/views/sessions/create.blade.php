@extends('layout.master')


@section('content')



<div class="wrapper blue loaded row">
		

		<div class="col s12 l4 offset-l4 m6 offset-m3 center z-depth-4 card-panel">
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



</div>

@endsection