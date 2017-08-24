@extends('layout.master')


@section('content')

<div class="wrapper">
	<div class="row">
		<div class="col l12 m12 s12">
			<div class="card blue-grey lighten-2 Control-Item">
				<div class="card-title">
					<h2>Quad Knowledge Base</h2>
					<div class="row">
						
					</div>
				</div>
				
					

				<div class="card-body blue-grey lighten-4">
					@include('articles.article')
				</div>
			</div>
		</div>
	</div>
</div>

@endsection