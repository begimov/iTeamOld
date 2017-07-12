@if($authors)
	@foreach($authors AS $author)
		<div class="media author">
		  <div class="media-left media-middle">
			@if($author->avatar)
			  <img class="media-object" src="{{ $author->avatar }}">
			@else
			  <span class="media-object chat-img pull-left">
				<span class="glyphicon glyphicon-user img-circle" aria-hidden="true"></span>
			</span>
			@endif
		  </div>
		  <div class="media-body">
			<h4 class="media-heading"><a href="{{ route('author.show',['id'=>$author->id]) }}">{{ $author->name }}</a></h4>
			{!! $author->info !!}
		  </div>
		</div>
	@endforeach
	<center>{!! $authors->links() !!}</center>
@endif