@extends('layout.master')


@section('content')

	<div class="wrapper">
		<div class="row">
			<div class="col l12 m12 s12">
				<div class="card  grey darken-1 Control-Item">
					<div class="card-title">
						<h2>Registered Computers</h2>
					</div>
					
					<a href="{{ route('HWCompaniesAdd') }}" style="margin:5px" class="waves-effect waves-light btn"><i class="material-icons left">add_box</i>Create New</a>
					<div class="card-body grey lighten-3">

						<div id="dataarea" class="row wrapper">
							<h3 class="OrangeFont">Active Companies</h3>
								<table>
									<thead>
										<th></th>
										<th>ID</th>
										<th>Identifier</th>
										<th>Computer Name</th>
									</thead>
									<tbody>
										@foreach ($Computers as $Computer)
										<tr>
											<td><a href="">Edit</a></td>
											<td>{{ $Computer->id }}</td>
											<td>{{ $Computer->Identifier}}</td>
											<td>{{ $Computer->PCName}}</td>
										</tr>
											
										@endforeach
									</tbody>
								</table>
						</div>
					</div>
					<div class="row center">
						{{ $Computers->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection