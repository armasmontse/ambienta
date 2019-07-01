@extends('layouts.admin')

@section('title')
    Agregar inspiración
@endsection

@section('h1')
    Agregar inspiración
@endsection

@section('action')
    <a href="{{ route( 'admin::moodboards.index' ) }}" class="btn-floating black">
        <i class="material-icons waves-effect waves-light " >view_list</i>
    </a>
@endsection

@section('content')

   @include('admin.general._page-instructions', [
        'title'         =>  '',
        'instructions'  =>  'Llena los campos para crear un nuevo inspiración'
    ])
    @include('admin.moodboards._form',[
        "form_id"       => 'create_moodboard_form',
        "form_route"    => ['admin::moodboards.store'],
        "form_method"   => 'POST',
    ])

@endsection

@section('vue_templates')
    @include('admin.general._cltvo-v-editor-template')
@endsection
