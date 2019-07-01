@extends('layouts.client')

@section('title')
	{{ $public_collection->title }}
@endsection

@section('content')

	<div class="collections wrap">

		{{--<div class="collections__main">
			<div class="collections__main--img" style="background-image:url({{ $public_collection->thumbnail_image->url }});">
				<div class="collections__main--head">
					<div class="collections__main--ttl">{{ $public_collection->title }}</div>
					<div class="collections__main--sub">{{ $public_collection->subtitle }}</div>
				</div>
			</div>
			<div class="tags">
				@foreach ($public_collection->types as $type)
					<a  href="{{$type->public_url}}"  class="tags--item">{{ $type->label }}</a>
				@endforeach
			</div>
		</div>--}}

		{{--<div class="collections-single__sidebar">
			 <div class="collections-single__sidebar--ttl">
				Mini Descripción:
			</div>
			<div class="collections-single__sidebar--sub">
				<div>{!! $public_collection->excerpt !!}</div>
			</div>
			<div class="collections-single__sidebar--txt">
				<div>{!! $public_collection->content !!}</div>
			</div>
		</div>--}}

        @if ($related->isNotEmpty())
		<div class="projects-single--wrap wrap">
			<div class="projects__gallery gallery">
				<div class="projects__gallery--ttl">{{ $public_collection->title }}</div>
				@foreach ($related as $product)
				<a href="{{ route('client::products.show', $product->slug) }}" class="gallery__item">
					<div
					class="gallery__item--img"
					style="background-image:url({{ $product->thumbnail_image->url }});"></div>
				</a>
				@endforeach
			</div>
		</div>
        @endif

	</div>

@endsection
