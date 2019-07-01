@extends('layouts.client')

@section('content')

	<div class="home wrap">
		@include('client.pages._sections', ['page' => $main_page ])
	</div>
	
@endsection
