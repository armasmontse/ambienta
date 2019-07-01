@extends('layouts.admin')


@section('title')
    Ajustes
@endsection

@section('h1')
    Ajustes
@endsection


@section('content')

    {{-- Redes sociales --}}
    @include('admin.settings.setting._social')

    <div class="row">
		<div class="col s10 offset-s1">
			<div class="divider"></div>
		</div>
	</div>

    {{-- Mail --}}
    @include('admin.settings.setting._mail')

	<div class="row">
		<div class="col s10 offset-s1">
			<div class="divider"></div>
		</div>
	</div>

	{{-- contact --}}
	@include('admin.settings.setting._contact')

	<div class="row">
		<div class="col s10 offset-s1">
			<div class="divider"></div>
		</div>
	</div>

	@include('admin.settings.setting._collections')

	<div class="row">
		<div class="col s10 offset-s1">
			<div class="divider"></div>
		</div>
	</div>
	

@endsection
