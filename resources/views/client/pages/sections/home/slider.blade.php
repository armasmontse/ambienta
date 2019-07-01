@if ($section->components)
	
	<div class="home__slider slider_JS {{ isset($class) ? 'head' : '' }}">
		@foreach ($section->components as $component)
			@if ($component->thumbnail_image->url)
				<div 
				class="home__slider--slide"
				style="background-image:url({{ $component->thumbnail_image->url }});">
				</div>
			@endif
		@endforeach
	</div>

@endif