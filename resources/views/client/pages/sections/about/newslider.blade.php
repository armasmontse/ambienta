
@unless ($section->components->isEmpty())
	<div class="about--wrap wrap">
		<div class="about--txt about--txt--no-mw about__content">
			{!! $section->components[0]->excerpt !!}
		</div>

		<div class="about--wrap--row">
			@foreach ($section->components[0]->gallery_images as $image)
				<div class="about__col-1-2">
					<img src="{!!$image->url!!}" alt="">
				</div>
			@endforeach
		</div>
		<div class="about--txt about--txt--no-mw about__excerpt">
			{!! $section->components[0]->content !!}
		</div>

	</div>
@endunless
