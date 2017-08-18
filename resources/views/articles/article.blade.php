@extends('articles.master')

@section('HeaderText')

@endsection

@section('ArticleContent')

<h2>{{ $article->Title }}</h2>
By <span class="Article-Owner">{{ $article->user->name }}</span> at <span class="Article-Date">{{ $article->formattedDate()}}</span>
<div class="card article-body blue-grey lighten-5">
	{!! $article->ArticleText !!}
</div>
	@if (count($article->tags) > 0)
	<div class="article-tags blue-grey lighten-4">
		<span class="">Related Tags</span>
		@foreach ($article->tags as $tag)
		  <div class="chip blue-grey darken-1 WhiteText">
		    <a href='{{ route('ArticlesTag', $tag->Name) }}'>{{ $tag->Name }}</a>
		  </div>
		@endforeach
	</div>
	@endif

@endsection