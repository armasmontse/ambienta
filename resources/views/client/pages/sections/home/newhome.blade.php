<div class="home__slider slider_JS {{ isset($class) ? 'head' : '' }}">
	@foreach ($section->components[0]->gallery_images as $image)
		@if ($image->url)
			<div
			class="home__slider--slide"
			style="background-image:url({!!$image->url!!});">
			</div>
		@endif
	@endforeach
</div>

<div class="home--newtxt ">
	{!!$section->components[0]->content!!}
</div>
