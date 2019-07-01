@extends('layouts.client')


@section('title')
	Eventos
@endsection

@section('content')

	<div class="projects wrap">
		@foreach ($projects as $project)
			<div class="projects__item--img" style="background-image:url({{ $project->thumbnail_image->url }});">
				<a href="{{ $project->public_url }}" class="projects__item">
					<div class="projects__item--ttl">{{$project->title}}</div>
					<div class="projects__item--txt">{{$project->subtitle}}</div>
				</a>
			</div>
		@endforeach
	</div>

@endsection
