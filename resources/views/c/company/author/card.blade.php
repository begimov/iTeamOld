@if($author)
	<div class="media author">
	  <div class="media-left media-middle">
		<!--a href="#"-->
		  <img class="media-object" src="{{ $author->avatar }}">
		<!--/a-->
	  </div>
	  <div class="media-body">
		<h4 class="media-heading">{{ $author->name }}</h4>
		{!! $author->info !!}
	  </div>
	</div>
@endif