@extends('layout.master')


@section('content')

	<div class="wrapper">
		<div class="row">
			<div class="col l12 m12 s12">
				<div class="card  grey darken-1 Control-Item">
					<div class="card-title">
						<h2>Computer Maintenance</h2>
					</div>

					<div class="card-body grey lighten-3">
						<div id="dataarea" class="row wrapper">
							<h3 class="OrangeFont">Edit Computer Details</h3>

						<form method="POST" action="{{route('ComputerUpdate', $computer->id)}}">
							<div class="row">
								{{ method_field('PATCH')}}
								{{ csrf_field() }}

								<div class="col l4 s12 m4 input-field ">
									<input name="ComputerName" id="ComputerName" readonly="true" type="text" class="validate" value="{{$computer->PCName}}" required>
									<label for="ComputerName">Computer ID</label>
								</div>

								<div class="col l4 s12 m4 input-field ">
									<label for="QuadLabel">Label</label>
									<input name="QuadLabel" id="QuadLabel" type="text" class="validate" value="{{$computer->QuadLabel or old('QuadLabel')}}" >
								</div>
								<div class="col l4 s12 m4 ">
									
									<input type="checkbox" id="IgnoreNoBackupsWarning" name="IgnoreNoBackupsWarning" {{$computer->IgnoreNoBackupsWarning ? 'checked' : '' }} value="{{$computer->IgnoreNoBackupsWarning}}" />
      								<label for="IgnoreNoBackupsWarning">Ignore Missing Backups</label>

		
      								<br>
      								<p class="small light">
      								If checked, the dashboard will not show a warning, if a computer has not done a backup for 7 days.
      								<p>
								</div>
							</div>
							@include('layout.errors')
							<div class="row">
								
								<div class="col l12 s12 m12">
									<a class="btn orange" href="{{ route('CompanyComputers', $computer->CompanyID) }}">Cancel</a>
									<button class="btn waves-effect waves-light" type="submit" name="action">Update
								    	<i class="material-icons right">send</i>
								  	</button>
								</div>
								<input name="Tags" id="Tags" type="hidden">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection


