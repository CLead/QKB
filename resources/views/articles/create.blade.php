@extends('articles.master')

@section('HeaderText')
<h3>Create New Knowledgebase Article</h3>
@endsection

@section('ArticleContent')

  <script src="../js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

<form method="POST" action="{{route('ArticleNew')}}">
	<div class="row">

		{{ csrf_field() }}

		<div class="col l6 s12 m6 input-field ">
			<input name="Title" id="Title" type="text" class="validate" required>
			<label for="Title">Article Title</label>
		</div>


		<div class="col l12 s12 m12 input-field ">
			<label>Article Body</label>
			<textarea name="ArticleBody" id="ArticleBody" type="text" style="height:300px" class="validate materialize-textarea"></textarea>
		</div>
		
		<div class="col l12 s12 m12 input-field ">
			<input name="Excerpt" id="Excerpt" type="text" class="validate tooltipped"  data-position="bottom" data-delay="50" data-tooltip="Brief summary of post">
			<label for="Excerpt">Excerpt</label>
		</div>
	</div>
	<div class="row">
		<div name="ChipInfo" class="col l12 s12 m12 input-field">
			<span>Enter Tags for post, press enter after each term  <i class="material-icons tooltipped vmiddle"  data-position="bottom" data-delay="50" data-tooltip="Enter tags to label the post.  Press enter after each tag you want to apply">info_outline</i></span>
			<div class="chips chips-placeholder chips-autocomplete ">
				<input name="Tagsc" id="Tags" type="text" >
			</div>
		</div>

		
		<div class="col l12 s12 m12">
		  <button class="btn waves-effect waves-light" type="submit" name="action">Submit
		    <i class="material-icons right">send</i>
		  </button>
		</div>
		<input name="Tags" id="Tags" type="hidden">
	</div>
	@include('layout.errors')
</form>
					

<script type="text/javascript">
 $(document).ready(function(){
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

  $('.chips-placeholder').material_chip({
    placeholder: 'Enter a tag',
    secondaryPlaceholder: '+Tag',
  });

  $('.chips-autocomplete').material_chip({
    autocompleteOptions: {
      data: {
        'Software': null,
        'Hardware': null,
        'Opera': null,
        'Email': null,
        'Accounts': null,
        'Windows': null,
        'Server': null,
        'Network': null,
        'Backup': null,
        'VPN': null,
        'Customer': null,
        'Remote Access': null,
        'Printers': null,
        'Websites': null

      },
      limit: Infinity,
      minLength: 1
    }
  });

 
    $('.tooltipped').tooltip({delay: 50});
  });

</script>

@endsection