<div class="">
	<div class="col l12 m6 s6">
		<h4>Common Tags</h4>
		<ul>
		@foreach ($TopTags as $tag )
			
			<li><a href='{{ route('ArticlesTag', $tag->Name)}}'>{{ $tag->Name }}</a></li>
		@endforeach
		</ul>
	</div>
	<div class="col l12 m6 s6">
		<h4>Latest Posts</h4>
		<ul>
		@foreach ($LatestPosts as $Post)
			<li><a href="{{ route('ShowArticle', $Post->id) }}">{{ $Post->Title }}</a></li>
		@endforeach
		</ul>
	</div>
</div>