@if (count($errors))
<div class="card red" style="padding:2px">
	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif