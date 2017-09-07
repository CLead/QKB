@extends('articles.master')

@section('HeaderText')

@endsection

@section('ArticleContent')

<h2 class="Dark">{{ $article->Title }}</h2>
<div class="card article-body blue-grey lighten-5">
	{!! $article->ArticleText !!}
</div>
<div class="right">
	By <span class="Article-Owner">{{ $article->user->name }}</span> at <span class="Article-Date">{{ $article->formattedDate()}}</span>
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
	@else
		<br>
	@endif

<hr>
	@if (count($article->comments) > 0)
	
	<div class="comments">
		<h3 class="blue-grey darken-3" style="padding:10px">
			Comments <span class="new badge" data-badge-caption="comments">{{count($article->comments)}}</span></h3>
		<ul class="collection">
		@foreach ($article->comments as $comment)
			<li class="collection-item">
			<article>
				{{ $comment->Comment }}

				<span class="secondary-content smallComment">By
				{{ $comment->user->name}} at 
				{{ $comment->formattedShortDate()}}
				</span>
			</article>
			</li>
		@endforeach
		</ul>
	</div>

	@else
		<br>
	@endif

	<div class="AddComments blue-grey lighten-2">
		<form method="POST" action="/articles/{{ $article->id}}/comments">
			{{ csrf_field() }}
			<div class="row">
				<div class="col l10 s12 m10 input-field ">
					<label>Add Comment</label>
					<textarea name="CommentBody" id="CommentBody" type="text" style="height:100px" class="validate materialize-textarea"></textarea>
				</div>
				<div class="col l1 s12 m2 ">
					<button class="bottom btn waves-effect waves-light blue" type="submit" name="action">Add
						<i class="material-icons right">send</i>
					</button>
				</div>
			</div>
			@include('layout.errors')
		</form>
	</div>

@endsection