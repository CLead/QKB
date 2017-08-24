@extends('layout.master')


@section('content')
<div class="wrapper blue-grey darken-4 loaded row">
		

		<div id="msg" class="col s12 l6 offset-l3 m8 offset-m2 center z-depth-4 card-panel" style="margin-top: 40px">

			{{ csrf_field()}}
		        <div class="row">
		          <div class="input-field col s12 center">
		            <h2 class="center">Not Implemented</h2>
		          </div>
		        </div>
		        <div class="row margin">
		          This feature does not yet exist... perhaps someday.
		        </div>
		        <div class="row margin">
		          <a href="{{ route('Dashboard')}}" class="center">Look at the dashboard instead</a>
		        </div>

    		</div>



</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
$(document).ready(function(){
    $('body').addClass("blue-grey darken-4");   

    $( "#msg" ).effect( "shake" );
})
</script>

@endsection