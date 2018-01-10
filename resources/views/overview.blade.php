<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">  
        <link rel="stylesheet" href="{{ URL::asset('css/default.css') }}?t=2">
        <meta http-equiv="x-ua-compatible" content="IE=edge" />

		<title>Quad KB - Overview</title>
	</head>
	<body class="blue-grey darken-3">
		<a href={{route("Dashboard")}}><i class="small material-icons IconMiddle">home</i>Home</a>
		<div class="card blue-grey darken-3">
			<!--	
			<div class="card-title blue-grey lighten-1 white-text center" style="border-bottom: 2px solid #444">
				Company Overview Dashboard
			</div>

			<iframe style="border:0" width="100%" id="CompanyPage"></iframe>
			-->
			<div id="Content" width="100%"></div>
		</div>
	<script>

		var Pages = [];
		@foreach($Companies as $Comp)
		Pages.push('{{Route('CompanyOverview', $Comp->id)}}');
		@endforeach

		var Page = 0;

		$(function()
		{
			ShowPanel2();
			window.setInterval(ShowPanel2, 20000);
		});

		function ShowPanel()
		{
			var $Frame = $("#CompanyPage")
			$Frame.attr('src', Pages[Page]);
			Page = (Page+1) % Pages.length;
		}

		function ShowPanel2()
		{
			var $Frame = $("#Content");
			$Frame.fadeOut(2000).delay(200).load(Pages[Page]).fadeIn(1000);
			Page = (Page+1) % Pages.length;
		}

	</script>

	</body>

</html>