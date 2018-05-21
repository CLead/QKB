@extends('layout.master')


@section('content')

	<div class="wrapper">
		<div class="row">
			<div class="col l12 m12 s12">
				<div class="card  grey darken-1 Control-Item">
					<div class="card-title">
						<h2><i class="material-icons medium IconMiddle">personal_video</i><span>{{ $computer->PCName}} - Event Log Info</span></h2>
						<h3><a class="Light" href="{{ route('CompanyComputers', $computer->company->id)}}">
							<i class="material-icons IconMiddle">chevron_left</i>{{ $computer->company->CompanyName }}
							</a></h3>
					</div>

					<div id="PCINFO" class="card grey lighten-5">
							
						<div id="filterControls" class="card">
					        <div class="card-content">
					          <span class="card-title">Log Filters</span>

								<a class="waves-effect waves-light green btn" href="{{ route('ComputerEvents', $computer->id) }}">All</a>
								<a class="waves-effect waves-light btn" href="{{ route('ComputerEventsFilter', [$computer->id, 1 , $Level , $Warn]) }}">Application Items</a>
								<a class="waves-effect waves-light btn" href="{{ route('ComputerEventsFilter', [$computer->id, 2 , $Level , $Warn]) }}">System Items</a>


								<a class="waves-effect waves-light black-text yellow btn" href="{{ route('ComputerEventsFilter', [$computer->id, $Source , 3 , $Warn]) }}">Warnings Only</a>
								<a class="waves-effect waves-light orange btn" href="{{ route('ComputerEventsFilter', [$computer->id, $Source , 2 , $Warn]) }}">Errors Only</a>
								<a class="waves-effect waves-light red btn" href="{{ route('ComputerEventsFilter', [$computer->id, $Source , 4 , $Warn]) }}">Critical Only</a>

								<a class="waves-effect waves-light btn" href="{{ route('ComputerEventsFilter', [$computer->id, $Source , $Level , 1]) }}">Uncleared Errors</a>
							</div>
						</div>

						<div id="dataarea" class="row wrapper">
							<table>
								<thead>
									<th>Type</th>
									<th>Event Time</th>
									<th>Provider</th>
									<th>Description</th>
									<th>Show Warning</th>
								</thead>
								<tbody>
									@foreach ($Events as $Event)
									<tr>
										<td>
											{!! $Event->getTypeHTML() !!}
										</td>
										<td>{{ $Event->EventDate }}</td>
										<td>{{ $Event->EventProvider }}</td>
										<td>{{ $Event->EventDescription }}</td>
										<td>
											@if ($Event->DisplayWarning ==1)
												<span class="msg">Yes</span>
												<a href="#" class="btn red btn-small clearerror" tag="{{$Event->id}}"><i class="material-icons">clear</i>Clear Error</a>
											@else
													No
											@endif
										</td>

									</tr>
										
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<div class="row center">
						{{ $Events->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function(){
			$(".clearerror").click(function() 
				{
					var BI = $(this).attr('tag');
					var Button = $(this);

					$.ajax(
					{
						method: "POST",
	                    url: "http://toolkit.quad.co.uk/QKB/QKBService.asmx/ClearEventAlert",
	                    dataType: "json",
	                    data: { AlertID: BI },
						success: function (data) 
							{
	                            //var RetVal = data.Password;
	                            if (data.Status == "200")
	                            {
	                            	$(Button).addClass("hidden");
									$(Button).siblings().addClass('strikethrough');
	                            }
	                            else
								{
									alert("Error clearing error");
								}
	                        },
	                    error: function (jqXHR, textStatus, errorThrown) 
	                    	{

	                            alert(errorThrown);
	                        }
					});
				});

		})

	</script>

@endsection