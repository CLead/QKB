@extends('layout.master')


@section('content')

	<div class="wrapper">
		<div class="row">
			<div class="col l12 m12 s12">
				<div class="card  grey darken-1 Control-Item">
					<div class="card-title">
						<h2><i class="material-icons medium IconMiddle">personal_video</i><span>{{ $computer->PCName }} Data Transfers</span></h2>
						<h3>
							<a class="Light" href="{{ route('CompanyComputers', $computer->company->id)}}">
							<i class="material-icons IconMiddle">chevron_left</i>{{ $computer->company->CompanyName }}
							</a>
						</h3>
						<h3>
							<a class="Light" href="{{ route('ComputersInfo', $computer->id)}}">
							<i class="material-icons IconMiddle">chevron_left</i>{{ $computer->PCName }}
							</a>
						</h3>
					</div>

					<div id="PCINFO" class="card grey lighten-5">

						<div class="row">
						@forelse ($Transfers as $Transfer)
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
											<td>{{$Transfer->TransferDate}}</td>
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
						<div class="row center">
							{{ $Transfers->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://unpkg.com/vue@2.1.3/dist/vue.js"></script>
	<script src="/js/HW/ComputerTabs.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
	

@endsection