@extends('layouts.client')


@section('title')
	Prensa
@endsection

@section('content')

<div class="moodboard wrap">
	@foreach ($arrPress as $press)
		<div class="moodboard__item">
			<div class="collections__item--img" style="background-image:url({{ $press->thumbnail_image->url }});">

				@if($press->content_type == $contentPDF)
					<a href="{{ url($press->path)  }}" target="_blank" class="collections__item--ttl">{{ $press->title }}</a>
				@endif

				@if($press->content_type == $contentLink)
					<a onclick="openYoutubeModal(this.id)" id="{{ $press->content }}" href="#" class="collections__item--ttl">{{ $press->title }}</a>
				@endif

				@if($press->content_type == $contentImage)
					<a onclick="openImageModal(this.id)" id="{{ $press->thumbnail_image->url }}" href="#" class="collections__item--ttl">{{ $press->title }}</a>
				@endif
			</div>
		</div>
	@endforeach
</div>
@include('client.press.modal._modal')
@endsection
