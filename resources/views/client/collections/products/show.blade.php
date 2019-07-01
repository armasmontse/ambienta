@extends('layouts.client')

@section('title')
	{{ $public_product->title }}
@endsection

@section('content')

	<div class="product wrap">

		<div class="product__main">
			<div class="product__main--img" style="background-image:url({{ $public_product->thumbnail_image->url }});">
			</div>
			<div class="tags">
				@foreach ($public_product->categories as $category)
					<a href="{{ $category->public_url }}" class="tags--item"></a>
				@endforeach
			</div>
		</div>

		<div class="product__sidebar">

			<div class="product--ttl">{{ $public_product->title }}</div>

			{{-- <div class="product__sidebar--ttl">
				Mini Descripción:
			</div> --}}

			<div class="product__sidebar--txt">
				{!! $public_product->description !!}
			</div>

			{{-- Thumbnails de Galería --}}
			<div class="product__gallery gallery">
				@foreach ($public_product->gallery_images as $photo)
					<a class="product__gallery--item gallery__item gallery_item_JS">
						<div
						class="gallery__item--smallImg"
						style="background-image:url({{ $photo->url }});"></div>
					</a>
				@endforeach
			</div>

		</div>

		{{-- Slider de Galería --}}
		<div class="gallery__slider--fade gallery_fade_JS">
			<div class="gallery__slider--close gallery_close_JS">&#10005;</div>
			<div class="gallery__slider--arrow gallery__slider--prev fa fa-angle-left gallery_prev_JS"></div>
			<div class="gallery__slider--container">
				<div class="gallery__slider gallery_slider_JS">
					@foreach ($public_product->gallery_images as $photo)
						<div class="gallery__slider--slide" style="background-image:url({{ $photo->url }});"></div>
					@endforeach
				</div>
			</div>
			<div class="gallery__slider--arrow gallery__slider--next fa fa-angle-right gallery_next_JS"></div>
		</div>

        @if ($related->isNotEmpty())
		{{-- Productos Relacionados --}}
		<div class="product--wrap wrap">
			<div class="product__gallery gallery">

				<div class="product__gallery--ttl">Artículos Relacionados</div>

				@foreach ($related as $related_product)
                    <a href="{{ $related_product->public_url}}"
					class="gallery__item">
                        <div
						title="{{ $related_product->title}}"
                        class="gallery__item--img"
                        style="background-image:url({{ $related_product->thumbnail_image->url }});"></div>
                    </a>
                @endforeach

			</div>
		</div>
        @endif

	</div>




@endsection
