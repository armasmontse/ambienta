@extends('layouts.client')

@section('title')
	{{ $public_moodboard->title }}
@endsection

@section('content')

	<div class="wrap">

		<div class="moodboard__title">{{ $public_moodboard->title }}</div>

		<div class="moodboard__description">{{ $public_moodboard->description }}</div>

		<div class="moodboard__container">

			<a data-pin-do="embedBoard" data-pin-lang="es"  href="{{$public_moodboard->content}}"></a>

		</div>

	</div>



@endsection

@section('scripts')
	<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
@endsection
