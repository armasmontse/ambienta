@extends('layouts.admin')

@section('title')
    Agregar prensa
@endsection

@section('h1')
    Agregar prensa
@endsection

@section('action')
    <a href="{{ route( 'admin::press.index' ) }}" class="btn-floating black">
        <i class="material-icons waves-effect waves-light " >view_list</i>
    </a>
@endsection

@section('content')

   @include('admin.general._page-instructions', [
        'title'         =>  '',
        'instructions'  =>  'Llena los campos para crear una nueva prensa'
    ])
    @include('admin.press._form',[
        "form_id"       => 'create_press_form',
        "form_route"    => ['admin::press.store'],
        "form_method"   => 'POST',
    ])
@endsection


@section('vue_templates')
    @include('admin.general._cltvo-v-editor-template')
@endsection
