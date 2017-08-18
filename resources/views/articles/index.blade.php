@extends('articles.master')


@section('ArticleContent')

<div class="row">
	@foreach ($articles as $article)
		<div>
		<a href="/articles/{{ $article->id}}" >
			{{$article->Title}}
		</a>
			<p>
			{!! $article->ArticleText !!}
			</p>
			{{$article->created_at}}
		</div>
	@endforeach
</div>
				

@endsection