@extends('layouts.client')

@section('title')
	{{ $category->label }} - Articulos
@endsection

@section('content')

	<div class="product wrap">
		<div class="product--wrap wrap">
			<div class="product__gallery gallery">

				<div class="product__gallery--ttl">{{ $category->label }}</div>

				@foreach ($products as $product)
                    <a href="{{ $product->public_url}}"
					class="gallery__item">
                        <div
                        class="gallery__item--img"
						title="{{ $product->title}}"
                        style="background-image:url({{ $product->thumbnail_image->url }});"></div>
                    </a>
                @endforeach

			</div>
		</div>
	</div>

@endsection
