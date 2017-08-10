@extends('layout.master')


@section('content')

<div class="wrapper">
	<div class="row">
		<div class="col l12 m12 s12">
			<div class="card green lighten-1 Control-Item">
				<div class="card-title">
					<h2>Quad Knowledgebase</h2>
					<div class="row">
						
					</div>
				</div>
				
					

				<div class="card-body green lighten-4">
					@include('articles.article')
				</div>
			</div>
		</div>
	</div>
</div>

@endsection