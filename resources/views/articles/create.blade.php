@extends('layout.master')


@section('content')

  <script src="../js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

<div class="wrapper">
	<div class="row">
		<div class="col l12 m12 s12">
			<div class="card Control-Item blue-grey lighten-2">
				<div class="card-title">
					<h2>Quad Knowledgebase</h2>
					<h3>Create KB Article</h3>
				</div>
				<div class="card blue-grey wrapper lighten-4">
					<form method="POST" action="/articles">
						<div class="row">
					
							{{ csrf_field() }}

							<div class="col l6 s12 m6 input-field ">
								<input name="Title" id="Title" type="text" class="validate">
								<label for="Title">Enter Article Title</label>
							</div>

							<div class="col l12 s12 m12 input-field ">
								<label>Article Body</label>
								<textarea name="ArticleBody" id="ArticleBody" type="text" class="validate materialize-textarea"></textarea>
							</div>

							<div name="ChipInfo" class="col l12 s12 m12 input-field chips">
								<input name="Tagsc" id="Tags" type="text">
								<label for="Tagsc">Enter Tags for post, press enter after each term</label>
							</div>
							<input name="Tags" id="Tags" type="hidden">
							<div class="col l12 s12 m12">
							  <button class="btn waves-effect waves-light" type="submit" name="action">Submit
							    <i class="material-icons right">send</i>
							  </button>
							</div>
					
						</div>
					</form>
					@include('layout.errors')
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('.chips').material_chip();

	var Tags = new Array();

	 $('.chips').on('chip.add', function(e, chip){
	 	Tags.push(chip.tag);

    	$('#Tags').val(Tags.join("||"));
  });

  $('.chips').on('chip.delete', function(e, chip){
    var index = Tags.indexOf(chip.tag);
    
    if (index > -1) 
    {
    	Tags.splice(index, 1);
    	$('#Tags').val(Tags.join("||"));
	}	

  });
</script>

@endsection