@extends('articles.master')


@section('ArticleContent')

<div class="row wrapper">
  	<ul class="collection">
		@foreach ($articles as $article)
		<li class="collection-item avatar">
			<i class="material-icons circle blue-grey lighten-1">help_outline</i>
			<i class="material-icons lighten-1" style="font-size: 3em">chat_bubble_outline</i>
			<span class="IconCount">{{ $article->comments->count()}}</span>
			<br>
		    <a href="/articles/{{ $article->id}}" ><span class="title">{{$article->Title}}</span></a>
		    <p class="Excerpt">{{ $article->Excerpt}}</p>
				@foreach ($article->tags as $tag)
				  <div class="chip">
				    <a href='{{ route('ArticlesTag', $tag->Name) }}'>{{ $tag->Name }}</a>
				  </div>
				@endforeach
				<br>
				<span class="SearchDetails">Posted at <b>{{$article->created_at}}</b> by <b>{{ $article->user->name}}</b></span>

				
				
		</li>
		@endforeach
	</ul>

</div>
<div class="row center">
	{{ $articles->links() }}
</div>
				

@endsection