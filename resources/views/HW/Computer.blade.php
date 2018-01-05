@extends('layout.master')


@section('content')

	<div class="wrapper">
		<div class="row">
			<div class="col l12 m12 s12">
				<div class="card  grey darken-1 Control-Item">
					<div class="card-title">
						<h2><i class="material-icons medium IconMiddle">personal_video</i><span>{{ $computer->PCName}}</span></h2>
						<h3><a class="Light" href="{{ route('CompanyComputers', $computer->company->id)}}">
							<i class="material-icons IconMiddle">chevron_left</i>{{ $computer->company->CompanyName }}
							</a></h3>
					</div>

					<div id="PCINFO" class="card grey lighten-5">

						<tabs>
							<tab name="Details" class="active" :selected="true">
								<h3 class="Dark">Hardware Information</h3>
								<div class="row">
									<div class="col l6 m12 s12">
										<h4>Data sent by client</h4>
										@if (count($computer->reportedHardware)>0)									
											<ul>
												<li><label class="HWTitle" for="">Name</label><span>{{$computer->PCName}}</span></li>
												<li><label class="HWTitle" for="">Description</label><span>{{$computer->reportedHardware->PCDescription}}</span></li>
												<li><label class="HWTitle" for="">CPU</label><span>{{$computer->reportedHardware->CPU}}</span></li>
												<li><label class="HWTitle" for="">Memory</label><span>{{$computer->reportedHardware->Memory}}</span></li>
												<li><label class="HWTitle" for="">OS</label><span>{{$computer->reportedHardware->OperatingSystem}}</span></li>
												<li><label class="HWTitle" for="">BIOS</label><span>{{$computer->reportedHardware->BIOS}}</span></li>
												<li><label class="HWTitle" for="">IDE</label><span>{{$computer->reportedHardware->IDEController}}</span></li>
												<li><label class="HWTitle" for="">Video</label><span>{{$computer->reportedHardware->VideoController}}</span></li>
												<li><label class="HWTitle" for="">CD</label><span>{{$computer->reportedHardware->CD}}</span></li>
												<li><label class="HWTitle" for="">Domain</label><span>{{$computer->reportedHardware->DomainName}}</span></li>
												<li><label class="HWTitle" for="">Local IP</label><span>{{$computer->reportedHardware->LocalIP}}</span></li>
												<li><label class="HWTitle" for="">Gateway</label><span>{{$computer->reportedHardware->DefaultGateway}}</span></li>
											</ul>
										@else
											<div class="col s12 yellow lighten-4" style="margin:10px;">
												<h3 class="Dark">No Hardware Data Received For This Computer</h3>
											</div>
											
										@endif
									</div>
									<div class="col l6 m12 s12">
										<h4><i class="material-icons">link</i>MT Record</h4>
										<label>Not yet implemented - link to the red book hardware information</label>
									</div>
								</div>
							</tab>
							<tab name="HDD Usage">
								<h3 class="Dark">Current Hard Disk Usage</h3>
								<div class="row">
									@forelse ($computer->LatestDiskUsage as $DU)
									
										@if ($loop->first)
											<div class="col s12">
												<span>Report Date: {{ Carbon\Carbon::parse($DU->ReportDate)->toRfc1036String() }}</span>
											</div>

										@endif

										
											<div class="col l6 m12 s12 card green lighten-5" style="padding:10px;">
												<div class="row">
													<div class="col s6">
														<h3 class="Dark">Disk {{ $DU->DriveIdentity}}</h3>
														<label class="blue lighten-2 ForeWhite" style="padding:3px;">{{ $DU->DriveModel}}</label><br>
														<table class="HighlightText TightRow">
															<tr class="green lighten-3">
																<td>Total Size:</td>
																<td><span class="size">{{ $DU->TotalSpace}}</span></td>
															</tr>
															<tr class="green lighten-4">
																<td>Used Space:</td>
																<td><span class="size">{{ $DU->UsedSpace}}</span></td>
															</tr>
															<tr class="green lighten-3">
																<td>Free Space:</td>
																<td><span class="size">{{ $DU->FreeSpace}}</span></td>
															</tr>
														</table>
													</div>

													<div class="col s6">

														<canvas  id='Chart{{$DU->id}}' width="50px" class='Chart' val='{{ $DU->PercentageUsed}}'>
														</canvas>
													</div>
												</div>
											</div>
										
									@empty
										<div class="col s12 yellow lighten-4" style="margin:10px;">
											<h3 class="Dark">No Disk Usage Data Received For This Computer</h3>
										</div>
										
									@endforelse
								</div>
							</tab>
							<tab name="AntiVirus Info">
								<h3 class="Dark">AntiVirus Software Details</h3>
								<div class="row">
									@forelse ($computer->LatestAVInfo as $AVI)
									
										@if ($loop->first)
											<div class="col s12">
												<span>Report Date: {{ Carbon\Carbon::parse($AVI->ReportDate)->toRfc1036String() }}</span>
											</div>

										@endif
											<div class="col l6 m12 s12 card {{ $AVI->StateColour(2) }} " style="padding:10px;">
												<div class="row">
													<div class="col s3">
														<i class="material-icons large IconMiddle">security</i>
													</div>
													<div class="col s9">
														<h3 class="Dark">{{ $AVI->ProductName}}</h3>
														<label class="ForeDark  " style="padding:3px;"><b>Path:</b> {{ $AVI->Path}}</label><br>
														<label class="ForeDark  " style="padding:3px;"><b>Instance:</b> {{ $AVI->Instance}}</label><br>
														<table class="HighlightText TightRow">
															<tr class="{{ $AVI->StateColour(5) }}" >
																<td >Enabled:</td>
																<td>{{ $AVI->EnabledText()}}</td>
															</tr>
															<tr class="{{ $AVI->StateColour(4) }}">
																<td>Up To Date<i class="material-icons tooltipped IconMiddle" data-position="bottom" data-delay="50" data-tooltip="As determined by Windows security centre">info</i>:</td>
																<td>{{ $AVI->UpToDateText()}}</td>
															</tr>
															<tr class="{{ $AVI->StateColour(3) }}">
																<td>Status Code:</td>
																<td>{{ $AVI->ProductState }}</td>
															</tr>
														</table>
													</div>

												</div>
											</div>
									@empty
										<div class="col s12 yellow lighten-4" style="margin:10px;">
											<h3 class="Dark">No AV Data Received For This Computer</h3>
										</div>
										
									@endforelse
								</div>

							</tab>
							<tab name="Raw Data">
								<h3 class="Dark">Last 10 data transfers from this computer: <a href="{{route('ComputerData', $computer->id)}}" class="btn yellow lighten-3 ForeDark">Show All</a></h3>

								<div class="row">
								@forelse ($computer->datatransfersLatestItems as $Transfer)
									<div class="row card grey lighten-3">
										<div class="col s4">
											<table>
												<tr>
													<td><label>Transfer Type:</label></td>
													<td>{{$Transfer->TransferType}}</td>
												</tr>
												<tr>
													<td><label>ID:</label></td>
													<td>{{$Transfer->PCID}}</td>
												</tr>
												<tr>
													<td><label>Time:</label></td>
													<td>
														{{ Carbon\Carbon::parse($Transfer->TransferDate)->toRfc1036String() }}
													</td>
												</tr>
												<tr>
													<td><label>IP:</label></td>
													<td>{{$Transfer->RemoteIP}}</td>
												</tr>
											</table>
										</div>
										<div class="col s8">
											<label>Data:</label><br>
											<div class="card greay lighten-5">{{$Transfer->RawData}}</div>
										</div>
									</div>
								@empty
									<div class="col s12 yellow lighten-4" style="margin:10px;">
										<h3 class="Dark">No Data Received From This Computer</h3>
									<div>
								@endforelse
								</div>
							</tab>
						</tabs>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://unpkg.com/vue@2.1.3/dist/vue.js"></script>
	<script src="/js/HW/ComputerTabs.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
	<script src="/js/HW/hddchart.min.js"></script>
	
@endsection