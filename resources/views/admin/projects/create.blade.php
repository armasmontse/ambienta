@extends('layouts.admin')

@section('title')
    Agregar evento
@endsection

@section('h1')
    Agregar evento
@endsection

@section('action')
    <a href="{{ route( 'admin::projects.index' ) }}" class="btn-floating black">
        <i class="material-icons waves-effect waves-light " >view_list</i>
    </a>
@endsection

@section('content')

   @include('admin.general._page-instructions', [
        'title'         =>  '',
        'instructions'  =>  'Llena los campos para crear un nuevo evento'
    ])
    @include('admin.projects._form',[
        "form_id"       => 'create_project_form',
        "form_route"    => ['admin::projects.store'],
        "form_method"   => 'POST',
    ])

@endsection

@section('vue_templates')
    @include('admin.general._cltvo-v-editor-template')
@endsection
