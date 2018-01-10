<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">  
        <link rel="stylesheet" href="{{ URL::asset('css/default.css') }}?t=2">
        <link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}?t=4">

		<title>Company Overview</title>
	</head>
	<body class="blue-grey darken-3" style="overflow-y: hidden;">
        <div class="card-content white-text row">
        	<div class="col m8">
        		<h2>{{ $company->CompanyName }} - {{ $company->CompanyCode}}</h2>
        	</div>
			<div class="col m4">
				<div class="DashboardLarge">
					<div class="Title">Active PCs</div>
					<div>
						<i class="medium material-icons IconMiddle" style="color:#0FA;">personal_video</i>
						<span class="value">{{ $company->getActiveComputers()}}</span>
					</div>
				</div>
				<div class="DashboardLarge">
					<div class="Title">Inactive PCs</div>
					<div>
						<i class="medium material-icons IconMiddle" style="color:#F50;">personal_video</i>
						<span class="value">{{ $company->getInActiveComputers()}}</span>
					</div>
				</div>
			</div>


		</div>
<!--
			<div class="card-title blue-grey darken-2 white-text center">
				Active Computers
			</div>
-->
			<div>
				<div id="Container" class="card-content white-text row" style="overflow-y: hidden; border:2px solid #CCC">
					<table id="tblComputers" class="bordered">
						<thead>
							<tr>
								<th>PC Name</th>
								<th>Description</th>
								<th>AV State</th>
								<th>HD Details</th>
						</thead>
						<tbody>
							@foreach($Computers as $Computer)
@foreach($Computers as $Computer)
							<tr class="blue-grey lighten-1">
								<td><i style="margin-left: 40px;" class="medium material-icons IconMiddle IconColour">personal_video</i> <b class="LargeText">{{ $Computer->PCName}}</b></td>
								<td>
									@if(is_null($Computer->reportedHardware))
									
									@else
										<b class="LargeText DesColour">{{ $Computer->reportedHardware->PCDescription}}</b><br>
										<i>{{ $Computer->reportedHardware->OperatingSystem}}</i><br>
										{{ $Computer->reportedHardware->LocalIP}}
									@endif
								</td>
								<td>
									@foreach($Computer->LatestAVInfo as $AV)
										<div class="AVState{{$AV->State}}">
											{{$AV->ProductName}}
										</div>
									@endforeach
								</td>
								<td>
									@foreach($Computer->LatestDiskUsage as $HDD)
										
										<div class="PercentBack">
											<div class="PercentFore" style="width:{{$HDD->PercentageUsed}}%; background: #{{$HDD->getPercentColour()}};">
											</div>
										</div>
										<div class="PercentLabel">
											{{$HDD->DriveIdentity}} {{number_format($HDD->PercentageUsed, 2)}}%
										</div>
										
									@endforeach
								</td>
							</tr>
					@endforeach
					@endforeach
							<tr>
								<td class="blue-grey darken-3" style="text-align: center;" colspan="4">END
							</tr>
						</tbody>
					</table>
				</div>
			</div>
	</body>

	<script>

		$(function() { 
			var AnimateTime = {{ $Computers->count() }}* 2500;

			var Rows = {{ $Computers->count() }};
			var nav  = $('#Container');
			var Height = $('#tblComputers').innerHeight();
			var Row = Rows;

			var TopVal = nav.offset().top;
			var NavHeight = $(window).height() - TopVal-80;
			nav.height($(window).height() - TopVal-80);


			setTimeout(PerformScroll, 1000);
			setInterval(function(){PerformScroll();},(AnimateTime*2)+1000);

			function PerformScroll()
			{
				nav.animate({scrollTop: Height-NavHeight }, AnimateTime);
				nav.animate({scrollTop: 0 }, AnimateTime);
			}
		});
	</script>

</html>