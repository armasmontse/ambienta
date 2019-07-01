
@unless ($section->components->isEmpty())
	<div class="about--wrap wrap">
		<div class="moodboard__title">{{  $section->components[0]->title }}</div>

		<div class="about--txt about--txt--no-mw about__excerpt">
			{!! $section->components[0]->content !!}
		</div>

	</div>
@endunless
