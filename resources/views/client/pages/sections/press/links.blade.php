
@if ($section->components)
	<div class="press__links wrap">
	@foreach ($section->components as $link)
		<a 
		class="press__links--item" 
		href="{{ $link->link_url }}"
		@if($link->link_tblank) target="_blank" @endif>{{ $link->link_title }}</a><br>
	@endforeach
	</div>
@endif

