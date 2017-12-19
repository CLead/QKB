@extends('layout.master')


@section('content')

	<div class="wrapper">
		<div class="row">
			<div class="col l12 m12 s12">
				<div class="card  grey darken-1 Control-Item">
					<div class="card-title">
						<h2>Registered Computers</h2>
						<h3>{{ $company->CompanyName }}</h3>
					</div>
					
					<a href="{{ route('HWCompanies') }}" style="margin:5px" class="waves-effect waves-light blue btn"><i class="material-icons left">chevron_left</i>Back</a>
					<div class="card-body grey lighten-3">

						<div id="dataarea" class="row wrapper">
								<table>
									<thead>
										<th></th>
										<th>ID</th>
										<th>Computer Name</th>
										<th>Date Enrolled</th>
										<th>Identifier</th>
									</thead>
									<tbody>
										@foreach ($company->computers as $Computer)
										<tr>
											<td><a href="{{route('ComputersInfo', $Computer->id) }}">Details</a></td>
											<td>{{ $Computer->id }}</td>
											<td><i class="material-icons left">personal_video</i>{{ $Computer->PCName}}</td>
											<td>{{ $Computer->DateEnrolled}}
											<td>{{ $Computer->Identifier}}</td>
										</tr>
											
										@endforeach
									</tbody>
								</table>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection