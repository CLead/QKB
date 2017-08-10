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
					<h2>Create KB Article</h2>
					<div class="row">
					<form method="POST" action="/articles">
						{{ csrf_field() }}
						<input name="Title" required><br>
						<input name="ArticleText" required>
						<input type="submit" value="Send">
					</form>
					</div>
					@include('layout.errors')
				</div>
			</div>
		</div>
	</div>
</div>

@endsection