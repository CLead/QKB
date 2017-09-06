@extends('layout.master')


@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}?t=51">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script src="/js/underscore-min.js"></script>
<div class="row">

	<div class="col l4 m6 s12">
		<div class="card blue-grey darken-1">	
			<div class="card-title blue-grey lighten-1 white-text center">
				Calls Opened Today
			</div>
            <div class="card-content white-text">
				<canvas id="OpenedTodayJobs" height="200"></canvas>
            </div>
		</div>	
	</div>
	<div class="col l4 m6 s12">
		<div class="card blue-grey darken-1">	
			<div class="card-title blue-grey lighten-1 white-text center">
				Outstanding Job Owners
				<a id="btnOutstanding" class="btn-floating halfway-fab btn-top-half waves-effect waves-light green"><i class="material-icons">add</i></a>
			</div>
            <div class="card-content white-text">
				<canvas id="OutstandingJobs" height="200"></canvas>
            </div>
            <div id="hidden" style="overflow-y: scroll" class="light-blue lighten-5 Slideup-Panel Hidden">
            	<div id="OutstandingJobsText">
            	</div>
            </div>
		</div>	
	</div>
	<div class="col l4 m6 s12">
		<div class="card blue-grey darken-1">	
			<div class="card-title blue-grey lighten-1 white-text center">
				Weekly Call Freq.
			</div>
            <div class="card-content white-text">
				<canvas id="WeeklyCalls" height="200"></canvas>
            </div>
		</div>	
	</div>
	<div class="col l8 m12 s12">
		<div class="card blue-grey darken-1">	
			<div class="card-title blue-grey lighten-1 white-text center">
				Outstanding Jobs
			</div>
            <div id="JobList" class="card-content white-text">
            </div>
		</div>	
	</div>
	<div class="col l4 m6 s12">
		<div class="card blue-grey darken-1">	
			<div class="card-title blue-grey lighten-1 white-text center">
				Top Call Closer    
				<div class="switch" style="float:right">
				    <label class="white-text">
				      Week
				      <input id="CloserSwitch" type="checkbox">
				      <span class="lever"></span>
				      Month
				    </label>
				</div>
			</div>
            <div id="CloserMonthCard" class="card-content white-text ">
				<canvas id="CallCloserWeek" height="200"></canvas>
            </div>
            <div id="CloserWeekCard" class="card-content white-text Hidden">
				<canvas id="CallCloserMonth" height="200"></canvas>
            </div>
		</div>	
	</div>
	<div class="col l4 m6 s12">
		<div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Call Logs</span>
              <p>Display more details regarding the call logs.</p>
            </div>
            <div class="card-action">
              <a href="{{ route('missing') }}">Quad Logs</a>
              <a href="{{ route('missing') }}">Aldi Logs</a>
            </div>
          </div>	
	</div>
</div>




<div id="modelDiv" class="modal">
	<div id="model-content" class="modal-content">
		<h4>Call Details: CallID <span id="CallDetailsID"></span></h4>
		<div id="CallDetails" class="card"></div>

		<div id="CallDetailsLoader" class="preloader-wrapper big active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left">
        <div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right">
        <div class="circle"></div></div></div></div>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
	</div>
</div>



<script>
$(document).ready(function(){
	$('.modal').modal();	
})

$( "#btnOutstanding" ).click(function() {
  $( "#hidden" ).slideToggle( "slow", function() {
  });
});

$("#CloserSwitch").click(function()
{
	//$("#CloserWeekCard").toggleClass("Hidden");
	//$("#CloserMonthCard").toggleClass("Hidden");

	  $( "#CloserWeekCard" ).slideToggle( "fast", function() {
  });
	    $( "#CloserMonthCard" ).slideToggle( "fast", function() {
  });

});

</script>

<script src="/js/charts/OutstandingJobs.js"></script>
<script src="/js/charts/JobsOpenedToday.js"></script>
<script src="/js/charts/WeeklyCalls.js"></script>
<script src="/js/charts/CallCloser.js"></script>

@endsection