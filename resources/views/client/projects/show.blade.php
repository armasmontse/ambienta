@extends('layouts.client')


@section('title')
	{{ $public_project->title }}
@endsection

@section('content')

	<div class="projects-single">

		@if ($public_project->thumbnail_image->url)
			<div class="projects-single--wrap wrap">
				<div
				class="projects-single__cover"
				style="background-image:url({{$public_project->thumbnail_image->url}});">
				</div>
			</div>
		@endif

		<div class="wrap">

			<div class="projects-single--ttl">{{ $public_project->title }}</div>
			<div class="projects-single--txt">
				{!! $public_project->content !!}
			</div>

		</div>


		@unless ($public_project->gallery_images->isEmpty())
			<div class="projects-single--wrap wrap">

				<div class="gallery__slider--fade gallery_fade_JS">
					<div class="gallery__slider--close gallery_close_JS">&#10005;</div>
					<div class="gallery__slider--arrow gallery__slider--prev fa fa-angle-left gallery_prev_JS"></div>
					<div class="gallery__slider--container">
						<div class="gallery__slider gallery_slider_JS">

							@foreach ($public_project->gallery_images as $image)
								<div class="gallery__slider--slide" style="background-image:url({{ $image->url }});"></div>
							@endforeach

						</div>
					</div>
					<div class="gallery__slider--arrow gallery__slider--next fa fa-angle-right gallery_next_JS"></div>
				</div>

				<div class="gallery">
					@foreach ($public_project->gallery_images as $image)
						<a class="gallery__item gallery_item_JS">
							<div
							class="gallery__item--img"
							style="background-image:url({{ $image->url }});"></div>
						</a>
					@endforeach
				</div>

			</div>

		@endunless

	</div>

@endsection
