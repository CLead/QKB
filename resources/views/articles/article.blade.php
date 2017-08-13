<h2>{{ $article->Title }}</h2>
<span class="Article-Date">{{ $article->formattedDate()}}</span> by <span class="Article-Owner">{{ $article->CreatedBy}}</span>
<div class="card article-body blue-grey lighten-5">
	{!! $article->ArticleText !!}
</div>
	<div class="article-tags blue-grey lighten-4">
		<span class="">Related Tags</span>
		@foreach ($article->tags as $tag)
		  <div class="chip blue-grey darken-1 WhiteText">
		    {{ $tag->Name }}
		  </div>
		@endforeach
	</div>