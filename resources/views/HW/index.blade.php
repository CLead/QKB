@extends('layout.master')


@section('content')

	<div class="wrapper">
		<div class="row">
			<div class="col l12 m12 s12">
				<div class="card  grey darken-1 Control-Item">
					<div class="card-title">
						<h2>Company Maintenance</h2>
					</div>
					
					<a href="{{ route('HWCompaniesAdd') }}" style="margin:5px" class="waves-effect waves-light btn"><i class="material-icons left">add_box</i>Create New</a>
					<div class="card-body grey lighten-3">

						@if(Session::has('flash_message'))
							<div id="dvFlash" class="card green center cardpad">
								{{Session::get('flash_message')}}
							</div>

							<script>
								$("#dvFlash").delay(2500).fadeOut(1000);
							</script>

						@endif

						<div id="dataarea" class="row wrapper">
							<h3 class="OrangeFont">Active Companies</h3>
								<table>
									<thead>
										<th></th>
										<th>Company Name</th>
										<th>Enabled</th>
										<th>Registration Code</th>
										<th>Account Code</th>
										<th>Admin Email</th>
										<th>Assigned PCs</th>
									</thead>
									<tbody>
										@foreach ($Companies as $company)
										<tr>
											<td><a href="{{route('HWCompaniesEdit', $company->id)}}">Edit</a></td>
											<td>{{ $company->CompanyName }}</td>
											<td>
												@if ($company->Active == 1)
													<i class="material-icons green">check</i>
												@else
													<i class="material-icons red">clear</i>
												@endif
											</td>
											<td>{{ $company->RegistrationCode}}</td>
											<td>{{ $company->CompanyCode}}</td>
											<td>{{ $company->AdminEmail}}</td>
											<td>
												{{ count($company->computers) }}
												@if (count($company->computers) > 0)
													<a href="{{route('Computers', $company->id)}}">Show</a>
												@endif
											</td>
										</tr>
											
										@endforeach
									</tbody>
								</table>
						</div>
					</div>
					<div class="row center">
						{{ $Companies->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>



@endsection


