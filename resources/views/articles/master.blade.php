@extends('layout.master')


@section('content')

<div class="wrapper">
	<div class="row">
		<div class="col l12 m12 s12">
			<div class="card blue-grey lighten-4 Control-Item">
				<div class="card-title blue-grey lighten-2">
					<h2>Quad Knowledge Base</h2>
					<div class="fixed-action-btn horizontal" style="position: absolute; display: inline-block; right: 24px; top:35px;">
						<a  class="btn-large btn-floating red">
							<i class="material-icons">menu</i>
						</a>
						<ul>
							<li><a href="{{ route('ArticlesAdd')}}" class="btn-floating yellow darken-1">
								<i class="material-icons">add_circle_outline</i></a>
							</li>
							<li><a href="{{ route('ArticlesSearch')}}" class="btn-floating green darken-1">
								<i class="material-icons">search</i></a>
							</li>
						</ul>
					</div>
					@yield('HeaderText')

				</div>	
				<div class="row">
					<div class="card-body wrapper blue-grey lighten-4 col l9 m12 s12">
						@yield('ArticleContent')
					</div>
					<div class="wrapper col l3 m12 s12 blue-grey lighten-4 ArticleSideBar">
						@include('articles.sidebar')
					</div>
				</div>	
			</div>
		</div>
	</div>
</div>

@endsection