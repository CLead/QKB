@extends('layout.master')


@section('content')

<div class="wrapper">
	<div class="row">
		<div class="col l12 m12 s12">
			<div class="card blue Control-Item">
				<div class="card-title">
					<h2>Domain Lookup</h2>
					<div class="row">
						Enter the full domain name of a website, and will try and determine the details of where it is located:
					</div>
				</div>
				<div class="card-body blue lighten-4">
					<div class="row">
						<form action="domain/check" method="POST">
							{{ csrf_field() }}
							<div class="col l5 offset-l2 s12 input-field ">
								<i class="material-icons prefix">language</i>
								<input name="domain_name" id="domain_name" type="text" class="validate">
								<label for="domain_name">Enter Domain Name</label>
							</div>
							<div class="input-field-button col l2 m2 s6 offsel-s6">
								<button class="btn waves-effect waves-light blue" type="submit" name="action">Submit
			    					<i class="material-icons right">send</i>
			  					</button>
			  				</div>
			  				
		  				</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection