@extends('articles.master')


@section('ArticleContent')

<div class="row wrapper">
  	<ul class="collection">
		@foreach ($articles as $article)
		<li class="collection-item">
			<div class="row">
				<div class="col s2">
					<i class="material-icons circle small center lighten-1">help_outline</i>
					<br>
					<i class="material-icons lighten-1 center" style="font-size: 3em">chat_bubble_outline</i>
					<span class="IconCount">{{ $article->comments->count()}}</span>
				</div>
				<div class="col s10">
					
				    <a href="/articles/{{ $article->id}}" ><span style="font-size: 1.3em" class="title">{{$article->Title}}</span></a>
				    <p class="Excerpt">{{ $article->Excerpt}}</p>
					@foreach ($article->tags as $tag)
					  <div class="chip">
					    <a href='{{ route('ArticlesTag', $tag->Name) }}'>{{ $tag->Name }}</a>
					  </div>
					@endforeach
					<br>
					<span class="SearchDetails">Posted at <b>{{$article->created_at}}</b> by <b>{{ $article->user->name}}</b></span>
				</div>
			</div>
		</li>
		@endforeach
	</ul>

</div>
<div class="row center">
	{{ $articles->links() }}
</div>
				

@endsection