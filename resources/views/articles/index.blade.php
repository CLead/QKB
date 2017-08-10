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
					<a href="{{ route('ArticlesAdd')}}" class="btn-floating btn-large waves-effect waves-light lime"><i class="material-icons">add</i></a>
					
					

				<div class="card-body green lighten-4">
					<div class="row">
						@foreach ($articles as $article)
							<div>
								{{$article->Title}}
								<p>
								{!! $article->ArticleText !!}
								</p>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection