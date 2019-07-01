
@if ($section->components)
	
	<div class="home__link--container">
		@foreach ($section->components as $component)
			
			@if ($component->title && $component->link_url)
				<a 
				class="home__link"
				alt="{{ $component->link_title }}"
				href="{{ $component->link_url }}"
				@if ($component->link_tblank) target="_blank" @endif>
					<div class="home__link--ttl">{{ $component->title }}</div>
					<div 
					class="home__link--img"
					style="background-image:url({{ $component->thumbnail_image->url }});">
					</div>
					<div class="home__link--txt">{{ $component->subtitle }}</div>
				</a>
			@endif

		@endforeach
	</div>

@endif