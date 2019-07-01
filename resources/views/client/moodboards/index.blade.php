@extends('layouts.client')


@section('title')
	Inspiración
@endsection

@section('content')

	<div class="moodboard wrap">
		@foreach ($moodboards as $moodboard)
		{{-- {{dd($moodboard)}}; --}}
		<div class="moodboard__item">
			<div class="collections__item--img" style="background-image:url({{ $moodboard->thumbnail_image->url }});">
				<a href="{{ route('client::moodboards.show',$moodboard->slug)  }}" class="collections__item--ttl">{{ $moodboard->title }}</a>
			</div>
		</div>
		@endforeach
	</div>
@endsection
